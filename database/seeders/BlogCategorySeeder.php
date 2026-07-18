<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BlogCategorySeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        $categories = [
            ['name' => 'Quran Learning',    'color' => '#AE8225', 'sort_order' => 1],
            ['name' => 'Tajweed',            'color' => '#0f766e', 'sort_order' => 2],
            ['name' => 'Islamic Parenting',  'color' => '#d97706', 'sort_order' => 3],
            ['name' => 'Arabic Language',    'color' => '#7B5EA7', 'sort_order' => 4],
            ['name' => 'Ramadan Guide',      'color' => '#dc2626', 'sort_order' => 5],
            ['name' => 'Islamic Studies',    'color' => '#2563eb', 'sort_order' => 6],
        ];

        foreach ($categories as $category) {
            DB::table('blog_categories')->insert([
                'name'        => $category['name'],
                'slug'        => Str::slug($category['name']),
                'color'       => $category['color'],
                'sort_order'  => $category['sort_order'],
                'is_active'   => true,
                'created_at'  => $now,
                'updated_at'  => $now,
            ]);
        }
    }
}
