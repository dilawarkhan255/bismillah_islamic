<?php

use App\Http\Controllers\ProfileController;
use App\Models\Teacher;
use App\Models\Course;
use App\Models\Testimonial;
use App\Models\HeroSlide;
use App\Models\BlogPost;
use App\Models\BlogCategory;
use App\Models\PricingPlan;
use App\Models\GalleryItem;
use App\Models\SiteSetting;
use Illuminate\Support\Facades\Route;

Route::post('/enroll', [\App\Http\Controllers\FormController::class, 'enroll'])->name('enroll');
Route::post('/contact', [\App\Http\Controllers\FormController::class, 'contact'])->name('contact.submit');

Route::get('/', function () {
    $slides = HeroSlide::active()->get();
    $courses = Course::active()->get();
    $teachers = Teacher::active()->limit(3)->get();
    $testimonials = Testimonial::active()->get();
    return view('pages.home', compact('slides', 'courses', 'teachers', 'testimonials'));
})->name('home');

Route::get('/about', function () {
    $teachers = Teacher::active()->get();
    return view('pages.about', compact('teachers'));
})->name('about');

Route::get('/courses', function () {
    $courses = Course::active()->get();
    return view('pages.courses', compact('courses'));
})->name('courses');

Route::get('/gallery', function () {
    $gallery = GalleryItem::active()->get();
    return view('pages.gallery', compact('gallery'));
})->name('gallery');

Route::get('/blog', function () {
    $posts = BlogPost::active()->with('category')->get();
    $categories = BlogCategory::active()->withCount('posts')->get();
    $featured = BlogPost::active()->where('is_featured', true)->first();
    $recent = BlogPost::active()->limit(3)->get();
    return view('pages.blog', compact('posts', 'categories', 'featured', 'recent'));
})->name('blog');

Route::get('/team', function () {
    $teachers = Teacher::active()->get();
    return view('pages.team', compact('teachers'));
})->name('team');

Route::get('/our-team', function () {
    $teachers = Teacher::active()->get();
    return view('pages.our-team', compact('teachers'));
})->name('our-team');

Route::get('/team/{teacher}', function (Teacher $teacher) {
    return view('pages.teacher-profile', compact('teacher'));
})->name('teacher.profile');

Route::get('/contact', function () {
    $courses = Course::active()->pluck('title');
    return view('pages.contact', compact('courses'));
})->name('contact');

Route::get('/free_trial', function () {
    $courses = Course::active()->pluck('title');
    return view('pages.free_trial', compact('courses'));
})->name('free_trial');

Route::get('/pricing', function () {
    $plans = PricingPlan::active()->get();
    return view('pages.pricing', compact('plans'));
})->name('pricing');

Route::get('/privacy_policy', function () {
    return view('pages.privacy_policy');
})->name('privacy_policy');

Route::get('/dashboard', function () {
    if (auth()->check() && (auth()->user()->hasRole('admin') || auth()->user()->hasRole('editor'))) {
        return redirect()->route('admin.dashboard');
    }
    return redirect()->route('home');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
