<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\EnrollmentMail;
use App\Mail\ContactMail;

class FormController extends Controller
{
    // ── Enrollment Form ──────────────────────────────
    public function enroll(Request $request)
    {
        $validated = $request->validate([
            'student_name' => 'required|string|max:100',
            'parent_name' => 'required|string|max:100',
            'phone' => 'required|string|max:20',
            'email' => 'nullable|email|max:100',
            'age' => 'required|integer|min:4|max:60',
            'gender' => 'required|in:Male,Female',
            'course' => 'required|string',
            'class_type' => 'required|string',
            'message' => 'nullable|string|max:1000',
        ]);

        try {
            Mail::to('dilawarscrumad@gmail.com')
                ->send(new EnrollmentMail($validated));

            return back()->with('success', 'Enrollment request submitted! We will contact you soon, In sha Allah.');

        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong. Please try again or call us directly.');
        }
    }

    // ── Contact Form ──────────────────────────────────
    public function contact(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'phone' => 'nullable|string|max:20',
            'inquiry' => 'required|string',
            'message' => 'required|string|max:2000',
        ]);

        try {
            Mail::to('dilawarscrumad@gmail.com')
                ->send(new ContactMail($validated));

            return back()->with('success', 'Message received! We will respond within 24 hours, In sha Allah.');

        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong. Please try again or call us directly.');
        }
    }
}
