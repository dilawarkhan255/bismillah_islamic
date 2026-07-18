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
