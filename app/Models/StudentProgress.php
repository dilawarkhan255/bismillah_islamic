<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/** One class report: attendance, what was covered and a note for the parents. */
class StudentProgress extends Model
{
    protected $table = 'student_progress';

    public const ATTENDANCE = [
        'present' => ['Present', '#0f766e'],
        'late'    => ['Late', '#AE8225'],
        'absent'  => ['Absent', '#dc2626'],
        'leave'   => ['On leave', '#6c757d'],
    ];

    protected $fillable = ['student_id', 'date', 'attendance', 'lesson', 'note'];

    protected $casts = ['date' => 'date'];

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

    public function getAttendanceLabelAttribute(): string
    {
        return self::ATTENDANCE[$this->attendance][0] ?? ucfirst($this->attendance);
    }

    public function getAttendanceColorAttribute(): string
    {
        return self::ATTENDANCE[$this->attendance][1] ?? '#6c757d';
    }
}
