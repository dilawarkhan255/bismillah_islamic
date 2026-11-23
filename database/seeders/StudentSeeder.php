<?php

namespace Database\Seeders;

use App\Models\Certificate;
use App\Models\ClassSchedule;
use App\Models\FeePayment;
use App\Models\Student;
use App\Models\StudentProgress;
use App\Models\Teacher;
use App\Support\Timezones;
use Carbon\CarbonImmutable;
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

            if ($existing = Student::where('name', $name)->where('notes', Student::DEMO_NOTE)->first()) {
                $this->records($existing, $i);   // older demo students: add the new demo data

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

            $this->records($student, $i);
        }
    }

    /** Demo fee, payments, class reports, level and a certificate for one student. */
    private function records(Student $student, int $i): void
    {
        if ($student->progress()->exists()) {
            return;
        }

        $fees = ['Europe/London' => [40, 'GBP'], 'Europe/Dublin' => [45, 'EUR'], 'Europe/Berlin' => [45, 'EUR'],
            'America/New_York' => [50, 'USD'], 'America/Chicago' => [50, 'USD'], 'America/Los_Angeles' => [50, 'USD'],
            'Australia/Sydney' => [70, 'AUD'], 'Asia/Dubai' => [180, 'AED'], 'Asia/Riyadh' => [180, 'SAR']];
        [$amount, $currency] = $fees[$student->timezone] ?? [6000, 'PKR'];

        $levels = [
            'Norani Qaida' => ['Qaida – Takhti 4', 'Qaida – Takhti 9', 'Qaida – Takhti 14', 'Qaida – Takhti 17'],
            'Hifz ul Quran' => ['Para 2', 'Para 5', 'Para 11', 'Para 19'],
            'Quran Recitation (Nazra)' => ['Para 3', 'Para 8', 'Para 15', 'Para 26'],
        ];
        $levelList = $levels[$student->course] ?? ['Lesson 3', 'Lesson 7', 'Lesson 12', 'Lesson 18'];
        $step = $i % 4;

        $student->update([
            'fee_amount'       => $amount,
            'fee_currency'     => $currency,
            'fee_due_day'      => [1, 5, 10, 15][$i % 4],
            'current_level'    => $levelList[$step],
            'progress_percent' => [20, 45, 70, 95][$step],
        ]);

        // payments: last 3 months paid; this month paid for about half
        $month = CarbonImmutable::now(Timezones::ACADEMY)->startOfMonth();
        foreach ([3, 2, 1, 0] as $back) {
            if ($back === 0 && $i % 2 === 1) {
                continue;
            }
            FeePayment::create([
                'student_id' => $student->id,
                'month'      => $month->subMonths($back)->toDateString(),
                'amount'     => $amount,
                'currency'   => $currency,
                'paid_on'    => $month->subMonths($back)->addDays(2 + $i % 5)->toDateString(),
                'method'     => FeePayment::METHODS[$i % 5],
            ]);
        }

        // class reports for the last few weeks
        $lessons = ['Revised the previous lesson', 'New letters with harakat', 'Tajweed: makharij practice', 'Read 2 pages fluently', 'Memorised 5 new lines'];
        $notes = ['Very good effort today, MashaAllah.', 'Please practise 10 minutes at home.', 'Pronunciation improving well.', null, 'Was a little tired, but finished the lesson.'];
        foreach (range(1, 8) as $n) {
            $attendance = ($n + $i) % 9 === 0 ? 'absent' : (($n + $i) % 7 === 0 ? 'late' : 'present');
            StudentProgress::create([
                'student_id' => $student->id,
                'date'       => now()->subDays($n * 3 + $i % 3)->toDateString(),
                'attendance' => $attendance,
                'lesson'     => $attendance === 'absent' ? null : $levelList[$step] . ' — ' . $lessons[($n + $i) % 5],
                'note'       => $attendance === 'absent' ? 'Missed class, make-up arranged.' : $notes[($n + $i) % 5],
            ]);
        }

        if ($step === 3 && ! $student->certificates()->exists()) {
            Certificate::create([
                'student_id'   => $student->id,
                'title'        => 'Completion of ' . ($student->course ?: 'Norani Qaida'),
                'course'       => $student->course,
                'teacher_name' => $student->classes()->with('teacher')->first()?->teacher?->name,
                'issued_on'    => now()->subDays(5)->toDateString(),
            ]);
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
