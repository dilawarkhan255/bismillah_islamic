<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SiteSetting extends Model
{
    use HasFactory;

    protected $fillable = ['key', 'value', 'group'];

    public static function get(string $key, $default = null)
    {
        $setting = static::where('key', $key)->first();
        return $setting ? $setting->value : $default;
    }

    public static function set(string $key, $value, string $group = 'general')
    {
        return static::updateOrCreate(['key' => $key], ['value' => $value, 'group' => $group]);
    }

    public static function getGroup(string $group)
    {
        return static::where('group', $group)->pluck('value', 'key')->toArray();
    }
}
