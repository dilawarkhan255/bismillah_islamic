<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FeePayment extends Model
{
    public const METHODS = ['Bank transfer', 'Cash', 'JazzCash', 'Easypaisa', 'PayPal', 'Wise', 'Other'];

    protected $fillable = ['student_id', 'month', 'amount', 'currency', 'paid_on', 'method', 'note'];

    protected $casts = [
        'month'   => 'date',
        'paid_on' => 'date',
        'amount'  => 'decimal:2',
    ];

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }
}
