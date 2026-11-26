<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\GalleryItem;
use App\Models\HeroSlide;
use App\Models\TeamMember;
use App\Models\Teacher;
use App\Models\Testimonial;
use App\Models\Section;
use App\Models\BlogPost;
use App\Models\BlogCategory;
use App\Models\PricingPlan;
use App\Support\ContentCache;

class HomeController extends Controller
{
    public function index()
    {
        $data = ContentCache::remember('home', function () {
            return $this->getHomePageData();
        });

        return view('pages.home', $data);
    }

    protected function getHomePageData(): array
    {
        // Eager load all required data in minimal queries
        $slides = HeroSlide::active()->get(['id', 'title', 'subtitle', 'badge', 'image', 'btn1_text', 'btn1_url', 'btn2_text', 'btn2_url']);
        
        $courses = Course::active()->get(['id', 'title', 'slug', 'description', 'icon', 'image', 'badge', 'badge_color', 'duration', 'level', 'features', 'price', 'sort_order']);
        
        $teachers = Teacher::active()->limit(3)->get(['id', 'name', 'role', 'image', 'facebook_url', 'twitter_url', 'instagram_url', 'linkedin_url', 'is_active']);
        
        $testimonials = Testimonial::active()->get(['id', 'name', 'role', 'country', 'course', 'image', 'text', 'rating', 'is_active']);
        
        // Fetch all home page sections in ONE query
        $homeSections = Section::where('page_name', 'home')
            ->where('is_active', true)
            ->get(['section_key', 'title', 'subtitle', 'description', 'image', 'button_text', 'button_url', 'sort_order'])
            ->keyBy('section_key');

        // Prepare structured section data for the view
        $sections = $this->prepareSectionData($homeSections);

        return compact('slides', 'courses', 'teachers', 'testimonials', 'homeSections', 'sections');
    }

