<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/** A question and answer the website chatbot can give. */
class Faq extends Model
{
    protected $fillable = ['question', 'answer', 'keywords', 'button_text', 'button_url', 'sort_order', 'is_active'];

    protected $casts = ['is_active' => 'boolean'];

    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('sort_order')->orderBy('id');
    }
}
