<?php

namespace App\Providers;

use App\Models\BlogCategory;
use App\Models\BlogPost;
use App\Models\Course;
use App\Models\Faq;
use App\Models\GalleryItem;
use App\Models\HeroSlide;
use App\Models\PricingPlan;
use App\Models\Section;
use App\Models\SiteSetting;
use App\Models\Teacher;
use App\Models\TeamMember;
use App\Models\Testimonial;
use App\Support\AdminPermissions;
use App\Support\ContentCache;
use Illuminate\Support\Facades\Gate;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // The admin role can do everything, including permissions added in the future.
        Gate::before(fn ($user) => $user->hasRole(AdminPermissions::ADMIN_ROLE) ? true : null);

        // Public forms (enroll, contact, free trial): stop spam floods per visitor IP.
        RateLimiter::for('public-forms', function (Request $request) {
            $tooMany = fn () => back()->withInput()->with('error', 'Too many requests. Please wait a few minutes and try again, or contact us on WhatsApp.');

            return [
                Limit::perMinute(5)->by('min:' . $request->ip())->response($tooMany),
                Limit::perDay(20)->by('day:' . $request->ip())->response($tooMany),
            ];
        });

        // Refresh every cached public page whenever site content changes.
        $flush = function () {
            ContentCache::flush();
            Section::clearLookup();
            SiteSetting::clearLookup();
        };

        $contentModels = [
            BlogCategory::class, BlogPost::class, Course::class, Faq::class, GalleryItem::class,
            HeroSlide::class, PricingPlan::class, Section::class, SiteSetting::class,
            Teacher::class, TeamMember::class, Testimonial::class,
        ];

        foreach ($contentModels as $model) {
            $model::saved($flush);
            $model::deleted($flush);
        }
    }
}
