<?php

namespace App\Support;

use App\Models\ClassSchedule;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Support\Str;
use RuntimeException;

/**
 * Turns the academy's class sheet (one row per class) into students and classes.
 *
 * Column names are matched loosely ("Student", "Student Name", "Name" …), days can be
 * written "Mon, Wed, Fri", "Mon-Fri", "Monday to Friday", "Daily" or in Roman Urdu
 * ("Peer, Budh, Jumma"), and times "16:30", "4:30 PM" or "4:30 PM - 5:00 PM".
 * Uploading the same sheet twice does not create duplicates.
 */
class StudentImporter
{
    /** field => header names it can appear under (lower case, spaces/punctuation ignored) */
    public const COLUMNS = [
        'name'     => ['student', 'studentname', 'name', 'studentsname', 'child', 'childname'],
        'parent'   => ['parent', 'parentname', 'guardian', 'father', 'fathername', 'mother', 'mothername'],
        'whatsapp' => ['whatsapp', 'whatsappnumber', 'phone', 'phonenumber', 'mobile', 'contact', 'number', 'cell'],
        'email'    => ['email', 'emailaddress', 'mail'],
        'country'  => ['country', 'location', 'city'],
        'timezone' => ['timezone', 'tz'],
        'course'   => ['course', 'subject'],
        'teacher'  => ['teacher', 'teachername', 'ustad', 'ustaz', 'ustadh', 'qari', 'tutor'],
        'days'     => ['days', 'day', 'classdays', 'schedule', 'din'],
        'time'     => ['time', 'classtime', 'timepk', 'pktime', 'pakistantime', 'timepakistan', 'timing', 'timings', 'starttime', 'waqt'],
        'duration' => ['duration', 'minutes', 'mins', 'length', 'durationmin', 'durationminutes'],
        'status'   => ['status'],
        'notes'    => ['notes', 'note', 'remarks', 'comment', 'comments'],
    ];

    private const DAY_WORDS = [
        'mon' => 1, 'tue' => 2, 'wed' => 3, 'thu' => 4, 'fri' => 5, 'sat' => 6, 'sun' => 7,
        // Roman Urdu
        'peer' => 1, 'pir' => 1, 'somwar' => 1, 'mangal' => 2, 'budh' => 3, 'budhwar' => 3,
        'jumerat' => 4, 'jumeraat' => 4, 'jumairat' => 4, 'juma' => 5, 'jumma' => 5, 'jumah' => 5,
        'hafta' => 6, 'hafte' => 6, 'itwar' => 7, 'itwaar' => 7,
    ];

    private array $result = ['students' => 0, 'existing' => 0, 'classes' => 0, 'duplicates' => 0, 'skipped' => [], 'warnings' => []];

    /** @var array<string, int> lower-case teacher name => id */
    private array $teachers = [];

    /** @param array<int, array<int, string>> $rows  first row = column names */
    public function import(array $rows): array
    {
        $rows = array_values(array_filter($rows, fn ($r) => implode('', $r) !== ''));
        if (count($rows) < 2) {
            throw new RuntimeException('The file is empty. Put column names in the first row and one class per row below.');
        }

        $map = $this->mapHeaders(array_shift($rows));
        if (! isset($map['name'])) {
            throw new RuntimeException('No "Student Name" column found. The first row must have column names, e.g. Student Name, Teacher, Days, Time.');
        }

        $this->teachers = Teacher::pluck('id', 'name')->mapWithKeys(fn ($id, $name) => [Str::lower(trim($name)) => $id])->all();

        foreach ($rows as $i => $row) {
            $this->importRow($i + 2, fn (string $field) => isset($map[$field]) ? trim((string) ($row[$map[$field]] ?? '')) : '');
        }

        return $this->result;
    }

