<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FreeTrial extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_name', 'parent_name', 'phone', 'email',
        'country', 'age_range', 'course', 'preferred_time',
        'teacher_gender', 'whatsapp_number', 'message', 'status',
    ];

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }
}
