<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BlogPostSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        $categories = DB::table('blog_categories')->pluck('id', 'slug');

        $posts = [
            [
                'category_slug' => 'quran-learning',
                'title'         => '10 Proven Tips To Memorize The Quran Faster',
                'excerpt'       => 'Memorizing the Quran is one of the greatest achievements a Muslim can attain. Here are 10 practical tips that have helped thousands of students...',
                'author'        => 'Sheikh Abdullah',
                'published_at'  => '2025-03-05',
                'read_time'     => 5,
                'is_featured'   => true,
            ],
            [
                'category_slug' => 'tajweed',
                'title'         => 'The Importance of Tajweed: Why Correct Recitation Matters',
                'excerpt'       => 'Tajweed is not just a set of rules but a means of honoring the words of Allah. Understanding and applying Tajweed rules transforms your recitation...',
                'author'        => 'Ustaz Ibrahim',
                'published_at'  => '2025-02-20',
                'read_time'     => 7,
                'is_featured'   => false,
            ],
            [
                'category_slug' => 'islamic-parenting',
                'title'         => 'How To Raise Quran-Loving Children in a Modern World',
                'excerpt'       => 'Raising children who love the Quran requires patience, consistency, and the right approach. Here are proven strategies from experienced Islamic educators...',
                'author'        => 'Ustaza Fatima',
                'published_at'  => '2025-02-08',
                'read_time'     => 6,
                'is_featured'   => false,
            ],
            [
                'category_slug' => 'arabic-language',
                'title'         => 'Why Every Muslim Should Learn Arabic',
                'excerpt'       => 'Arabic is the language of the Quran and the key to understanding Islam deeply. Here is why learning Arabic is essential for every Muslim...',
                'author'        => 'Sheikh Abdullah',
                'published_at'  => '2025-01-25',
                'read_time'     => 4,
                'is_featured'   => false,
            ],
            [
                'category_slug' => 'ramadan-guide',
                'title'         => 'A Complete Ramadan Quran Guide',
                'excerpt'       => 'Ramadan is the best time to strengthen your connection with the Quran. This guide covers everything you need to make the most of this blessed month...',
                'author'        => 'Ustaz Ibrahim',
                'published_at'  => '2025-01-10',
                'read_time'     => 8,
                'is_featured'   => false,
            ],
            [
                'category_slug' => 'islamic-studies',
                'title'         => 'Understanding Aqeedah: The Foundation of Islamic Belief',
                'excerpt'       => 'Aqeedah forms the bedrock of every Muslim\'s faith. This article explores the core beliefs every Muslim should understand and strengthen...',
                'author'        => 'Sheikh Abdullah',
                'published_at'  => '2024-12-18',
                'read_time'     => 9,
                'is_featured'   => false,
            ],
        ];

        foreach ($posts as $post) {
            DB::table('blog_posts')->insert([
                'category_id'  => $categories[$post['category_slug']] ?? null,
                'title'        => $post['title'],
                'slug'         => Str::slug($post['title']),
                'excerpt'      => $post['excerpt'],
                'content'      => $post['excerpt'],
                'author'       => $post['author'],
                'published_at' => $post['published_at'],
                'read_time'    => $post['read_time'],
                'is_featured'  => $post['is_featured'],
                'is_active'    => true,
                'created_at'   => $now,
                'updated_at'   => $now,
            ]);
        }
    }
}
