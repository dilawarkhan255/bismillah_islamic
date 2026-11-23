<?php

namespace Database\Seeders;

use App\Models\ClassSchedule;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Database\Seeder;

/**
 * 20 DEMO students with class times, for trying out Admin > Students / Timetable.
 *
 *   php artisan db:seed --class=StudentSeeder
 *
 * Do not run on the live site: names, numbers and emails are made up
 * (UK 07700 900xxx and US 555-01xx are reserved for fiction). Safe to run
 * again: students it already created are skipped. Remove them all with:
 *
 *   php artisan tinker --execute="App\Models\Student::where('notes', App\Models\Student::DEMO_NOTE)->delete();"
 */
class StudentSeeder extends Seeder
{
    /** [student, parent, country, timezone, course, status, [[days], 'HH:MM', minutes], second class?] */
    private const STUDENTS = [
        ['Ayaan Malik',      'Sana Malik',      'United Kingdom', 'Europe/London',       'Norani Qaida',               'active', [[1, 2, 3, 4, 5], '21:00', 30]],
        ['Hania Siddiqui',   'Imran Siddiqui',  'United Kingdom', 'Europe/London',       'Quran Recitation (Nazra)',   'active', [[1, 3, 5], '22:00', 30]],
        ['Zayd Rahman',      'Farah Rahman',    'USA',            'America/New_York',    'Hifz ul Quran',              'active', [[1, 2, 3, 4, 5], '03:00', 45]],
        ['Maryam Qureshi',   'Bilal Qureshi',   'USA',            'America/Chicago',     'Tajweed ul Quran',           'active', [[2, 4, 6], '04:30', 30]],
        ['Ibrahim Chaudhry', 'Nadia Chaudhry',  'Canada',         'America/New_York',    'Norani Qaida',               'active', [[6, 7], '19:00', 30]],
        ['Aisha Khan',       'Kamran Khan',     'Pakistan',       'Asia/Karachi',        'Quran Recitation (Nazra)',   'active', [[1, 2, 3, 4, 5], '16:00', 30]],
        ['Umar Farooq',      'Saima Farooq',    'Pakistan',       'Asia/Karachi',        'Hifz ul Quran',              'active', [[1, 2, 3, 4, 5, 6], '06:30', 60]],
        ['Fatima Zahra',     'Asad Ali',        'UAE',            'Asia/Dubai',          'Tajweed ul Quran',           'active', [[1, 3, 5], '18:00', 30]],
        ['Yusuf Ahmed',      'Huma Ahmed',      'Saudi Arabia',   'Asia/Riyadh',         'Arabic Language',            'active', [[2, 4], '20:00', 45]],
        ['Inaya Hussain',    'Tariq Hussain',   'Australia',      'Australia/Sydney',    'Norani Qaida',               'active', [[1, 3, 5], '12:00', 30]],
        ['Hamza Butt',       'Rabia Butt',      'Germany',        'Europe/Berlin',       'Islamic Studies',            'active', [[6], '17:00', 45]],
        ['Noor Fatima',      'Adnan Sheikh',    'United Kingdom', 'Europe/London',       'Namaz & Ibadat',             'active', [[2, 4], '20:30', 30]],
        ['Musa Iqbal',       'Zainab Iqbal',    'USA',            'America/Los_Angeles', 'Norani Qaida',               'active', [[1, 2, 3, 4], '07:00', 30]],
        ['Eman Javed',       'Shahid Javed',    'Pakistan',       'Asia/Karachi',        'Dua & Azkar',                'active', [[7], '11:00', 30]],
        ['Daniyal Aslam',    'Mehreen Aslam',   'Qatar',          'Asia/Qatar',          'Quran Recitation (Nazra)',   'active', [[1, 2, 3, 4, 5], '17:30', 30], [[6], '11:00', 30, 'Islamic Studies']],
        ['Zoya Mirza',       'Faisal Mirza',    'Ireland',        'Europe/Dublin',       'Tajweed ul Quran',           'active', [[1, 3], '23:00', 30]],
        ['Ali Raza',         'Uzma Raza',       'Malaysia',       'Asia/Kuala_Lumpur',   'Hadith & Seerah',            'active', [[5], '15:00', 45]],
        ['Sarah Abbasi',     'Naveed Abbasi',   'United Kingdom', 'Europe/London',       'Hifz ul Quran',              'paused', [[1, 2, 3, 4, 5], '20:00', 45]],
        ['Abdullah Shah',    'Hina Shah',       'USA',            'America/New_York',    'Arabic Language',            'active', [[6, 7], '21:00', 60]],
        ['Ruqayya Anwar',    'Junaid Anwar',    'South Africa',   'Africa/Johannesburg', 'Norani Qaida',               'left',   [[2, 4], '19:30', 30]],
    ];

    public function run(): void
    {
        $teachers = Teacher::orderBy('sort_order')->orderBy('id')->pluck('id')->all();

        foreach (self::STUDENTS as $i => $row) {
            [$name, $parent, $country, $tz, $course, $status] = $row;

            if (Student::where('name', $name)->where('notes', Student::DEMO_NOTE)->exists()) {
                continue;
            }

            $student = Student::create([
                'name'        => $name,
                'parent_name' => $parent,
                'whatsapp'    => $this->fakeNumber($country, $i),
                'email'       => strtolower(str_replace(' ', '.', $parent)) . '@example.com',
                'country'     => $country,
                'timezone'    => $tz,
                'course'      => $course,
                'status'      => $status,
                'start_date'  => now()->subDays(10 + $i * 9)->toDateString(),
                'notes'       => Student::DEMO_NOTE,
            ]);

            foreach (array_slice($row, 6) as $j => $class) {
                ClassSchedule::create([
                    'student_id'       => $student->id,
                    'teacher_id'       => $teachers ? $teachers[($i + $j) % count($teachers)] : null,
                    'course'           => $class[3] ?? $course,
                    'days'             => $class[0],
                    'start_time'       => $class[1],
                    'duration_minutes' => $class[2],
                    'status'           => $status === 'paused' ? 'paused' : 'active',
                ]);
            }
        }
    }

    /** Numbers reserved for fiction / clearly fake, so nobody real gets a message. */
    private function fakeNumber(string $country, int $i): string
    {
        $n = str_pad((string) (100 + $i), 3, '0', STR_PAD_LEFT);

        return match ($country) {
            'United Kingdom' => '+44 7700 900' . $n,
            'USA', 'Canada'  => '+1 555 01' . substr($n, 1),
            default          => '+92 300 0000' . $n,
        };
    }
}
