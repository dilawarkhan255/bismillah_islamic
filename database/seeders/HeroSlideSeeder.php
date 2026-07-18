<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HeroSlideSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        $slides = [
            [
                'badge'       => '✦ Bismillah Islamic Academy ✦',
                'title'       => 'Learn The Holy Quran',
                'subtitle'    => 'Read in the name of your Lord who created',
                'image'       => 'settings/slide-1.jpg',
                'btn1_text'   => 'Start Learning',
                'btn1_url'    => '/courses',
                'btn2_text'   => 'Free Trial',
                'btn2_url'    => '/free-trial',
                'sort_order'  => 1,
            ],
            [
                'badge'       => '✦ Join Our Community ✦',
                'title'       => 'Islamic Education For Every Age',
                'subtitle'    => 'Quran, Tajweed, Hadith, Islamic Studies & Arabic Language',
                'image'       => 'settings/slide-2.jpg',
                'btn1_text'   => 'View Courses',
                'btn1_url'    => '/courses',
                'btn2_text'   => 'Contact Us',
                'btn2_url'    => '/contact',
                'sort_order'  => 2,
            ],
            [
                'badge'       => '✦ Expert Teachers ✦',
                'title'       => 'Certified Scholars & Hafiz-e-Quran',
                'subtitle'    => 'Learn from qualified Islamic scholars',
                'image'       => 'settings/slide-3.jpg',
                'btn1_text'   => 'Our Teachers',
                'btn1_url'    => '/teachers',
                'btn2_text'   => 'Enroll Now',
                'btn2_url'    => '/free-trial',
                'sort_order'  => 3,
            ],
        ];

        foreach ($slides as $slide) {
            DB::table('hero_slides')->insert(array_merge($slide, [
                'is_active'  => true,
                'created_at' => $now,
                'updated_at' => $now,
            ]));
        }
    }
}
