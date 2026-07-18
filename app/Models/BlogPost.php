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

    public function scopeActive($query)
    {
        return $query->where('is_active', true)->latest('published_at');
    }
}
