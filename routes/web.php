<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FormController;

Route::post('/enroll', [FormController::class, 'enroll'])->name('enroll');
Route::post('/contact', [FormController::class, 'contact'])->name('contact');

Route::get('/', function () {
    return view('pages.home');
})->name('home');

Route::get('/about', function () {
    return view('pages.about');
})->name('about');

Route::get('/courses', function () {
    return view('pages.courses');
})->name('courses');

Route::get('/gallery', function () {
    return view('pages.gallery');
})->name('gallery');

Route::get('/blog', function () {
    return view('pages.blog');
})->name('blog');

Route::get('/team', function () {
    return view('pages.team');
})->name('team');

Route::get('/contact', function () {
    return view('pages.contact');
})->name('contact');

Route::get('/free_trial', function () {
    return view('pages.free_trial');
})->name('free_trial');

Route::get('/pricing', function () {
    return view('pages.pricing');
})->name('pricing');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
