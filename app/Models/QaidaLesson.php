<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class QaidaLesson extends Model
{
    protected $fillable = [
        'number', 'title', 'title_ur', 'subtitle', 'slug', 'old_slugs', 'description', 'description_ur', 'groups',
        'audio', 'sort_order', 'is_active',
    ];

    protected $casts = [
        'number' => 'integer',
        'sort_order' => 'integer',
        'is_active' => 'boolean',
        'old_slugs' => 'array',
        'groups' => 'array',   // [['title' => 'حروفِ حلقی', 'title_en' => 'Throat letters', 'chips' => ['ء ه ع ح غ خ']], ...]
    ];

    protected static function booted(): void
    {
        static::saving(function (QaidaLesson $lesson) {
            if (empty($lesson->slug)) {
                $lesson->slug = 'takhti-' . $lesson->number . '-' . Str::slug($lesson->title);
            }

            // slug changed: remember the old one so its links keep working (301 redirect)
            $old = $lesson->getOriginal('slug');
            if ($lesson->exists && $old && $lesson->isDirty('slug')) {
                $lesson->old_slugs = collect($lesson->old_slugs ?? [])
                    ->push($old)->reject(fn ($s) => $s === $lesson->slug)->unique()->values()->all();
            }
        });
    }

    public function items()
    {
        return $this->hasMany(QaidaItem::class)->orderBy('sort_order')->orderBy('id');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('sort_order')->orderBy('number');
    }

    public function getRouteKeyName(): string
    {
        return 'id';
    }
}
