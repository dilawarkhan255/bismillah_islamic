<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Enrollment extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_name', 'parent_name', 'phone', 'email',
        'age', 'gender', 'course', 'class_type', 'message', 'status',
    ];

    protected $casts = ['age' => 'integer'];

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }
}
