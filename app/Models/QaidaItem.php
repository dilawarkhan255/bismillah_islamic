<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QaidaItem extends Model
{
    protected $fillable = ['qaida_lesson_id', 'text', 'transliteration', 'hint', 'audio', 'sort_order'];

    protected $casts = ['sort_order' => 'integer'];

    public function lesson()
    {
        return $this->belongsTo(QaidaLesson::class, 'qaida_lesson_id');
    }
}