    private function importRow(int $line, callable $get): void
    {
        $name = $get('name');
        if ($name === '') {
            $this->result['skipped'][] = "Row {$line}: no student name.";

            return;
        }

        $student = $this->findOrCreateStudent($get, $name);

        $daysText = $get('days');
        $timeText = $get('time');
        if ($daysText === '' && $timeText === '') {
            return; // a student without a class time yet
        }

        $days = self::parseDays($daysText);
        [$time, $rangeMinutes] = self::parseTime($timeText);
        if (! $days || ! $time) {
            $this->result['skipped'][] = "Row {$line} ({$name}): class not added — "
                . (! $days ? "days \"{$daysText}\" not understood" : "time \"{$timeText}\" not understood") . '.';

            return;
        }

        $teacherId = $this->teacherId($get('teacher'), $line, $name);
        $duration = (int) preg_replace('/\D+/', '', $get('duration')) ?: ($rangeMinutes ?: 30);
        $duration = max(5, min(240, $duration));

        $duplicate = $student->classes()->where('start_time', $time)->where('teacher_id', $teacherId)->get()
            ->contains(fn ($c) => collect($c->days)->map(fn ($d) => (int) $d)->sort()->values()->all() === $days);
        if ($duplicate) {
            $this->result['duplicates']++;

            return;
        }

        ClassSchedule::create([
            'student_id'       => $student->id,
            'teacher_id'       => $teacherId,
            'course'           => $get('course') ?: $student->course,
            'days'             => $days,
            'start_time'       => $time,
            'duration_minutes' => $duration,
            'status'           => 'active',
            'notes'            => $get('notes') ?: null,
        ]);
        $this->result['classes']++;
    }

    private function findOrCreateStudent(callable $get, string $name): Student
    {
        $digits = preg_replace('/\D+/', '', $get('whatsapp'));

        $existing = Student::where('name', $name)->get()->first(
            fn (Student $s) => $digits === '' || preg_replace('/\D+/', '', (string) $s->whatsapp) === $digits
        );
        if ($existing) {
            $this->result['existing']++;

            return $existing;
        }

        $country = $get('country');
        $timezone = $get('timezone');
        $timezone = in_array($timezone, Timezones::zones(), true) ? $timezone : Timezones::guessFromCountry($timezone ?: $country);
        $status = Str::lower($get('status'));

        $this->result['students']++;

        return Student::create([
            'name'        => Str::limit($name, 100, ''),
            'parent_name' => $get('parent') ?: null,
            'whatsapp'    => $get('whatsapp') ?: null,
            'email'       => filter_var($get('email'), FILTER_VALIDATE_EMAIL) ?: null,
            'country'     => $country ?: null,
            'timezone'    => $timezone,
            'course'      => $get('course') ?: null,
            'status'      => array_key_exists($status, Student::STATUSES) ? $status : 'active',
            'start_date'  => now(Timezones::ACADEMY)->toDateString(),
        ]);
    }

    private function teacherId(string $teacher, int $line, string $student): ?int
    {
        $key = Str::lower(trim($teacher));
        if ($key === '') {
            return null;
        }
        if (isset($this->teachers[$key])) {
            return $this->teachers[$key];
        }

        // "Kamran" matches "Hafiz Kamran Qureshi"
        $matches = array_filter($this->teachers, fn ($id, $name) => Str::contains($name, $key) || Str::contains($key, $name), ARRAY_FILTER_USE_BOTH);
        if (count($matches) === 1) {
            return reset($matches);
        }

        $this->result['warnings'][] = "Row {$line} ({$student}): teacher \"{$teacher}\" not found in Admin > Teachers, class added without a teacher.";

        return null;
    }

    private function mapHeaders(array $header): array
    {
        $map = [];
        foreach ($header as $index => $title) {
            $key = preg_replace('/[^a-z]/', '', Str::lower((string) $title));
            foreach (self::COLUMNS as $field => $aliases) {
                if (! isset($map[$field]) && in_array($key, $aliases, true)) {
                    $map[$field] = $index;
                    break;
                }
            }
        }

        return $map;
    }

