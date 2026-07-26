<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GalleryItemSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        $items = [
            ['title' => 'Quran Recitation Class',       'image' => 'settings/project-1.jpg', 'category' => 'Classes',         'sort_order' => 1],
            ['title' => 'Hifz Students Daily Lesson',   'image' => 'settings/project-2.jpg', 'category' => 'Hifz',            'sort_order' => 2],
            ['title' => 'Annual Graduation Ceremony',   'image' => 'settings/project-3.jpg', 'category' => 'Events',          'sort_order' => 3],
            ['title' => 'Islamic Studies Workshop',     'image' => 'settings/project-4.jpg', 'category' => 'Workshops',       'sort_order' => 4],
            ['title' => 'Arabic Language Class',        'image' => 'settings/project-5.jpg', 'category' => 'Classes',         'sort_order' => 5],
            ['title' => 'Tajweed Intensive Session',    'image' => 'settings/project-6.jpg', 'category' => 'Workshops',       'sort_order' => 6],
            ['title' => 'Community Prayer Gathering',   'image' => 'settings/project-7.jpg', 'category' => 'Events',          'sort_order' => 7],
            ['title' => 'Youth Islamic Program',        'image' => 'settings/project-8.jpg', 'category' => 'Events',          'sort_order' => 8],
            ['title' => 'Memorization Competition',     'image' => 'settings/project-9.jpg', 'category' => 'Hifz',            'sort_order' => 9],
            ['title' => 'Weekend Quran Circle',         'image' => 'settings/project-10.jpg','category' => 'Classes',         'sort_order' => 10],
            ['title' => 'Family Islamic Night',         'image' => 'settings/service-1.jpg', 'category' => 'Events',          'sort_order' => 11],
            ['title' => 'Ramadan Special Program',      'image' => 'settings/service-2.jpg', 'category' => 'Events',          'sort_order' => 12],
        ];

        foreach ($items as $item) {
            DB::table('gallery_items')->insert(array_merge($item, [
                'is_active'  => true,
                'created_at' => $now,
                'updated_at' => $now,
            ]));
        }
    }
}
