<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PricingPlan extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'badge', 'accent_color', 'days_per_week',
        'classes_per_month', 'courses_count', 'report_frequency',
        'certificate', 'features', 'is_popular', 'sort_order', 'is_active',
    ];

    protected $casts = [
        'certificate' => 'boolean',
        'is_popular' => 'boolean',
        'is_active' => 'boolean',
        'features' => 'array',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('sort_order');
    }
}