    /** "Mon, Wed, Fri" / "Mon-Fri" / "Monday to Friday" / "Daily" / "Peer Budh" => [1, 3, 5] … */
    public static function parseDays(string $text): array
    {
        $t = Str::lower(trim($text));
        if ($t === '') {
            return [];
        }
        if (preg_match('/\b(daily|every ?day|all days|roz|rozana)\b/', $t)) {
            return [1, 2, 3, 4, 5, 6, 7];
        }
        if (preg_match('/\bweekdays?\b/', $t)) {
            return [1, 2, 3, 4, 5];
        }
        if (preg_match('/\bweekends?\b/', $t)) {
            return [6, 7];
        }

        $dayOf = function (string $word): ?int {
            foreach (self::DAY_WORDS as $prefix => $num) {
                if (str_starts_with($word, $prefix)) {
                    return $num;
                }
            }

            return null;
        };

        $days = [];
        // ranges: "mon-fri", "mon – fri", "monday to friday"
        $t = preg_replace_callback('/\b([a-z]+)\s*(?:-|\x{2013}|\x{2014}|\bto\b|\bse\b)\s*([a-z]+)\b/u', function ($m) use ($dayOf, &$days) {
            $from = $dayOf($m[1]);
            $to = $dayOf($m[2]);
            if ($from && $to) {
                for ($d = $from; ; $d = $d % 7 + 1) {
                    $days[] = $d;
                    if ($d === $to) {
                        break;
                    }
                }

                return ' ';
            }

            return $m[0];
        }, $t);

        foreach (preg_split('/[^a-z]+/', $t, -1, PREG_SPLIT_NO_EMPTY) as $word) {
            if ($d = $dayOf($word)) {
                $days[] = $d;
            }
        }

        $days = array_values(array_unique($days));
        sort($days);

        return $days;
    }

    /**
     * "16:30" / "4:30 PM" / "4 pm" / "0.6875" (Excel) / "4:30 PM - 5:00 PM"
     *
     * @return array{0: ?string, 1: ?int}  ["HH:MM", minutes of a range or null]
     */
    public static function parseTime(string $text): array
    {
        $t = Str::lower(trim($text));
        if ($t === '') {
            return [null, null];
        }

        if (is_numeric($t) && (float) $t >= 0) {          // Excel stores times as part of a day (date + time: 45000.6875)
            $minutes = (int) round(fmod((float) $t, 1) * 1440) % 1440;

            return [sprintf('%02d:%02d', intdiv($minutes, 60), $minutes % 60), null];
        }

        $parts = preg_split('/\s*(?:-|–|—|to)\s*/u', $t);
        $start = self::clock($parts[0]);
        $end = isset($parts[1]) ? self::clock($parts[1], $start) : null;

        $range = null;
        if ($start && $end) {
            $range = (self::minutes($end) - self::minutes($start) + 1440) % 1440 ?: null;
        }

        return [$start, $range];
    }

    private static function clock(string $t, ?string $after = null): ?string
    {
        if (! preg_match('/^(\d{1,2})(?:[:.](\d{2}))?(?::\d{2})?\s*(am|pm|a\.m\.|p\.m\.)?$/', trim($t), $m)) {
            return null;
        }

        $h = (int) $m[1];
        $min = (int) ($m[2] ?? 0);
        $ampm = str_replace('.', '', $m[3] ?? '');

        if ($ampm === 'pm' && $h < 12) {
            $h += 12;
        } elseif ($ampm === 'am' && $h === 12) {
            $h = 0;
        } elseif ($ampm === '' && $after !== null && $h < 12 && self::minutes(sprintf('%02d:%02d', $h, $min)) < self::minutes($after)) {
            $h += 12; // "4:30 PM - 5" means 5 PM
        }

        return $h <= 23 && $min <= 59 ? sprintf('%02d:%02d', $h, $min) : null;
    }

    private static function minutes(string $hhmm): int
    {
        [$h, $m] = array_map('intval', explode(':', $hhmm));

        return $h * 60 + $m;
    }
}
