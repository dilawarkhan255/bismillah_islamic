<?php

namespace Tests\Feature;

use App\Models\Certificate;
use App\Models\FeePayment;
use App\Models\SiteSetting;
use App\Models\Student;
use App\Models\User;
use Carbon\CarbonImmutable;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class StudentRecordsTest extends TestCase
{
    use RefreshDatabase;

    private User $admin;

    private Student $student;

    protected function setUp(): void
    {
        parent::setUp();
        Role::findOrCreate('admin');
        $this->admin = User::factory()->create();
        $this->admin->assignRole('admin');
        $this->student = Student::create([
            'name' => 'Ali Khan', 'parent_name' => 'Sana', 'whatsapp' => '+44 7700 900100', 'timezone' => 'Europe/London',
            'status' => 'active', 'course' => 'Norani Qaida', 'fee_amount' => 40, 'fee_currency' => 'GBP', 'fee_due_day' => 5,
        ]);
    }

    public function test_parent_progress_page(): void
    {
        $this->assertSame(32, strlen($this->student->progress_token));

        $this->actingAs($this->admin)->put(route('admin.students.level', $this->student), ['current_level' => 'Takhti 7', 'progress_percent' => 40]);
        $this->actingAs($this->admin)->post(route('admin.students.progress.store', $this->student), [
            'date' => now()->toDateString(), 'attendance' => 'present', 'lesson' => 'Harakat practice', 'note' => 'Very good effort',
        ])->assertRedirect();
        auth()->logout();

        $this->get($this->student->fresh()->progress_url)
            ->assertOk()
            ->assertHeader('X-Robots-Tag', 'noindex, nofollow')
            ->assertSee('Ali Khan')->assertSee('Takhti 7')->assertSee('Harakat practice')->assertSee('Very good effort')
            ->assertSee('100%'); // attendance

        $this->get('/progress/' . str_repeat('a', 32))->assertNotFound();

        $this->student->update(['status' => 'left']);
        $this->get($this->student->progress_url)->assertNotFound();
    }

    public function test_new_link_disables_the_old_one(): void
    {
        $old = $this->student->progress_url;
        $this->actingAs($this->admin)->post(route('admin.students.reset-link', $this->student));
        auth()->logout();

        $this->get($old)->assertNotFound();
        $this->get($this->student->fresh()->progress_url)->assertOk();
    }

    public function test_fees_paid_unpaid_and_reminder(): void
    {
        $month = CarbonImmutable::now('Asia/Karachi')->format('Y-m');

        $page = $this->actingAs($this->admin)->get(route('admin.fees.index'))->assertOk()->assertSee('Not paid');
        $this->assertStringContainsString('wa.me/447700900100?text=', $page->getContent());
        $this->assertStringContainsString(rawurlencode('£40'), $page->getContent());

        $this->actingAs($this->admin)->post(route('admin.students.payments.store', $this->student), [
            'month' => $month, 'amount' => 40, 'currency' => 'GBP', 'paid_on' => now()->toDateString(), 'return' => 'fees',
        ])->assertRedirect(route('admin.fees.index', ['month' => $month]));

        // paying the same month twice keeps one record
        $this->actingAs($this->admin)->post(route('admin.students.payments.store', $this->student), [
            'month' => $month, 'amount' => 40, 'currency' => 'GBP', 'paid_on' => now()->toDateString(),
        ]);
        $this->assertSame(1, FeePayment::count());

        $this->actingAs($this->admin)->get(route('admin.fees.index'))->assertSee('Paid ');

        $this->actingAs($this->admin)->get(route('admin.students.edit', $this->student))->assertOk()->assertSee('£40');
    }

    public function test_certificate_is_printable_and_checkable(): void
    {
        $this->actingAs($this->admin)->post(route('admin.students.certificates.store', $this->student), [
            'title' => 'Completion of Norani Qaida', 'course' => 'Norani Qaida', 'teacher_name' => 'Hafiz Kamran', 'issued_on' => '2026-11-20',
        ])->assertRedirect();
        auth()->logout();

        $cert = Certificate::firstOrFail();
        $this->assertMatchesRegularExpression('/^BIA-\d{4}-[A-Z0-9]{6}$/', $cert->serial);

        $this->get(route('certificate.show', $cert))
            ->assertOk()->assertSee('Ali Khan')->assertSee($cert->serial)->assertSee('Hafiz Kamran')->assertSee('20 November 2026');
        $this->get('/certificate/BIA-0000-NOPE00')->assertNotFound();
    }

    public function test_trial_days_setting_saves_checkboxes(): void
    {
        $this->actingAs($this->admin)->post(route('admin.settings.update'), [
            'settings' => ['trial_days' => ['0', '1', '3', '5'], 'trial_hours_from' => '16:00'],
        ]);

        $this->assertSame('1,3,5', SiteSetting::where('key', 'trial_days')->value('value'));

        $this->get(route('free_trial'))->assertOk()->assertSee('id="trialSlots"', false)->assertSee('"days":[1,3,5]', false);
    }

    public function test_admin_sees_every_page_visitors_do_not(): void
    {
        $this->student->certificates()->create(['title' => 'Completion of Norani Qaida', 'issued_on' => '2026-11-20']);
        $left = Student::create(['name' => 'Gone Student', 'timezone' => 'Asia/Karachi', 'status' => 'left']);

        // admin: menu links, both lists, and even a left student's page
        $this->actingAs($this->admin)->get(route('home'))->assertSee('Student Progress Pages')->assertSee(route('certificates.index'), false);
        $this->actingAs($this->admin)->get(route('progress.index'))->assertOk()->assertSee('Ali Khan')->assertSee('Gone Student')->assertSee($this->student->progress_url, false);
        $this->actingAs($this->admin)->get(route('certificates.index'))->assertOk()->assertSee('Completion of Norani Qaida');
        $this->actingAs($this->admin)->get($left->progress_url)->assertOk();

        // other logged-in users: no menu links, lists forbidden
        $editor = User::factory()->create();
        $this->actingAs($editor)->get(route('home'))->assertDontSee('Student Progress Pages');
        $this->actingAs($editor)->get(route('progress.index'))->assertForbidden();

        // visitors: no menu links, lists need a login, a left student's link is gone
        auth()->logout();
        $this->get(route('home'))->assertDontSee('Student Progress Pages');
        $this->get(route('certificates.index'))->assertRedirect(route('login'));
        $this->get($left->progress_url)->assertNotFound();
    }

    public function test_admin_only(): void
    {
        $editor = User::factory()->create();
        $this->actingAs($editor)->get(route('admin.fees.index'))->assertForbidden();
        $this->actingAs($editor)->post(route('admin.students.progress.store', $this->student), [])->assertForbidden();
    }
}
