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

    /** All sections keyed by "page|key", loaded once per request from the content cache. */
    private static ?\Illuminate\Support\Collection $lookup = null;

    public static function findCached(string $page, string $key): ?self
    {
        static::$lookup ??= \App\Support\ContentCache::remember('sections.all', fn () => static::all()
            ->keyBy(fn ($s) => $s->page_name . '|' . $s->section_key));

        return static::$lookup->get($page . '|' . $key);
    }

    public static function clearLookup(): void
    {
        static::$lookup = null;
    }

    public static function getSection(string $page, string $key, string $field = 'title', $default = null)
    {
        $section = static::findCached($page, $key);
        return $section && $section->{$field} ? $section->{$field} : $default;
    }
}
