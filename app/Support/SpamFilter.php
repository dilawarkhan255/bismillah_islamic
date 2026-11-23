<?php

namespace App\Support;

use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

/**
 * Spots spam on the public forms (enroll, contact, free trial).
 *
 * Returns the reason a submission looks like spam, or null when it looks real.
 * The checks are tuned to the spam this site actually receives: marketing
 * pitches about "your website", fake addresses on our own domain, and bots that
 * post the form instantly or without loading the page.
 */
class SpamFilter
{
    /** Forms sent faster than this (seconds after the page loaded) are bots. */
    public const MIN_SECONDS = 3;

    /** Submissions scoring this much or more are treated as spam. */
    private const THRESHOLD = 2;

    /** Phrases that show up in sales pitches, never in real Quran-class enquiries. */
    private const PHRASES = [
        'seo', 'backlink', 'search engine', 'google ranking', 'first page of google',
        'web design', 'website design', 'redesign', 'lead generation', 'more traffic',
        'digital marketing', 'social media marketing', 'marketing', 'promotion',
        'this email finds you well', 'i just visited', 'i was checking out your',
        'reaching out regarding', 'reaching out about', 'wondered if you',
        'unsubscribe', 'opt out', 'opt-out', 'reply stop', 'our new', 'our services',
        'free quote', 'discount', 'limited time', 'special offer',
        'crypto', 'bitcoin', 'casino', 'loan', 'investment opportunity',
        'posture', 'weight loss', 'supplement', 'ai tool', 'chatgpt',
    ];

    public static function check(Request $request): ?string
    {
        if ($request->filled('website')) {
            return 'honeypot';
        }

        $started = self::startedAt($request);
        if ($started === null) {
            return 'missing form timer';
        }
        if (time() - $started < self::MIN_SECONDS) {
            return 'sent too fast';
        }

        $email = Str::lower((string) $request->input('email'));
        $ownDomain = Str::lower((string) parse_url(config('app.url'), PHP_URL_HOST));
        $ownDomain = Str::after($ownDomain, 'www.');
        if ($ownDomain !== '' && Str::endsWith($email, '@' . $ownDomain)) {
            return 'uses our own email domain';
        }

        $message = Str::lower((string) $request->input('message'));
        $text = Str::lower(implode(' ', array_filter([
            $request->input('name'), $request->input('student_name'),
            $request->input('parent_name'), $message,
        ], 'is_string')));

        $score = 0;
        $reasons = [];

        if (preg_match('~https?://|www\.|\[url~i', $text)) {
            $score += 2;
            $reasons[] = 'link';
        }
        if (preg_match('/[\p{Cyrillic}\p{Han}\p{Hangul}]/u', $text)) {
            $score += 2;
            $reasons[] = 'foreign script';
        }
        if ($ownDomain !== '' && Str::contains($message, Str::before($ownDomain, '.'))) {
            $score += 1;
            $reasons[] = 'mentions our domain';
        }
        foreach (self::PHRASES as $phrase) {
            if (preg_match('/\b' . preg_quote($phrase, '/') . '\b/', $message)) {
                $score += 1;
                $reasons[] = $phrase;
            }
        }
        $student = Str::lower(trim((string) $request->input('student_name')));
        if ($message !== '' && $student !== '' && $student === Str::lower(trim((string) $request->input('parent_name')))) {
            $score += 1;
            $reasons[] = 'same student and parent name';
        }

        return $score >= self::THRESHOLD ? implode(', ', $reasons) : null;
    }

    /** The encrypted time the form was rendered (see <x-honeypot />), or null. */
    private static function startedAt(Request $request): ?int
    {
        $value = $request->input('form_started');
        if (! is_string($value) || $value === '') {
            return null;
        }

        try {
            $time = decrypt($value);
        } catch (DecryptException) {
            return null;
        }

        return is_int($time) ? $time : null;
    }
}
