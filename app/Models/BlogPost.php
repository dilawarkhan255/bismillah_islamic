<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class BlogPost extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id', 'title', 'slug', 'excerpt', 'content',
        'image', 'author', 'published_at', 'read_time',
        'is_featured', 'is_active',
    ];

    protected $casts = [
        'published_at' => 'date',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
    ];

    protected static function booted(): void
    {
        static::creating(function (BlogPost $post) {
            if (empty($post->slug)) {
                $post->slug = Str::slug($post->title);
            }
        });
    }

    public function category()
    {
        return $this->belongsTo(BlogCategory::class, 'category_id');
    }

    /** Site images used when a post has no image of its own (picked per post, so cards don't all look the same). */
    private const FALLBACK_IMAGES = ['how-to-learn.jpg', 'feature.jpg', 'about-1.jpg', 'courses-hero.jpg'];

    public function getImageUrlAttribute(): string
    {
        $file = $this->image ?: self::FALLBACK_IMAGES[($this->id ?? 0) % count(self::FALLBACK_IMAGES)];

        return asset('storage/' . $file);
    }

    /** "5" -> "5 min read"; free text (e.g. "5 min") is shown as-is. */
    public function getReadTimeLabelAttribute(): ?string
    {
        if ($this->read_time === null || $this->read_time === '') {
            return null;
        }

        return is_numeric($this->read_time) ? $this->read_time . ' min read' : (string) $this->read_time;
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true)->latest('published_at');
    }
}
