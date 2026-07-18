<?php

namespace Database\Seeders;

use App\Models\SiteSetting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class ImageSeeder extends Seeder
{
    public function run(): void
    {
        $images = [
            // Home page
            'img_home_slide_1'      => 'slide-1.jpg',
            'img_home_slide_2'      => 'slide-2.jpg',
            'img_home_slide_3'      => 'slide-3.jpg',
            'img_home_feature'      => 'feature.jpg',
            'img_home_trial'        => 'trial.jpg',
            'img_how_to_learn'      => 'how-to-learn.jpg',
            'img_home_teams'        => 'teams.jpg',

            // About page
            'img_about_hero'        => 'teams-1.jpg',
            'img_about_team'        => 'team-1.jpg',
            'img_about_bg'          => 'about-bg.jpg',

            // Courses page
            'img_courses_hero'      => 'courses-hero.jpg',

            // Gallery page
            'img_gallery_hero'      => 'gallery-hero.jpg',

            // Logo
            'img_logo'              => 'logo.png',

            // Footer gallery
            'img_footer_project_1'  => 'project-1.jpg',
            'img_footer_project_2'  => 'project-2.jpg',
            'img_footer_project_3'  => 'project-3.jpg',
            'img_footer_project_4'  => 'project-4.jpg',
            'img_footer_project_5'  => 'project-5.jpg',
            'img_footer_project_6'  => 'project-6.jpg',

            // Services (homepage)
            'img_service_1'         => 'service-1.jpg',
            'img_service_2'         => 'service-2.jpg',
            'img_service_3'         => 'service-3.jpg',
            'img_service_4'         => 'service-4.jpg',
            'img_service_5'         => 'service-5.jpg',
            'img_service_6'         => 'service-6.jpg',
            'img_service_7'         => 'service-7.jpg',
            'img_service_8'         => 'service-8.jpg',
            'img_service_9'         => 'service-9.jpg',

            // Teams page
            'img_team_1'            => 'team-1.jpg',
            'img_team_2'            => 'team-2.jpg',
            'img_team_3'            => 'team-3.jpg',
            'img_team_4'            => 'team-4.jpg',
            'img_team_5'            => 'team-5.jpg',
            'img_team_6'            => 'team-6.jpg',

            // Testimonials
            'img_testimonial_1'     => 'testimonial-1.jpg',
            'img_testimonial_2'     => 'testimonial-2.jpg',
            'img_testimonial_3'     => 'testimonial-3.jpg',
            'img_testimonial_4'     => 'testimonial-4.jpg',
        ];

        $srcDir = public_path('img');
        $destDir = storage_path('app/public/settings');

        if (!File::isDirectory($destDir)) {
            File::makeDirectory($destDir, 0755, true);
        }

        foreach ($images as $key => $filename) {
            $src = $srcDir . '/' . $filename;
            $dest = $destDir . '/' . $filename;

            if (File::exists($src)) {
                File::copy($src, $dest);
                SiteSetting::set($key, 'settings/' . $filename, 'images');
            }
        }
    }
}
