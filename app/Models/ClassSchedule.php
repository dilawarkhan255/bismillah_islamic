<?php

namespace App\Models;

use App\Support\Timezones;
use Carbon\CarbonImmutable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * One recurring class: a student with a teacher on some weekdays at a time.
 * The time is stored in Pakistan time (Timezones::ACADEMY); the student's own
 * time is worked out from their timezone, daylight saving included.
 */
class ClassSchedule extends Model
{
    public const DAYS = [1 => 'Mon', 2 => 'Tue', 3 => 'Wed', 4 => 'Thu', 5 => 'Fri', 6 => 'Sat', 7 => 'Sun'];

    public const DAY_NAMES = [1 => 'Monday', 2 => 'Tuesday', 3 => 'Wednesday', 4 => 'Thursday', 5 => 'Friday', 6 => 'Saturday', 7 => 'Sunday'];

    public const STATUSES = ['active' => 'Active', 'paused' => 'Paused'];

    protected $fillable = [
        'student_id', 'teacher_id', 'course', 'days', 'start_time', 'duration_minutes', 'status', 'notes',
    ];

    protected $casts = [
        'days' => 'array',
        'duration_minutes' => 'integer',
    ];

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

    public function teacher(): BelongsTo
    {
        return $this->belongsTo(Teacher::class);
    }

    public function scopeActive(Builder $q): Builder
    {
        return $q->where('status', 'active');
    }

    /** Classes held on an ISO weekday (1 = Monday). */
    public function scopeOnDay(Builder $q, int $day): Builder
    {
        return $q->whereJsonContains('days', $day);
    }

    /** "Mon, Wed, Fri" */
    public function getDaysLabelAttribute(): string
    {
        return self::formatDays($this->days ?? []);
    }

    /** [1, 3, 5] => "Mon, Wed, Fri"; [1..6] => "Mon – Sat"; [7, 1, 2, 3, 4] => "Sun – Thu" */
    public static function formatDays(array $days): string
    {
        $days = collect($days)->map(fn ($d) => (int) $d)->filter(fn ($d) => isset(self::DAYS[$d]))->unique()->sort()->values()->all();

        if (count($days) === 7) {
            return 'Every day';
        }

        // three or more days in a row (the week wraps: Sat, Sun, Mon) read better as a range
        if (count($days) >= 3) {
            foreach ($days as $start) {
                $run = [];
                for ($d = $start, $i = 0; $i < count($days); $d = $d % 7 + 1, $i++) {
                    $run[] = $d;
                }
                $sortedRun = $run;
                sort($sortedRun);
                if ($sortedRun === $days) {
                    return self::DAYS[$start] . ' – ' . self::DAYS[end($run)];
                }
            }
        }

        return implode(', ', array_map(fn ($d) => self::DAYS[$d], $days));
    }

    /** Start of this class on a weekday of the current week, in Pakistan time. */
    public function startOn(int $day): CarbonImmutable
    {
        [$h, $m] = array_map('intval', explode(':', $this->start_time . ':0'));

        return CarbonImmutable::now(Timezones::ACADEMY)->startOfWeek()->addDays($day - 1)->setTime($h, $m);
    }

    public function getTimeLabelAttribute(): string
    {
        return $this->startOn($this->firstDay())->format('g:i A');
    }

    public function getEndTimeLabelAttribute(): string
    {
        return $this->startOn($this->firstDay())->addMinutes($this->duration_minutes)->format('g:i A');
    }

    /**
     * The student's own time, e.g. "11:00 AM" or "9:00 PM (day before)".
     * Null when the student is in Pakistan time already.
     */
    public function getLocalTimeLabelAttribute(): ?string
    {
        $tz = $this->student?->timezone;
        if (! $tz || $tz === Timezones::ACADEMY) {
            return null;
        }

        $pk = $this->startOn($this->firstDay());
        $local = $pk->setTimezone($tz);
        // compare calendar dates: 2 AM Tuesday in Pakistan is Monday evening in the USA
        $cmp = strcmp($local->toDateString(), $pk->toDateString());

        return $local->format('g:i A') . match (true) {
            $cmp < 0 => ' (day before)',
            $cmp > 0 => ' (next day)',
            default => '',
        };
    }

    /** Local days, e.g. "Sun, Tue, Thu" when the time falls on the day before. */
    public function getLocalDaysLabelAttribute(): ?string
    {
        $tz = $this->student?->timezone;
        if (! $tz || $tz === Timezones::ACADEMY) {
            return null;
        }

        return self::formatDays(collect($this->days ?? [])
            ->map(fn ($d) => $this->startOn((int) $d)->setTimezone($tz)->isoWeekday())
            ->all());
    }

    /** Minutes from midnight (Pakistan time), for sorting and clash checks. */
    public function getStartMinutesAttribute(): int
    {
        [$h, $m] = array_map('intval', explode(':', $this->start_time . ':0'));

        return $h * 60 + $m;
    }

    private function firstDay(): int
    {
        return (int) (collect($this->days ?? [])->map(fn ($d) => (int) $d)->sort()->first() ?? 1);
    }

    /**
     * Other active classes of the same teacher that overlap this one.
     *
     * @return \Illuminate\Support\Collection<int, self>
     */
    public function clashes()
    {
        if (! $this->teacher_id || $this->status !== 'active') {
            return collect();
        }

        $start = $this->start_minutes;
        $end = $start + $this->duration_minutes;
        $days = array_map('intval', $this->days ?? []);

        return self::active()
            ->where('teacher_id', $this->teacher_id)
            ->when($this->exists, fn ($q) => $q->whereKeyNot($this->getKey()))
            ->with('student')
            ->get()
            ->filter(function (self $other) use ($start, $end, $days) {
                $sharedDay = array_intersect($days, array_map('intval', $other->days ?? []));
                $oStart = $other->start_minutes;

                return $sharedDay && $start < $oStart + $other->duration_minutes && $oStart < $end;
            })
            ->values();
    }
}
