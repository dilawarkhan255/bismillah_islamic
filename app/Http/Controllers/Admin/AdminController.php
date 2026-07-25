<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\FreeTrial;
use App\Models\GalleryItem;
use App\Models\Message;
use App\Models\PricingPlan;
use App\Models\Section;
use App\Models\Teacher;
use App\Models\TeamMember;
use App\Models\Testimonial;

class AdminController extends Controller
{
    public function dashboard()
    {
        $stats = [
            'teachers'           => Teacher::count(),
            'team_members'       => TeamMember::count(),
            'courses'            => Course::count(),
            'blog_posts'         => BlogPost::count(),
            'testimonials'       => Testimonial::count(),
            'gallery_items'      => GalleryItem::count(),
            'sections_managed'   => Section::count(),
            'pages_managed'      => Section::distinct('page_name')->count('page_name'),
            'enrollments_total'  => Enrollment::count(),
            'enrollments_pending'=> Enrollment::pending()->count(),
            'messages_total'     => Message::count(),
            'messages_unread'    => Message::unread()->count(),
            'free_trials_total'  => FreeTrial::count(),
            'free_trials_pending'=> FreeTrial::pending()->count(),
        ];

        return view('admin.pages.dashboard', compact('stats'));
    }
}
