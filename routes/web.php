<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\SeoController;
use App\Http\Controllers\QaidaController;
use App\Http\Controllers\StudentPortalController;
use App\Models\Course;
use App\Models\GalleryItem;
use App\Models\PricingPlan;
use App\Models\Teacher;
use App\Models\TeamMember;
use App\Support\ContentCache;
use Illuminate\Support\Facades\Route;

// Public forms: rate limited per IP + honeypot spam trap (see AppServiceProvider / BlockSpamBots)
Route::middleware(['throttle:public-forms', 'honeypot'])->group(function () {
    Route::post('/enroll', [FormController::class, 'enroll'])->name('enroll');
    Route::post('/contact', [FormController::class, 'contact'])->name('contact.submit');
    Route::post('/free_trial', [FormController::class, 'freeTrial'])->name('free_trial.submit');
});

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/sitemap.xml', [SeoController::class, 'sitemap'])->name('sitemap');
Route::get('/robots.txt', [SeoController::class, 'robots'])->name('robots');
Route::get('/home/clear-cache', [HomeController::class, 'clearCache'])->name('home.clear-cache')->middleware('auth', 'role:admin');

Route::get('/about', function () {
    $teachers = ContentCache::remember('teachers.active', fn () => Teacher::active()->get());
    return view('pages.about', compact('teachers'));
})->name('about');

Route::get('/courses', function () {
    $courses = ContentCache::remember('courses.active', fn () => Course::active()->get());
    return view('pages.courses', compact('courses'));
})->name('courses');

Route::get('/gallery', function () {
    $gallery = ContentCache::remember('gallery.active', fn () => GalleryItem::active()->get());
    return view('pages.gallery', compact('gallery'));
})->name('gallery');

Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');

// Student portal: private progress link for parents, and certificate check
Route::get('/progress/{token}', [StudentPortalController::class, 'progress'])->where('token', '[A-Za-z0-9]{32}')->name('progress.show');
Route::get('/certificate/{certificate}', [StudentPortalController::class, 'certificate'])->name('certificate.show');

Route::get('/norani-qaida', [QaidaController::class, 'index'])->name('qaida');
Route::get('/norani-qaida/{slug}', [QaidaController::class, 'show'])->name('qaida.show');

Route::get('/team', function () {
    $teachers = ContentCache::remember('teachers.active', fn () => Teacher::active()->get());
    return view('pages.team', compact('teachers'));
})->name('team');

Route::get('/our-team', function () {
    $members = ContentCache::remember('team-members.active', fn () => TeamMember::active()->get());
    return view('pages.our-team', compact('members'));
})->name('our-team');

Route::get('/team-member/{teamMember}', function (TeamMember $teamMember) {
    return view('pages.team-member-profile', ['member' => $teamMember]);
})->name('team-member.profile');

Route::get('/team/{teacher}', function (Teacher $teacher) {
    return view('pages.teacher-profile', compact('teacher'));
})->name('teacher.profile');

Route::get('/contact', function () {
    $courses = ContentCache::remember('courses.titles', fn () => Course::active()->pluck('title'));
    return view('pages.contact', compact('courses'));
})->name('contact');

Route::get('/free_trial', function () {
    $courses = ContentCache::remember('courses.titles', fn () => Course::active()->pluck('title'));
    return view('pages.free_trial', compact('courses'));
})->name('free_trial');

// Old links (hero slides, page CTAs saved in the DB) used /free-trial
Route::redirect('/free-trial', '/free_trial', 301);
Route::redirect('/teachers', '/team', 301);

Route::get('/pricing', function () {
    $plans = ContentCache::remember('pricing.active', fn () => PricingPlan::active()->get());
    return view('pages.pricing', compact('plans'));
})->name('pricing');

Route::get('/privacy_policy', function () {
    return view('pages.privacy_policy');
})->name('privacy_policy');

// After login: send each person to the first admin page their permissions allow.
Route::get('/dashboard', function () {
    $url = \App\Support\AdminPermissions::homeUrlFor(auth()->user());

    return $url
        ? redirect()->to($url)
        : redirect()->route('home')->with('error', 'Your account does not have access to the admin panel.');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
