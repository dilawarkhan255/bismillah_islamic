<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Certificate extends Model
{
    protected $fillable = ['student_id', 'serial', 'title', 'course', 'teacher_name', 'issued_on'];

    protected $casts = ['issued_on' => 'date'];

    protected static function booted(): void
    {
        static::creating(function (self $cert) {
            $cert->serial ??= self::newSerial();
        });
    }

    /** e.g. BIA-2026-7KQ4M9 */
    public static function newSerial(): string
    {
        do {
            $serial = 'BIA-' . now()->format('Y') . '-' . Str::upper(Str::random(6));
        } while (self::where('serial', $serial)->exists());

        return $serial;
    }

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

    public function getRouteKeyName(): string
    {
        return 'serial';
    }
}
