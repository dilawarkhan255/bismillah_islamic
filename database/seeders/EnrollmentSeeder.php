<?php

namespace Database\Seeders;

use App\Models\Enrollment;
use Illuminate\Database\Seeder;

/**
 * Dummy enrollment requests for testing the admin panel.
 * Run: php artisan db:seed --class=EnrollmentSeeder
 * Emails use @example.com so the dummy rows are easy to find and remove.
 */
class EnrollmentSeeder extends Seeder
{
    public function run(): void
    {
        $rows = [
            // student, parent, phone, age, gender, course, status, days ago, message
            ['Muhammad Ahmed', 'Imran Ahmed', '+92 300 1234567', 8, 'Male', 'Norani Qaida', 'pending', 0, 'My son is a complete beginner. Evening classes preferred.'],
            ['Ayesha Siddiqui', 'Tariq Siddiqui', '+92 321 9876543', 11, 'Female', 'Quran Recitation (Nazra)', 'pending', 1, 'She can read Qaida, wants to start Nazra.'],
            ['Abdullah Khan', 'Naveed Khan', '+44 7700 900123', 13, 'Male', 'Hifz ul Quran', 'approved', 2, 'Already memorised Juz Amma. Looking for a Hifz teacher.'],
            ['Fatima Zahra', 'Usman Ali', '+1 416 555 0182', 9, 'Female', 'Tajweed ul Quran', 'pending', 2, 'Female teacher please.'],
            ['Hamza Malik', 'Sajid Malik', '+92 333 4455667', 15, 'Male', 'Arabic Language', 'approved', 3, null],
            ['Maryam Noor', 'Kashif Noor', '+971 50 123 4567', 7, 'Female', 'Norani Qaida', 'approved', 4, 'Weekend classes only.'],
            ['Ibrahim Yusuf', 'Yusuf Rahman', '+44 7911 123456', 10, 'Male', 'Namaz & Ibadat', 'rejected', 5, 'Duplicate request, already enrolled.'],
            ['Zainab Hussain', 'Asad Hussain', '+92 345 7788990', 12, 'Female', 'Islamic Studies', 'pending', 6, 'Interested in Seerah and basic Fiqh.'],
            ['Umar Farooq', 'Bilal Farooq', '+1 647 555 0199', 14, 'Male', 'Tajweed ul Quran', 'approved', 7, null],
            ['Hafsa Javed', 'Javed Iqbal', '+61 412 345 678', 6, 'Female', 'Dua & Azkar', 'pending', 8, 'Very young, short sessions please.'],
            ['Ali Raza', 'Raza Haider', '+92 301 2233445', 25, 'Male', 'Arabic Language', 'approved', 10, 'Adult learner, wants conversational Arabic.'],
            ['Khadija Akhtar', 'Shahid Akhtar', '+966 55 123 4567', 16, 'Female', 'Hadith & Seerah', 'pending', 11, null],
            ['Yahya Saleem', 'Saleem Ahmed', '+44 7700 900456', 9, 'Male', 'Quran Recitation (Nazra)', 'rejected', 13, 'Could not agree on timing.'],
            ['Sumaya Riaz', 'Riaz Mehmood', '+92 312 6677889', 10, 'Female', 'Hifz ul Quran', 'approved', 15, 'Wants daily classes.'],
            ['Musa Abdullah', 'Abdullah Qureshi', '+1 905 555 0123', 8, 'Male', 'Norani Qaida', 'pending', 17, 'Two siblings may join later.'],
            ['Aisha Rahman', 'Faisal Rahman', '+971 55 987 6543', 32, 'Female', 'Tajweed ul Quran', 'approved', 20, 'Mother wants to improve her own Tajweed.'],
            ['Bilal Shah', 'Aamir Shah', '+92 322 1122334', 11, 'Male', 'Namaz & Ibadat', 'pending', 23, null],
            ['Noor Fatima', 'Waqas Ahmed', '+44 7911 654321', 13, 'Female', 'Islamic Studies', 'approved', 26, null],
        ];

        foreach ($rows as [$student, $parent, $phone, $age, $gender, $course, $status, $daysAgo, $message]) {
            $date = now()->subDays($daysAgo)->setTime(rand(9, 21), rand(0, 59));
            if ($date->isFuture()) {
                $date = now()->subMinutes(rand(10, 300));   // today's rows: never in the future
            }

            Enrollment::create([
                'student_name' => $student,
                'parent_name'  => $parent,
                'phone'        => $phone,
                'email'        => strtolower(str_replace(' ', '.', $parent)) . '@example.com',
                'age'          => $age,
                'gender'       => $gender,
                'course'       => $course,
                'class_type'   => 'Online (Microsoft Teams)',
                'message'      => $message,
                'status'       => $status,
                'created_at'   => $date,
                'updated_at'   => $date,
            ]);
        }
    }
}
