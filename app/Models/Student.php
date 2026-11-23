<?php

namespace App\Models;

use App\Support\Timezones;
use Carbon\CarbonImmutable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Student extends Model
{
    public const STATUSES = ['active' => 'Active', 'paused' => 'Paused', 'left' => 'Left'];

    /** Marks the made-up students from Database\Seeders\StudentSeeder */
    public const DEMO_NOTE = 'Demo student (StudentSeeder)';

    public const CURRENCIES = ['PKR' => 'Rs', 'GBP' => '£', 'USD' => '$', 'EUR' => '€', 'CAD' => 'C$', 'AUD' => 'A$', 'AED' => 'AED', 'SAR' => 'SAR'];

    protected $fillable = [
        'name', 'parent_name', 'whatsapp', 'email', 'country', 'timezone',
        'course', 'current_level', 'progress_percent', 'status', 'start_date', 'notes', 'free_trial_id',
        'fee_amount', 'fee_currency', 'fee_due_day',
    ];

    protected $casts = [
        'start_date'       => 'date',
        'progress_percent' => 'integer',
        'fee_amount'       => 'decimal:2',
        'fee_due_day'      => 'integer',
    ];

    protected static function booted(): void
    {
        static::creating(function (self $student) {
            $student->progress_token ??= Str::random(32);
        });
    }

    public function classes(): HasMany
    {
        return $this->hasMany(ClassSchedule::class);
    }

    public function progress(): HasMany
    {
        return $this->hasMany(StudentProgress::class)->orderByDesc('date')->orderByDesc('id');
    }

    public function payments(): HasMany
    {
        return $this->hasMany(FeePayment::class)->orderByDesc('month');
    }

    public function certificates(): HasMany
    {
        return $this->hasMany(Certificate::class)->orderByDesc('issued_on');
    }

    public function freeTrial(): BelongsTo
    {
        return $this->belongsTo(FreeTrial::class);
    }

    public function getTimezoneLabelAttribute(): string
    {
        return Timezones::label($this->timezone);
    }

    /** wa.me link for the student's WhatsApp, optionally with a message, or null */
    public function whatsappLink(?string $message = null): ?string
    {
        $digits = preg_replace('/\D+/', '', (string) $this->whatsapp);
        if (! $digits) {
            return null;
        }

        return 'https://wa.me/' . $digits . ($message ? '?text=' . rawurlencode($message) : '');
    }

    public function getWhatsappUrlAttribute(): ?string
    {
        return $this->whatsappLink();
    }

    /** Private page parents can open without logging in. */
    public function getProgressUrlAttribute(): string
    {
        return route('progress.show', $this->progress_token);
    }

    /** "£40.00" */
    public function money(float|string|null $amount, ?string $currency = null): string
    {
        $currency ??= $this->fee_currency;
        $symbol = self::CURRENCIES[$currency] ?? $currency;
        $value = rtrim(rtrim(number_format((float) $amount, 2), '0'), '.');

        return in_array($symbol, ['AED', 'SAR'], true) ? "{$symbol} {$value}" : "{$symbol}{$value}";
    }

    public function paidFor(CarbonImmutable $month): ?FeePayment
    {
        return $this->relationLoaded('payments')
            ? $this->payments->first(fn ($p) => $p->month->isSameMonth($month))
            : $this->payments()->whereDate('month', $month->startOfMonth()->toDateString())->first();
    }

    /** Ready-made WhatsApp fee reminder for a month. */
    public function feeReminderMessage(CarbonImmutable $month): string
    {
        $name = $this->parent_name ?: $this->name;

        return "Assalamu Alaikum {$name},\n\n"
            . "This is a gentle reminder that {$this->name}'s fee of {$this->money($this->fee_amount)} for "
            . $month->format('F Y') . " is due on {$month->setDay(min($this->fee_due_day, 28))->format('j F')}.\n\n"
            . "JazakAllah Khair,\nBismillah Islamic Academy";
    }
}
