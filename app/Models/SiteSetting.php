<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SiteSetting extends Model
{
    use HasFactory;

    protected $fillable = ['key', 'value', 'group'];

    /** All settings as key => value, loaded once per request from the content cache. */
    private static ?array $lookup = null;

    public static function get(string $key, $default = null)
    {
        static::$lookup ??= \App\Support\ContentCache::remember('settings.all', fn () => static::pluck('value', 'key')->all());

        return array_key_exists($key, static::$lookup) ? static::$lookup[$key] : $default;
    }

    public static function clearLookup(): void
    {
        static::$lookup = null;
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
