<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\ClassScheduleController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\EnrollmentController;
use App\Http\Controllers\Admin\FreeTrialController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\HeroSlideController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\PageContentController;
use App\Http\Controllers\Admin\PricingController;
use App\Http\Controllers\Admin\QaidaController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SectionController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\StudentImportController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\Admin\TeamMemberController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\UserController;
use App\Support\AdminPermissions;
use Illuminate\Support\Facades\Route;

// Every admin page needs a permission (see App\Support\AdminPermissions).
// The "admin" role passes every check automatically (Gate::before in AppServiceProvider).
Route::prefix('admin')
    ->name('admin.')
    ->middleware('auth')
    ->group(function () {
        // Overview
        Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard')->middleware('permission:view dashboard');

        // Website content
        Route::resource('courses', CourseController::class)->except(['show'])->names('courses')->middleware('permission:manage courses');
        Route::resource('teachers', TeacherController::class)->except(['show'])->names('teachers')->middleware('permission:manage teachers');
        Route::resource('team-members', TeamMemberController::class)->except(['show'])->names('team-members')->middleware('permission:manage team members');
        Route::middleware('permission:manage blog')->group(function () {
            Route::resource('blog', BlogController::class)->except(['show'])->parameters(['blog' => 'post'])->names('blog');
            Route::resource('blog-categories', BlogCategoryController::class)->except(['show'])->parameters(['blog-categories' => 'category'])->names('blog-categories');
        });
        Route::resource('testimonials', TestimonialController::class)->except(['show'])->names('testimonials')->middleware('permission:manage testimonials');
        Route::resource('gallery', GalleryController::class)->except(['show'])->parameters(['gallery' => 'item'])->names('gallery')->middleware('permission:manage gallery');
        Route::resource('sections', SectionController::class)->except(['show'])->names('sections')->middleware('permission:manage sections');
        Route::middleware('permission:manage qaida')->group(function () {
            Route::get('qaida', [QaidaController::class, 'index'])->name('qaida.index');
            Route::post('qaida-pdf', [QaidaController::class, 'uploadPdf'])->name('qaida.pdf.upload');
            Route::delete('qaida-pdf', [QaidaController::class, 'deletePdf'])->name('qaida.pdf.delete');
        });

        // Site setup
        Route::resource('hero-slides', HeroSlideController::class)->except(['show'])->names('hero-slides')->middleware('permission:manage hero slides');
        Route::resource('pricing', PricingController::class)->except(['show'])->parameters(['pricing' => 'plan'])->names('pricing')->middleware('permission:manage pricing');

        Route::middleware('permission:manage page content')->group(function () {
            Route::get('page-content', [PageContentController::class, 'index'])->name('page-content.index');
            Route::get('page-content/{page}', [PageContentController::class, 'show'])->name('page-content.show');
            Route::post('page-content/{page}/sections', [PageContentController::class, 'store'])->name('page-content.store');
            Route::get('page-content/sections/{section}/edit', [PageContentController::class, 'edit'])->name('page-content.edit');
            Route::put('page-content/sections/{section}', [PageContentController::class, 'update'])->name('page-content.update');
            Route::delete('page-content/sections/{section}', [PageContentController::class, 'destroy'])->name('page-content.destroy');
        });

        Route::middleware('permission:manage settings')->group(function () {
            Route::get('settings', [SettingController::class, 'index'])->name('settings.index');
            Route::match(['post', 'put'], 'settings', [SettingController::class, 'update'])->name('settings.update');
        });

        // Students & timetable (admin only)
        Route::middleware('role:' . AdminPermissions::ADMIN_ROLE)->group(function () {
            Route::delete('students', [StudentController::class, 'bulkDestroy'])->name('students.bulk-destroy');
            Route::get('students/import', [StudentImportController::class, 'create'])->name('students.import');
            Route::post('students/import', [StudentImportController::class, 'store'])->name('students.import.store');
            Route::get('students/import/template', [StudentImportController::class, 'template'])->name('students.import.template');
            Route::post('students/from-free-trial/{freeTrial}', [StudentController::class, 'fromFreeTrial'])->name('students.from-free-trial');
            Route::resource('students', StudentController::class)->except(['show']);

            Route::get('classes', [ClassScheduleController::class, 'index'])->name('classes.index');
            Route::get('classes/print', [ClassScheduleController::class, 'print'])->name('classes.print');
            Route::get('classes/export', [ClassScheduleController::class, 'export'])->name('classes.export');
            Route::post('classes', [ClassScheduleController::class, 'store'])->name('classes.store');
            Route::get('classes/{class}/edit', [ClassScheduleController::class, 'edit'])->name('classes.edit');
            Route::put('classes/{class}', [ClassScheduleController::class, 'update'])->name('classes.update');
            Route::delete('classes/{class}', [ClassScheduleController::class, 'destroy'])->name('classes.destroy');
        });

        // Inbox
        Route::middleware('permission:manage enrollments')->group(function () {
            Route::get('enrollments', [EnrollmentController::class, 'index'])->name('enrollments.index');
            Route::delete('enrollments', [EnrollmentController::class, 'bulkDestroy'])->name('enrollments.bulk-destroy');
            Route::get('enrollments/{enrollment}', [EnrollmentController::class, 'show'])->name('enrollments.show');
            Route::patch('enrollments/{enrollment}/status', [EnrollmentController::class, 'updateStatus'])->name('enrollments.status');
            Route::delete('enrollments/{enrollment}', [EnrollmentController::class, 'destroy'])->name('enrollments.destroy');
        });

        Route::middleware('permission:manage free trials')->group(function () {
            Route::get('free-trials', [FreeTrialController::class, 'index'])->name('free-trials.index');
            Route::delete('free-trials', [FreeTrialController::class, 'bulkDestroy'])->name('free-trials.bulk-destroy');
            Route::get('free-trials/{freeTrial}', [FreeTrialController::class, 'show'])->name('free-trials.show');
            Route::post('free-trials/{freeTrial}/status', [FreeTrialController::class, 'updateStatus'])->name('free-trials.status');
            Route::delete('free-trials/{freeTrial}', [FreeTrialController::class, 'destroy'])->name('free-trials.destroy');
        });

        Route::middleware('permission:manage messages')->group(function () {
            Route::get('messages', [MessageController::class, 'index'])->name('messages.index');
            Route::delete('messages', [MessageController::class, 'bulkDestroy'])->name('messages.bulk-destroy');
            Route::get('messages/{message}', [MessageController::class, 'show'])->name('messages.show');
            Route::delete('messages/{message}', [MessageController::class, 'destroy'])->name('messages.destroy');
        });

        // Notification bell (new enrollments / free trials / messages)
        Route::middleware('permission:manage enrollments|manage free trials|manage messages')->group(function () {
            Route::get('notifications', [UserController::class, 'getNotifications'])->name('notifications.index');
            Route::post('notifications/read', [UserController::class, 'markNotificationsRead'])->name('notifications.read');
        });

        // Users, roles & permissions: admin role only, so nobody can give themselves more access.
        Route::middleware('role:' . AdminPermissions::ADMIN_ROLE)->group(function () {
            Route::get('users', [UserController::class, 'index'])->name('users.index');
            Route::post('users', [UserController::class, 'store'])->name('users.store');
            Route::put('users/{user}', [UserController::class, 'update'])->name('users.update');
            Route::delete('users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
            Route::patch('users/{user}/role', [UserController::class, 'updateRole'])->name('users.role');

            Route::get('roles', [RoleController::class, 'index'])->name('roles.index');
            Route::post('roles', [RoleController::class, 'store'])->name('roles.store');
            Route::put('roles/permissions', [RoleController::class, 'updatePermissions'])->name('roles.permissions');
            Route::delete('roles/{role}', [RoleController::class, 'destroy'])->name('roles.destroy');
        });
    });
