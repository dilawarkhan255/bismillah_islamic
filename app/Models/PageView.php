<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageView extends Model
{
    public const UPDATED_AT = null;

    protected $fillable = ['visitor_hash', 'path', 'source', 'referrer_host', 'country', 'device'];
}
