<?php

namespace App\Support;

use Closure;
use Illuminate\Support\Facades\Cache;

/**
 * Caches public-site content queries.
 *
 * Every key is prefixed with a version number. Saving or deleting any content
 * model calls flush(), which bumps the version, so every cached page picks up
 * the change on its next request (old entries simply expire).
 */
class ContentCache
{
    public const VERSION_KEY = 'content_cache_version';

    public const TTL = 86400; // 1 day

    private static ?int $version = null;

    public static function remember(string $key, Closure $callback, int $ttl = self::TTL): mixed
    {
        return Cache::remember('content:' . self::version() . ':' . $key, $ttl, $callback);
    }

    public static function version(): int
    {
        return self::$version ??= (int) Cache::rememberForever(self::VERSION_KEY, fn () => 1);
    }

    public static function flush(): void
    {
        self::$version = self::version() + 1;
        Cache::forever(self::VERSION_KEY, self::$version);
    }
}
