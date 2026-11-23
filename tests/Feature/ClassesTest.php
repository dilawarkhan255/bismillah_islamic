<?php

namespace Tests\Feature;

use App\Models\ClassSchedule;
use App\Models\FreeTrial;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use Carbon\CarbonImmutable;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class ClassesTest extends TestCase
{
    use RefreshDatabase;

    private User $admin;

    private Teacher $teacher;

    protected function setUp(): void
    {
        parent::setUp();
        Role::findOrCreate('admin');
        $this->admin = User::factory()->create();
        $this->admin->assignRole('admin');
        $this->teacher = Teacher::create(['name' => 'Hafiz Kamran', 'role' => 'Quran Teacher', 'is_active' => true]);
        // a winter Monday: UK is UTC+0, Pakistan UTC+5, New York UTC-5
        CarbonImmutable::setTestNow(CarbonImmutable::parse('2026-12-07 10:00', 'Asia/Karachi'));
    }

    protected function tearDown(): void
    {
        CarbonImmutable::setTestNow();
        parent::tearDown();
    }

    private function student(string $tz = 'Europe/London'): Student
    {
        return Student::create(['name' => 'Ali Khan', 'timezone' => $tz, 'status' => 'active', 'course' => 'Norani Qaida']);
    }

    private function classFor(Student $s, string $time, array $days = [1, 3, 5]): ClassSchedule
    {
        return ClassSchedule::create([
            'student_id' => $s->id, 'teacher_id' => $this->teacher->id, 'days' => $days,
            'start_time' => $time, 'duration_minutes' => 30, 'status' => 'active',
        ]);
    }

    public function test_admin_adds_student_and_class(): void
    {
        $this->actingAs($this->admin)->post(route('admin.students.store'), [
            'name' => 'Ali Khan', 'timezone' => 'Europe/London', 'status' => 'active',
        ])->assertRedirect();

        $student = Student::firstOrFail();

        $this->actingAs($this->admin)->post(route('admin.classes.store'), [
            'student_id' => $student->id, 'teacher_id' => $this->teacher->id, 'days' => [5, 1, 3],
            'start_time' => '16:00', 'duration_minutes' => 30, 'status' => 'active',
        ])->assertRedirect(route('admin.students.edit', $student));

        $class = ClassSchedule::firstOrFail();
        $this->assertSame([1, 3, 5], $class->days);
        $this->assertSame('Mon, Wed, Fri', $class->days_label);
    }

    public function test_student_time_is_converted(): void
    {
        $uk = $this->classFor($this->student('Europe/London'), '16:00');
        $this->assertSame('4:00 PM', $uk->time_label);
        $this->assertSame('11:00 AM', $uk->local_time_label);

        // 3 AM Monday in Pakistan is 5 PM Sunday in New York
        $us = $this->classFor($this->student('America/New_York'), '03:00', [1]);
        $this->assertSame('5:00 PM (day before)', $us->local_time_label);
        $this->assertSame('Sun', $us->local_days_label);

        $pk = $this->classFor($this->student('Asia/Karachi'), '16:00');
        $this->assertNull($pk->local_time_label);
    }

    public function test_teacher_clash_is_warned(): void
    {
        $this->classFor($this->student(), '16:00', [1, 3]);
        $other = Student::create(['name' => 'Sara', 'timezone' => 'Asia/Karachi', 'status' => 'active']);

        $this->actingAs($this->admin)->post(route('admin.classes.store'), [
            'student_id' => $other->id, 'teacher_id' => $this->teacher->id, 'days' => [3],
            'start_time' => '16:15', 'duration_minutes' => 30, 'status' => 'active',
        ])->assertSessionHas('warning');

        $this->actingAs($this->admin)->post(route('admin.classes.store'), [
            'student_id' => $other->id, 'teacher_id' => $this->teacher->id, 'days' => [3],
            'start_time' => '16:45', 'duration_minutes' => 30, 'status' => 'active', // starts as the 16:15 class ends
        ])->assertSessionMissing('warning');
    }

    public function test_timetable_filters_print_and_export(): void
    {
        $this->classFor($this->student(), '16:00', [1, 3]);
        $friday = $this->classFor(Student::create(['name' => 'Friday Kid', 'timezone' => 'Asia/Karachi', 'status' => 'active']), '18:00', [5]);

        $this->actingAs($this->admin)->get(route('admin.classes.index'))
            ->assertOk()->assertSee('Ali Khan')->assertSee('Friday Kid');

        $this->actingAs($this->admin)->get(route('admin.classes.index', ['day' => 'today'])) // Monday
            ->assertOk()->assertSee('Ali Khan')->assertDontSee('Friday Kid');

        $this->actingAs($this->admin)->get(route('admin.classes.print', ['teacher' => $this->teacher->id]))
            ->assertOk()->assertSee('Hafiz Kamran')->assertSee('Ali Khan');

        $csv = $this->actingAs($this->admin)->get(route('admin.classes.export'))->assertOk()->streamedContent();
        $this->assertStringContainsString('Ali Khan', $csv);
        $this->assertStringContainsString('11:00 AM', $csv);

        $friday->student->update(['status' => 'left']);
        $this->actingAs($this->admin)->get(route('admin.classes.index'))->assertDontSee('Friday Kid');
    }

    public function test_free_trial_becomes_student(): void
    {
        $trial = FreeTrial::create([
            'student_name' => 'Yusuf', 'parent_name' => 'Amina', 'phone' => '+447400000000',
            'whatsapp_number' => '+447400000000', 'email' => 'amina@example.com', 'country' => 'United Kingdom',
            'age_range' => '8 – 12 years', 'course' => 'Tajweed', 'preferred_time' => 'Evening', 'status' => 'pending',
        ]);

        $this->actingAs($this->admin)->post(route('admin.students.from-free-trial', $trial))->assertRedirect();

        $student = Student::firstOrFail();
        $this->assertSame('Yusuf', $student->name);
        $this->assertSame('Europe/London', $student->timezone);
        $this->assertSame('approved', $trial->fresh()->status);

        // second click opens the same student instead of making a copy
        $this->actingAs($this->admin)->post(route('admin.students.from-free-trial', $trial));
        $this->assertSame(1, Student::count());
    }

    public function test_pages_render_and_non_admins_are_blocked(): void
    {
        $student = $this->student();
        $class = $this->classFor($student, '16:00');

        foreach ([route('admin.students.index'), route('admin.students.create'), route('admin.students.edit', $student), route('admin.classes.edit', $class)] as $url) {
            $this->actingAs($this->admin)->get($url)->assertOk();
        }

        $editor = User::factory()->create();
        $this->actingAs($editor)->get(route('admin.classes.index'))->assertForbidden();
        $this->actingAs($editor)->get(route('admin.students.index'))->assertForbidden();
    }

    public function test_deleting_a_student_deletes_their_classes(): void
    {
        $student = $this->student();
        $this->classFor($student, '16:00');

        $this->actingAs($this->admin)->delete(route('admin.students.destroy', $student))->assertRedirect();

        $this->assertSame(0, ClassSchedule::count());
    }
}
