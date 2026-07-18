<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Mail\EnrollmentMail;
use App\Mail\ContactMail;
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
            Mail::to(config('services.email.admin_email'))->send(new EnrollmentMail($validated));
            User::role('admin')->each(fn($admin) => $admin->notify(new NewEnrollmentNotification($enrollment)));
            try { event(new NewEnrollmentEvent($enrollment)); } catch (\Exception $e) {}
            return back()->with('success', 'Enrollment request submitted! We will contact you soon, In sha Allah.');
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong. Please try again or call us directly.');
        }
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
            Mail::to(config('services.email.admin_email'))->send(new ContactMail($validated));
            User::role('admin')->each(fn($admin) => $admin->notify(new NewMessageNotification($message)));
            try { event(new NewMessageEvent($message)); } catch (\Exception $e) {}
            return back()->with('success', 'Message received! We will respond within 24 hours, In sha Allah.');
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong. Please try again or call us directly.');
        }
    }
}
