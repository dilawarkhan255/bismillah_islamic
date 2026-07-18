<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\FreeTrial;
use App\Models\Message;
use App\Models\PricingPlan;
use App\Models\Teacher;
use App\Models\Testimonial;

class AdminController extends Controller
{
    public function dashboard()
    {
        $stats = [
            'teachers' => Teacher::count(),
            'courses' => Course::count(),
            'enrollments_pending' => Enrollment::pending()->count(),
            'messages_unread' => Message::unread()->count(),
            'blog_posts' => BlogPost::count(),
            'testimonials' => Testimonial::count(),
            'free_trials_pending' => FreeTrial::pending()->count(),
        ];

        return view('admin.pages.dashboard', compact('stats'));
    }
}
