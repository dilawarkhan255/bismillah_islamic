<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CourseSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        $courses = [
            [
                'title'       => 'Norani Qaida',
                'description' => 'Build a strong foundation in Arabic reading with our Norani Qaida course, perfect for beginners of all ages.',
                'icon'        => 'fa-book-open',
                'image'       => 'settings/service-1.jpg',
                'duration'    => '2-4 Months',
                'level'       => 'Beginner',
                'features'    => ['Arabic Alphabets & Basic Shapes', 'Short Vowels (Harakat)', 'Letter Joining Rules', 'Reading Short Words & Sentences'],
                'sort_order'  => 1,
            ],
            [
                'title'       => 'Quran Recitation (Nazra)',
                'description' => 'Learn to read the Holy Quran fluently with proper pronunciation and basic Tajweed rules.',
                'icon'        => 'fa-quran',
                'image'       => 'settings/service-2.jpg',
                'duration'    => '3-6 Months',
                'level'       => 'Beginner',
                'features'    => ['Arabic Alphabet Mastery', 'Harakat & Tanween', 'Joining Letters', 'Basic Quran Reading'],
                'sort_order'  => 2,
            ],
            [
                'title'       => 'Tajweed ul Quran',
                'description' => 'Master the science of Tajweed and recite the Quran with perfect pronunciation and fluency.',
                'icon'        => 'fa-microphone',
                'image'       => 'settings/service-3.jpg',
                'duration'    => '6-12 Months',
                'level'       => 'Intermediate',
                'features'    => ['Makharij al-Huruf', 'Sifat al-Huruf', 'Noon & Meem Rules', 'Madd Rules'],
                'badge'       => 'Ages 10+',
                'sort_order'  => 3,
            ],
            [
                'title'       => 'Hifz ul Quran',
                'description' => 'Complete Quran memorization program with a structured daily schedule and revision plan.',
                'icon'        => 'fa-book-reader',
                'image'       => 'settings/service-4.jpg',
                'duration'    => '2-4 Years',
                'level'       => 'Advanced',
                'features'    => ['Daily Memorization Schedule', 'Weekly Revision Plan', 'Sabqi & Manzil', 'Graduation Ceremony'],
                'badge'       => 'Ages 7-18',
                'sort_order'  => 4,
            ],
            [
                'title'       => 'Islamic Studies',
                'description' => 'Comprehensive Islamic education covering Aqeedah, Fiqh, Seerah, and Islamic manners.',
                'icon'        => 'fa-graduation-cap',
                'image'       => 'settings/service-5.jpg',
                'duration'    => 'Ongoing',
                'level'       => 'All Levels',
                'features'    => ['Aqeedah', 'Fiqh ul Ibadah', 'Seerah an-Nabawiyyah', 'Islamic Manners'],
                'sort_order'  => 5,
            ],
            [
                'title'       => 'Arabic Language',
                'description' => 'Learn the Arabic language to understand the Quran and connect with Islamic texts directly.',
                'icon'        => 'fa-language',
                'image'       => 'settings/service-7.jpg',
                'duration'    => '1-2 Years',
                'level'       => 'Beginner-Advanced',
                'features'    => ['Arabic Grammar (Nahw)', 'Morphology (Sarf)', 'Quran Vocabulary', 'Reading Comprehension'],
                'sort_order'  => 6,
            ],
            [
                'title'       => 'Hadith & Seerah',
                'description' => 'Study the traditions of the Prophet Muhammad (PBUH) and learn the science of Hadith.',
                'icon'        => 'fa-book',
                'image'       => 'settings/service-1.jpg',
                'duration'    => '6-12 Months',
                'level'       => 'Intermediate',
                'features'    => ['40 Hadith Nawawi', 'Hadith Methodology', 'Seerah an-Nabawiyyah', 'Companions of the Prophet'],
                'badge'       => 'Ages 12+',
                'sort_order'  => 7,
            ],
            [
                'title'       => 'Namaz & Ibadat',
                'description' => 'Learn the correct method of Salah and other acts of worship in Islam.',
                'icon'        => 'fa-hands-praying',
                'image'       => 'settings/service-2.jpg',
                'duration'    => '1-2 Months',
                'level'       => 'Beginner',
                'features'    => ['Method of Wudu', 'Salah Step by Step', 'Farz & Sunnah Prayers', 'Common Mistakes'],
                'sort_order'  => 8,
            ],
            [
                'title'       => 'Dua & Azkar',
                'description' => 'Memorize essential daily duas and azkar for a spiritually enriching life.',
                'icon'        => 'fa-hand-holding-heart',
                'image'       => 'settings/service-3.jpg',
                'duration'    => '1-3 Months',
                'level'       => 'All Levels',
                'features'    => ['Morning & Evening Azkar', 'Masnoon Duas', 'Dua Etiquettes', 'Memorization'],
                'sort_order'  => 9,
            ],
        ];

        foreach ($courses as $course) {
            DB::table('courses')->insert([
                'title'        => $course['title'],
                'slug'         => Str::slug($course['title']),
                'description'  => $course['description'],
                'icon'         => $course['icon'],
                'image'        => $course['image'],
                'badge'        => $course['badge'] ?? null,
                'duration'     => $course['duration'],
                'level'        => $course['level'],
                'features'     => json_encode($course['features']),
                'sort_order'   => $course['sort_order'],
                'is_active'    => true,
                'created_at'   => $now,
                'updated_at'   => $now,
            ]);
        }
    }
}
