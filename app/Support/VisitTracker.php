<?php

namespace App\Support;

use App\Models\PageView;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

/**
 * Records a page view without storing anything that identifies a person:
 * no IP, no cookie, no name. Country comes from the browser's timezone.
 */
class VisitTracker
{
    /** Browser timezone => country. Anything else falls back to the region name. */
    private const COUNTRIES = [
        'Asia/Karachi' => 'Pakistan', 'Europe/London' => 'United Kingdom', 'Europe/Dublin' => 'Ireland',
        'Asia/Kolkata' => 'India', 'Asia/Calcutta' => 'India', 'Asia/Dhaka' => 'Bangladesh',
        'Asia/Dubai' => 'UAE', 'Asia/Muscat' => 'Oman', 'Asia/Riyadh' => 'Saudi Arabia', 'Asia/Qatar' => 'Qatar',
        'Asia/Kuwait' => 'Kuwait', 'Asia/Bahrain' => 'Bahrain', 'Asia/Kuala_Lumpur' => 'Malaysia',
        'Asia/Singapore' => 'Singapore', 'Asia/Jakarta' => 'Indonesia', 'Europe/Istanbul' => 'Turkey',
        'Europe/Berlin' => 'Germany', 'Europe/Paris' => 'France', 'Europe/Amsterdam' => 'Netherlands',
        'Europe/Brussels' => 'Belgium', 'Europe/Oslo' => 'Norway', 'Europe/Stockholm' => 'Sweden',
        'Europe/Copenhagen' => 'Denmark', 'Europe/Madrid' => 'Spain', 'Europe/Rome' => 'Italy',
        'Africa/Johannesburg' => 'South Africa', 'Africa/Nairobi' => 'Kenya', 'Africa/Lagos' => 'Nigeria',
        'Africa/Cairo' => 'Egypt', 'Pacific/Auckland' => 'New Zealand', 'America/Sao_Paulo' => 'Brazil',
        'America/Toronto' => 'Canada', 'America/Vancouver' => 'Canada', 'America/Edmonton' => 'Canada',
        'America/Winnipeg' => 'Canada', 'America/Halifax' => 'Canada', 'America/Regina' => 'Canada',
    ];

    public static function record(Request $request): void
    {
        $agent = (string) $request->userAgent();
        if ($agent === '' || preg_match('/bot|crawl|spider|slurp|preview|headless|lighthouse|facebookexternalhit|whatsapp/i', $agent)) {
            return;
        }

        $path = '/' . ltrim((string) parse_url((string) $request->input('p', '/'), PHP_URL_PATH), '/');
        // private links: keep the page type, never the token or certificate number
        $path = preg_replace('~^/(progress|certificate)/.+$~', '/$1/…', $path);
        $referrer = (string) $request->input('r', '');
        $ownHost = parse_url(config('app.url'), PHP_URL_HOST);
        $refHost = Str::after(Str::lower((string) parse_url($referrer, PHP_URL_HOST)), 'www.');

        PageView::create([
            // same visitor + same day = same code; tomorrow it is a different code
            'visitor_hash'  => hash('sha256', $request->ip() . '|' . $agent . '|' . now()->toDateString() . '|' . config('app.key')),
            'path'          => Str::limit($path, 250, ''),
            'source'        => self::source($refHost, $ownHost, $request->getHost()),
            'referrer_host' => $refHost && ! self::isOwn($refHost, $ownHost, $request->getHost()) ? Str::limit($refHost, 120, '') : null,
            'country'       => self::country((string) $request->input('tz', '')),
            'device'        => self::device($agent),
        ]);

        // keep about 13 months of history
        if (random_int(1, 200) === 1) {
            PageView::where('created_at', '<', now()->subDays(400))->delete();
        }
    }

    /** Where a visit came from. Null for clicks inside the site (only the first page counts). */
    public static function source(string $refHost, ?string $ownHost, string $requestHost): ?string
    {
        if ($refHost === '') {
            return 'Direct';
        }
        if (self::isOwn($refHost, $ownHost, $requestHost)) {
            return null;
        }

        return match (true) {
            str_contains($refHost, 'google.') => 'Google',
            str_contains($refHost, 'bing.') => 'Bing',
            str_contains($refHost, 'yahoo.') => 'Yahoo',
            str_contains($refHost, 'duckduckgo.') => 'DuckDuckGo',
            str_contains($refHost, 'facebook.') || $refHost === 'fb.com' || str_starts_with($refHost, 'm.facebook') || str_starts_with($refHost, 'l.facebook') => 'Facebook',
            str_contains($refHost, 'instagram.') => 'Instagram',
            str_contains($refHost, 'whatsapp.') || $refHost === 'wa.me' => 'WhatsApp',
            str_contains($refHost, 'youtube.') || $refHost === 'youtu.be' => 'YouTube',
            str_contains($refHost, 'tiktok.') => 'TikTok',
            $refHost === 't.co' || str_contains($refHost, 'twitter.') || $refHost === 'x.com' => 'X (Twitter)',
            str_contains($refHost, 'linkedin.') => 'LinkedIn',
            default => 'Other websites',
        };
    }

    public static function country(string $tz): ?string
    {
        if ($tz === '' || ! preg_match('~^[A-Za-z_]+/[A-Za-z_/\-]+$~', $tz)) {
            return null;
        }
        if (isset(self::COUNTRIES[$tz])) {
            return self::COUNTRIES[$tz];
        }
        if (str_starts_with($tz, 'America/')) {
            return 'USA';
        }
        if (str_starts_with($tz, 'Australia/')) {
            return 'Australia';
        }

        return 'Other (' . Str::before($tz, '/') . ')';
    }

    public static function device(string $agent): string
    {
        return match (true) {
            (bool) preg_match('/iPad|Tablet|Android(?!.*Mobile)/i', $agent) => 'tablet',
            (bool) preg_match('/Mobi|iPhone|Android/i', $agent) => 'mobile',
            default => 'desktop',
        };
    }

    private static function isOwn(string $refHost, ?string $ownHost, string $requestHost): bool
    {
        $own = array_filter([Str::after(Str::lower((string) $ownHost), 'www.'), Str::after(Str::lower($requestHost), 'www.')]);

        return in_array($refHost, $own, true);
    }
}
