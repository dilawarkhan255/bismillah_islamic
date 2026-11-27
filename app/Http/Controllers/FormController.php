<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Mail\EnrollmentMail;
use App\Mail\ContactMail;
use App\Mail\VisitorConfirmationMail;
use App\Models\Enrollment;
use App\Models\Message;
use App\Models\FreeTrial;
use App\Models\User;
use App\Notifications\NewMessageNotification;
use App\Notifications\NewEnrollmentNotification;
use App\Notifications\NewFreeTrialNotification;
use App\Events\NewMessageEvent;
use App\Events\NewEnrollmentEvent;
use App\Events\NewFreeTrialEvent;

class FormController extends Controller
{
    public function enroll(Request $request)
    {
        $validated = $request->validate([
            'student_name'  => 'required|string|max:100',
            'parent_name'   => 'required|string|max:100',
            'phone'         => 'required|string|max:20',
            'email'         => 'nullable|email|max:100',
            'age'           => 'required|integer|min:4|max:60',
            'gender'        => 'required|in:Male,Female',
            'course'        => 'required|string',
            'class_type'    => 'required|string',
            'message'       => 'nullable|string|max:1000',
        ]);

        try {
            $enrollment = Enrollment::create($validated);
        } catch (\Throwable $e) {
            report($e);
            return back()->withInput()->with('error', 'Something went wrong. Please try again or call us directly.');
        }

        // The request is saved; an email or notification problem must not show the visitor an error.
        $this->afterSave('enrollment', [
            fn () => Mail::to(config('services.email.admin_email'))->send(new EnrollmentMail($validated)),
            fn () => User::role('admin')->each(fn ($admin) => $admin->notify(new NewEnrollmentNotification($enrollment))),
            fn () => event(new NewEnrollmentEvent($enrollment)),
        ]);
        $this->sendConfirmation($validated['email'] ?? null, 'enrollment', $validated['parent_name'], [
            'Student'    => $validated['student_name'],
            'Course'     => $validated['course'],
            'Class type' => $validated['class_type'],
            'Phone'      => $validated['phone'],
        ]);

        return back()->with('success', 'Enrollment request submitted! We will contact you soon, In sha Allah.');
    }

    public function freeTrial(Request $request)
    {
        $validated = $request->validate([
            'parent_name'    => 'required|string|max:100',
            'student_name'   => 'required|string|max:100',
            'email'          => 'required|email|max:100',
            'whatsapp'       => 'required|string|max:20',
            'age'            => 'required|in:4 – 7 years,8 – 12 years,13 – 17 years,18+ (Adult)',
            'country'        => 'required|string|max:50',
            'course'         => 'required|string|max:100',
            'timing'         => 'required|string|max:150',
            'teacher_gender' => 'nullable|in:Male Teacher,Female Teacher',
            'message'        => 'nullable|string|max:1000',
        ]);

        try {
            $freeTrial = FreeTrial::create([
                'student_name'    => $validated['student_name'],
                'parent_name'     => $validated['parent_name'],
                'phone'           => $validated['whatsapp'],
                'whatsapp_number' => $validated['whatsapp'],
                'email'           => $validated['email'],
                'country'         => $validated['country'],
                'age_range'       => $validated['age'],
                'course'          => $validated['course'],
                'preferred_time'  => $validated['timing'],
                'teacher_gender'  => $validated['teacher_gender'] ?? null,
                'message'         => $validated['message'] ?? null,
                'status'          => 'pending',
            ]);
        } catch (\Exception $e) {
            report($e);
            return back()->withInput()->with('error', 'Something went wrong. Please try again or contact us on WhatsApp.');
        }

        // The request is saved; a notification failure must not show the visitor an error.
        try {
            User::role('admin')->each(fn($admin) => $admin->notify(new NewFreeTrialNotification($freeTrial)));
        } catch (\Exception $e) {
            report($e);
        }
        try { event(new NewFreeTrialEvent($freeTrial)); } catch (\Exception $e) {}
        $this->sendConfirmation($validated['email'], 'free_trial', $validated['parent_name'], [
            'Student'        => $validated['student_name'],
            'Course'         => $validated['course'],
            'Preferred time' => $validated['timing'],
            'WhatsApp'       => $validated['whatsapp'],
        ]);

        return back()->with('success', 'Your free trial is booked! We will contact you on WhatsApp within 24 hours, In sha Allah.');
    }

    public function contact(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:100',
            'email'   => 'required|email|max:100',
            'phone'   => 'nullable|string|max:20',
            'inquiry' => 'required|string',
            'message' => 'required|string|max:2000',
        ]);

        try {
            $message = Message::create($validated);
        } catch (\Throwable $e) {
            report($e);
            return back()->withInput()->with('error', 'Something went wrong. Please try again or call us directly.');
        }

        // The message is saved; an email or notification problem must not show the visitor an error.
        $this->afterSave('message', [
            fn () => Mail::to(config('services.email.admin_email'))->send(new ContactMail($validated)),
            fn () => User::role('admin')->each(fn ($admin) => $admin->notify(new NewMessageNotification($message))),
            fn () => event(new NewMessageEvent($message)),
        ]);
        $this->sendConfirmation($validated['email'], 'contact', $validated['name'], [
            'Subject' => $validated['inquiry'],
        ]);

        return back()->with('success', 'Message received! We will respond within 24 hours, In sha Allah.');
    }

    /**
     * Runs each follow-up step (admin email, notifications, live event) on its own:
     * one failing never stops the others, and every failure is written to the log.
     */
    private function afterSave(string $what, array $steps): void
    {
        foreach ($steps as $step) {
            try {
                $step();
            } catch (\Throwable $e) {
                report($e);
            }
        }
    }

    /** "We received your request" email to the visitor. A mail failure never affects the form. */
    private function sendConfirmation(?string $email, string $type, string $name, array $details): void
    {
        if (! $email) {
            return;
        }

        try {
            Mail::to($email)->send(new VisitorConfirmationMail($type, $name, $details));
        } catch (\Throwable $e) {
            report($e);
        }
    }
}
