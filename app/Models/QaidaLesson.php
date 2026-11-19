<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class QaidaLesson extends Model
{
    protected $fillable = [
        'number', 'title', 'title_ur', 'subtitle', 'slug', 'description', 'description_ur', 'groups',
        'audio', 'sort_order', 'is_active',
    ];

    protected $casts = [
        'number' => 'integer',
        'sort_order' => 'integer',
        'is_active' => 'boolean',
        'groups' => 'array',   // [['title' => 'حروفِ حلقی', 'title_en' => 'Throat letters', 'chips' => ['ء ه ع ح غ خ']], ...]
    ];

    protected static function booted(): void
    {
        static::saving(function (QaidaLesson $lesson) {
            if (empty($lesson->slug)) {
                $lesson->slug = 'takhti-' . $lesson->number . '-' . Str::slug($lesson->title);
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
