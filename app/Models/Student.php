<?php

namespace App\Models;

use App\Support\Timezones;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Student extends Model
{
    public const STATUSES = ['active' => 'Active', 'paused' => 'Paused', 'left' => 'Left'];

    /** Marks the made-up students from Database\Seeders\StudentSeeder */
    public const DEMO_NOTE = 'Demo student (StudentSeeder)';

    protected $fillable = [
        'name', 'parent_name', 'whatsapp', 'email', 'country', 'timezone',
        'course', 'status', 'start_date', 'notes', 'free_trial_id',
    ];

    protected $casts = [
        'start_date' => 'date',
    ];

    public function classes(): HasMany
    {
        return $this->hasMany(ClassSchedule::class);
    }

    public function freeTrial(): BelongsTo
    {
        return $this->belongsTo(FreeTrial::class);
    }

    public function getTimezoneLabelAttribute(): string
    {
        return Timezones::label($this->timezone);
    }

    /** wa.me link for the student's WhatsApp, or null */
    public function getWhatsappUrlAttribute(): ?string
    {
        $digits = preg_replace('/\D+/', '', (string) $this->whatsapp);

        return $digits ? 'https://wa.me/' . $digits : null;
    }
}
