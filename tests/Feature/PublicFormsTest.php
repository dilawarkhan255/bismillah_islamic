<?php

namespace Tests\Feature;

use App\Mail\VisitorConfirmationMail;
use App\Models\Enrollment;
use App\Models\FreeTrial;
use App\Models\Message;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class PublicFormsTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        Role::findOrCreate('admin');
        config(['services.email.admin_email' => 'admin@example.com']);
        Mail::fake();
    }

    /** What <x-honeypot /> adds: empty trap field + a timer from 30 seconds ago. */
    private function human(array $data): array
    {
        return $data + ['website' => '', 'form_started' => encrypt(time() - 30)];
    }

    public function test_enrollment_sends_confirmation_to_parent(): void
    {
        $this->post('/enroll', $this->human([
            'student_name' => 'Ali', 'parent_name' => 'Sara Khan', 'phone' => '+923001234567',
            'email' => 'sara@example.com', 'age' => 9, 'gender' => 'Male',
            'course' => 'Hifz ul Quran', 'class_type' => 'One-on-One',
        ]))->assertSessionHas('success');

        $this->assertSame(1, Enrollment::count());
        Mail::assertSent(VisitorConfirmationMail::class, fn ($m) => $m->hasTo('sara@example.com') && $m->type === 'enrollment');
    }

    public function test_enrollment_without_email_sends_no_confirmation(): void
    {
        $this->post('/enroll', $this->human([
            'student_name' => 'Ali', 'parent_name' => 'Sara Khan', 'phone' => '+923001234567',
            'age' => 9, 'gender' => 'Male', 'course' => 'Hifz ul Quran', 'class_type' => 'One-on-One',
        ]))->assertSessionHas('success');

        Mail::assertNotSent(VisitorConfirmationMail::class);
    }

    public function test_free_trial_sends_confirmation(): void
    {
        $this->post('/free_trial', $this->human([
            'parent_name' => 'Sara Khan', 'student_name' => 'Ali', 'email' => 'sara@example.com',
            'whatsapp' => '+447400000000', 'age' => '8 – 12 years', 'country' => 'UK',
            'course' => 'Norani Qaida', 'timing' => 'Evening',
        ]))->assertSessionHas('success');

        $this->assertSame(1, FreeTrial::count());
        Mail::assertSent(VisitorConfirmationMail::class, fn ($m) => $m->hasTo('sara@example.com') && $m->type === 'free_trial');
    }

    public function test_contact_sends_confirmation(): void
    {
        $this->post('/contact', $this->human([
            'name' => 'Fatima', 'email' => 'fatima@example.com', 'inquiry' => 'Fees',
            'message' => 'What are the fees for Hifz for my son aged 9?',
        ]))->assertSessionHas('success');

        $this->assertSame(1, Message::count());
        Mail::assertSent(VisitorConfirmationMail::class, fn ($m) => $m->hasTo('fatima@example.com') && $m->type === 'contact');
    }

    public function test_spam_is_not_saved_and_gets_no_email(): void
    {
        $this->post('/contact', $this->human([
            'name' => 'Joanna', 'email' => 'joanna@example.com', 'inquiry' => 'Other',
            'message' => "Hi, I just visited bismillahislamicacademy.com and wondered if you've considered SEO.",
        ]))->assertSessionHas('success');

        $this->assertSame(0, Message::count());
        Mail::assertNothingSent();
    }

    public function test_email_failure_still_shows_success_when_saved(): void
    {
        // the mail server is down: every Mail::to(...) throws
        Mail::shouldReceive('to')->andThrow(new \RuntimeException('SMTP connection failed'));

        $this->post('/enroll', $this->human([
            'student_name' => 'Ali', 'parent_name' => 'Sara Khan', 'phone' => '+923001234567',
            'email' => 'sara@example.com', 'age' => 9, 'gender' => 'Male',
            'course' => 'Hifz ul Quran', 'class_type' => 'One-on-One',
        ]))->assertSessionHas('success')->assertSessionMissing('error');

        $this->post('/contact', $this->human([
            'name' => 'Fatima', 'email' => 'fatima@example.com', 'inquiry' => 'Fees',
            'message' => 'What are the fees for Hifz for my son aged 9?',
        ]))->assertSessionHas('success')->assertSessionMissing('error');

        $this->assertSame(1, Enrollment::count());
        $this->assertSame(1, Message::count());
    }

    public function test_confirmation_email_renders(): void
    {
        $html = (new VisitorConfirmationMail('free_trial', 'Sara', ['Course' => 'Tajweed']))->render();

        $this->assertStringContainsString('Assalamu Alaikum Sara', $html);
        $this->assertStringContainsString('Tajweed', $html);
    }
}
