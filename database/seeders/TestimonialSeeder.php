<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        $testimonials = [
            [
                'name'       => 'Ahmad Khan',
                'role'       => 'Parent',
                'image'      => 'settings/testimonial-1.jpg',
                'text'       => 'Alhamdulillah, my son memorized 5 Juz in just one year. The teachers are dedicated and the environment is truly Islamic.',
                'rating'     => 5,
                'sort_order' => 1,
            ],
            [
                'name'       => 'Sarah Bibi',
                'role'       => 'Parent',
                'image'      => 'settings/testimonial-2.jpg',
                'text'       => 'My daughter improved her Tajweed tremendously. The academy provides a wonderful learning atmosphere for children.',
                'rating'     => 5,
                'sort_order' => 2,
            ],
            [
                'name'       => 'Omar Farooq',
                'role'       => 'Student',
                'image'      => 'settings/testimonial-3.jpg',
                'text'       => 'The Arabic language course helped me understand the Quran directly. Highly recommend to every Muslim.',
                'rating'     => 5,
                'sort_order' => 3,
            ],
            [
                'name'       => 'Aisha Rahman',
                'role'       => 'Parent',
                'image'      => 'settings/testimonial-4.jpg',
                'text'       => 'Best Islamic school in the area. The scholars here are very knowledgeable and approachable. JazakAllah Khair!',
                'rating'     => 5,
                'sort_order' => 4,
            ],
        ];

        foreach ($testimonials as $testimonial) {
            DB::table('testimonials')->insert(array_merge($testimonial, [
                'is_active'  => true,
                'created_at' => $now,
                'updated_at' => $now,
            ]));
        }
    }
}
