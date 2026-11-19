<?php

namespace Database\Seeders;

use App\Models\FreeTrial;
use Illuminate\Database\Seeder;

/**
 * Dummy free trial requests for testing the admin panel.
 * Run: php artisan db:seed --class=FreeTrialSeeder
 * Emails use @example.com so the dummy rows are easy to find and remove.
 * Option values match the free trial form on the website.
 */
class FreeTrialSeeder extends Seeder
{
    public function run(): void
    {
        $rows = [
            // student, parent, phone, country, age range, course, time, teacher, status, days ago, message
            ['Hassan Ali', 'Ali Akbar', '+92 300 7654321', 'Pakistan', '8 – 12 years', 'Norani Qaida', 'Evening (5PM–11PM PKT)', 'Male Teacher', 'pending', 0, 'Can the trial start this week?'],
            ['Amna Tariq', 'Tariq Mehmood', '+44 7700 900789', 'United Kingdom', '4 – 7 years', 'Norani Qaida', 'Afternoon (12PM–5PM PKT)', 'Female Teacher', 'pending', 1, 'She is shy, a gentle teacher please.'],
            ['Saad Iqbal', 'Iqbal Hussain', '+1 416 555 0144', 'Canada', '13 – 17 years', 'Tajweed ul Quran', 'Morning (6AM–12PM PKT)', null, 'approved', 2, null],
            ['Rida Kamran', 'Kamran Shah', '+971 50 765 4321', 'UAE', '8 – 12 years', 'Quran Recitation (Nazra)', 'Evening (5PM–11PM PKT)', 'Female Teacher', 'approved', 3, 'Weekends preferred.'],
            ['Daniyal Ahmed', 'Waseem Ahmed', '+1 202 555 0175', 'USA', '13 – 17 years', 'Hifz ul Quran', 'Morning (6AM–12PM PKT)', 'Male Teacher', 'pending', 4, 'Wants to start Hifz after the trial.'],
            ['Laiba Noor', 'Noor Muhammad', '+92 321 5566778', 'Pakistan', '4 – 7 years', 'Dua & Azkar', 'Afternoon (12PM–5PM PKT)', null, 'rejected', 5, 'Wrong phone number given, could not reach.'],
            ['Zaid Hamid', 'Hamid Raza', '+61 423 456 789', 'Australia', '8 – 12 years', 'Namaz & Ibadat', 'Morning (6AM–12PM PKT)', 'Male Teacher', 'approved', 7, null],
            ['Sana Yousaf', 'Yousaf Khan', '+44 7911 222333', 'United Kingdom', '18+ (Adult)', 'Arabic Language', 'Evening (5PM–11PM PKT)', 'Female Teacher', 'pending', 8, 'Adult learner, after-work classes.'],
            ['Talha Rasheed', 'Rasheed Ahmed', '+92 333 9988776', 'Pakistan', '13 – 17 years', 'Islamic Studies', 'Evening (5PM–11PM PKT)', null, 'approved', 10, null],
            ['Mehwish Anwar', 'Anwar Ali', '+966 55 765 4321', 'Other', '18+ (Adult)', 'Tajweed ul Quran', 'Afternoon (12PM–5PM PKT)', 'Female Teacher', 'pending', 12, 'Living in Saudi Arabia.'],
            ['Arham Sheikh', 'Adnan Sheikh', '+1 647 555 0111', 'Canada', '4 – 7 years', 'Norani Qaida', 'Morning (6AM–12PM PKT)', null, 'approved', 15, 'Two kids, siblings.'],
            ['Hira Saleem', 'Saleem Akhtar', '+971 55 321 7654', 'UAE', '8 – 12 years', 'Hadith & Seerah', 'Evening (5PM–11PM PKT)', 'Female Teacher', 'rejected', 18, 'Timing did not suit the family.'],
            ['Ammar Zubair', 'Zubair Ahmed', '+92 345 1122998', 'Pakistan', '8 – 12 years', 'Quran Recitation (Nazra)', 'Afternoon (12PM–5PM PKT)', 'Male Teacher', 'pending', 21, null],
            ['Eman Fawad', 'Fawad Chaudhry', '+44 7700 900321', 'United Kingdom', '13 – 17 years', 'Hifz ul Quran', 'Evening (5PM–11PM PKT)', 'Female Teacher', 'approved', 25, 'Already memorised 3 Juz.'],
        ];

        foreach ($rows as [$student, $parent, $phone, $country, $age, $course, $time, $teacher, $status, $daysAgo, $message]) {
            $date = now()->subDays($daysAgo)->setTime(rand(9, 21), rand(0, 59));
            if ($date->isFuture()) {
                $date = now()->subMinutes(rand(10, 300));   // today's rows: never in the future
            }

            FreeTrial::create([
                'student_name'    => $student,
                'parent_name'     => $parent,
                'phone'           => $phone,
                'whatsapp_number' => $phone,
                'email'           => strtolower(str_replace(' ', '.', $parent)) . '@example.com',
                'country'         => $country,
                'age_range'       => $age,
                'course'          => $course,
                'preferred_time'  => $time,
                'teacher_gender'  => $teacher,
                'message'         => $message,
                'status'          => $status,
                'created_at'      => $date,
                'updated_at'      => $date,
            ]);
        }
    }
}
