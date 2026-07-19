<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\EnrollmentController;
use App\Http\Controllers\Admin\FreeTrialController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\HeroSlideController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\PricingController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\Admin\TeamMemberController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

// Content management — admin + editor
Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth', 'role_or_permission:admin|editor'])
    ->group(function () {
        Route::resource('teachers', TeacherController::class)->except(['show'])->names('teachers');
        Route::resource('courses', CourseController::class)->except(['show'])->names('courses');
        Route::resource('blog', BlogController::class)->except(['show'])->names('blog');
        Route::resource('blog-categories', BlogCategoryController::class)->except(['show'])->names('blog-categories');
        Route::resource('testimonials', TestimonialController::class)->except(['show'])->names('testimonials');
        Route::resource('gallery', GalleryController::class)->except(['show'])->names('gallery');
        Route::resource('team-members', TeamMemberController::class)->except(['show'])->names('team-members');
    });

// Admin-only routes
Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth', 'role:admin'])
    ->group(function () {
        Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::resource('hero-slides', HeroSlideController::class)->except(['show'])->names('hero-slides');
        Route::resource('pricing', PricingController::class)->except(['show'])->names('pricing');

        // Enrollments
        Route::get('enrollments', [EnrollmentController::class, 'index'])->name('enrollments.index');
        Route::get('enrollments/{enrollment}', [EnrollmentController::class, 'show'])->name('enrollments.show');
        Route::patch('enrollments/{enrollment}/status', [EnrollmentController::class, 'updateStatus'])->name('enrollments.status');

        // Messages
        Route::get('messages', [MessageController::class, 'index'])->name('messages.index');
        Route::get('messages/{message}', [MessageController::class, 'show'])->name('messages.show');
        Route::delete('messages/{message}', [MessageController::class, 'destroy'])->name('messages.destroy');

        // Free Trials
        Route::get('free-trials', [FreeTrialController::class, 'index'])->name('free-trials.index');
        Route::get('free-trials/{freeTrial}', [FreeTrialController::class, 'show'])->name('free-trials.show');
        Route::post('free-trials/{freeTrial}/status', [FreeTrialController::class, 'updateStatus'])->name('free-trials.status');

        // User Management
        Route::get('users', [UserController::class, 'index'])->name('users.index');
        Route::post('users', [UserController::class, 'store'])->name('users.store');
        Route::put('users/{user}', [UserController::class, 'update'])->name('users.update');
        Route::delete('users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
        Route::patch('users/{user}/role', [UserController::class, 'updateRole'])->name('users.role');

        // Notifications API
        Route::get('notifications', [UserController::class, 'getNotifications'])->name('notifications.index');
        Route::post('notifications/read', [UserController::class, 'markNotificationsRead'])->name('notifications.read');

        // Settings
        Route::get('settings', [SettingController::class, 'index'])->name('settings.index');
        Route::put('settings', [SettingController::class, 'update'])->name('settings.update');
    });
