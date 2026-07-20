<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Section extends Model
{
    use HasFactory;

    protected $fillable = [
        'page_name',
        'section_key',
        'title',
        'subtitle',
        'description',
        'image',
        'button_text',
        'button_url',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopePage($query, string $page)
    {
        return $query->where('page_name', $page);
    }

    public static function getSection(string $page, string $key, string $field = 'title', $default = null)
    {
        $section = static::where('page_name', $page)->where('section_key', $key)->first();
        return $section && $section->{$field} ? $section->{$field} : $default;
    }
}