    /**
     * Prepare structured section data from the homeSections collection
     * This eliminates N+1 queries in the Blade template
     */
    protected function prepareSectionData($homeSections): array
    {
        $defaults = [
            'stats' => [
                ['icon' => 'fa fa-certificate', 'num' => '10', 'label' => 'Years Experience'],
                ['icon' => 'fa fa-users-cog', 'num' => '25', 'label' => 'Qualified Teachers'],
                ['icon' => 'fa fa-users', 'num' => '1500', 'label' => 'Satisfied Students'],
                ['icon' => 'fa fa-book-open', 'num' => '500', 'label' => 'Hafiz Graduates'],
            ],
            'skills' => [
                ['label' => 'Quran & Tajweed', 'val' => 99],
                ['label' => 'Islamic Studies', 'val' => 99],
                ['label' => 'Arabic Language', 'val' => 99],
                ['label' => 'Hifz Program', 'val' => 99],
            ],
            'trial_features' => [
                ['icon' => 'fa-user-graduate', 'title' => 'One-on-One Session', 'desc' => 'Personal attention from a certified Quran teacher.'],
                ['icon' => 'fa-clock', 'title' => 'Flexible Timing', 'desc' => 'Choose class time that suits your schedule.'],
                ['icon' => 'fa-shield-alt', 'title' => 'No Commitment', 'desc' => 'Cancel anytime — zero pressure, zero cost.'],
            ],
            'steps' => [
                ['num' => '01', 'icon' => 'fa-user-plus', 'title' => 'Register Online', 'desc' => 'Fill out our simple enrollment form and create your student account in minutes.'],
                ['num' => '02', 'icon' => 'fa-calendar-check', 'title' => 'Book Free Trial', 'desc' => 'Schedule a free trial session with a qualified teacher at your preferred time.'],
                ['num' => '03', 'icon' => 'fa-book-open', 'title' => 'Choose Your Course', 'desc' => 'Pick from Norani Qaida, Tajweed, Hifz, Islamic Studies, Arabic & more.'],
                ['num' => '04', 'icon' => 'fa-chalkboard-teacher', 'title' => 'Start Learning', 'desc' => 'Attend live one-on-one classes via Microsoft Teams — our primary online classroom platform.'],
                ['num' => '05', 'icon' => 'fa-certificate', 'title' => 'Get Certified', 'desc' => 'Earn an official certificate from Bismillah Islamic Academy upon completion.'],
            ],
            'journey' => [
                ['icon' => 'fa-graduation-cap', 'title' => 'Free Trial', 'desc' => 'Start your journey risk-free'],
                ['icon' => 'fa-book-open', 'title' => 'Norani Qaida', 'desc' => 'Build strong foundations'],
                ['icon' => 'fa-quran', 'title' => 'Quran Reading', 'desc' => 'Read fluently with confidence'],
                ['icon' => 'fa-microphone', 'title' => 'Tajweed', 'desc' => 'Perfect your pronunciation'],
                ['icon' => 'fa-trophy', 'title' => 'Hifz ul Quran', 'desc' => 'Achieve mastery & memorization'],
            ],
        ];

        $data = [];

        // Stats (stats_1, stats_2, stats_3, stats_4)
        $stats = [];
        for ($i = 1; $i <= 4; $i++) {
            $key = "stats_{$i}";
            $section = $homeSections->get($key);
            $default = $defaults['stats'][$i - 1];
            $stats[] = [
                'icon' => $section?->subtitle ?: $default['icon'],
                'num' => $section?->description ?: $default['num'],
                'label' => $section?->title ?: $default['label'],
            ];
        }
        $data['stats'] = $stats;

        // Why Choose Us - skills
        $skillsSection = $homeSections->get('skills');
        if ($skillsSection) {
            $skillLabels = explode(',', $skillsSection->title);
            $skillVals = explode(',', $skillsSection->description);
            $skills = [];
            foreach ($skillLabels as $i => $label) {
                $skills[] = [
                    'label' => trim($label),
                    'val' => (int)($skillVals[$i] ?? 99),
                    'delay' => ($i * 0.2) . 's',
                ];
            }
            $data['skills'] = $skills;
        } else {
            $data['skills'] = array_map(function ($skill, $i) {
                return ['label' => $skill['label'], 'val' => $skill['val'], 'delay' => ($i * 0.2) . 's'];
            }, $defaults['skills'], array_keys($defaults['skills']));
        }

        // Trial features (trial_feat_1, trial_feat_2, trial_feat_3)
        $trialFeatures = [];
        foreach (['trial_feat_1', 'trial_feat_2', 'trial_feat_3'] as $tfKey) {
            $tf = $homeSections->get($tfKey);
            if ($tf) {
                $trialFeatures[] = [
                    'icon' => $tf->subtitle,
                    'title' => $tf->title,
                    'desc' => $tf->description,
                ];
            }
        }
        $data['trial_features'] = $trialFeatures ?: $defaults['trial_features'];

        // Steps (step_1 through step_5)
        $stepsData = [];
        foreach (['step_1', 'step_2', 'step_3', 'step_4', 'step_5'] as $i => $sk) {
            $sd = $homeSections->get($sk);
            if ($sd) {
                $stepsData[] = [
                    'num' => str_pad($i + 1, 2, '0', STR_PAD_LEFT),
                    'icon' => $sd->subtitle,
                    'title' => $sd->title,
                    'desc' => $sd->description,
                ];
            }
        }
        $data['steps'] = $stepsData ?: $defaults['steps'];

        // Journey (journey_1 through journey_5)
        $journeyData = [];
        foreach (['journey_1', 'journey_2', 'journey_3', 'journey_4', 'journey_5'] as $jk) {
            $jd = $homeSections->get($jk);
            if ($jd) {
                $journeyData[] = [
                    'icon' => $jd->subtitle,
                    'title' => $jd->title,
                    'desc' => $jd->description,
                ];
            }
        }
        $data['journey'] = $journeyData ?: $defaults['journey'];

        // Single section lookups
        $singleSections = [
            'why_title' => ['title', 'description'],
            'courses_title' => ['title'],
            'courses_btn' => ['title', 'button_url'],
            'trial_title' => ['title', 'description'],
            'how_title' => ['title'],
            'ayah' => ['title', 'subtitle', 'description'],
            'countries' => ['title', 'description'],
            'team_title' => ['title'],
            'testimonials_title' => ['title'],
            'contact_title' => ['title', 'description'],
        ];

        foreach ($singleSections as $key => $fields) {
            $section = $homeSections->get($key);
            $item = [];
            foreach ($fields as $field) {
                $item[$field] = $section?->{$field};
            }
            $data[$key] = $item;
        }

        return $data;
    }

    public function clearCache()
    {
        ContentCache::flush();
        
        return back()->with('success', 'Home page cache cleared successfully.');
    }
}