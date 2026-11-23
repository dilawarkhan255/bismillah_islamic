<?php

namespace App\Support;

use Illuminate\Support\Str;

/** Timezones the academy's students live in, for the student form and time conversion. */
class Timezones
{
    /** Class times are entered and printed in this timezone. */
    public const ACADEMY = 'Asia/Karachi';

    /** group => [IANA zone => label] */
    public const OPTIONS = [
        'Pakistan & Asia' => [
            'Asia/Karachi'      => 'Pakistan',
            'Asia/Kolkata'      => 'India',
            'Asia/Dhaka'        => 'Bangladesh',
            'Asia/Kuala_Lumpur' => 'Malaysia',
            'Asia/Singapore'    => 'Singapore',
            'Asia/Jakarta'      => 'Indonesia (Jakarta)',
        ],
        'Middle East' => [
            'Asia/Dubai'   => 'UAE / Oman',
            'Asia/Riyadh'  => 'Saudi Arabia / Kuwait / Bahrain',
            'Asia/Qatar'   => 'Qatar',
            'Europe/Istanbul' => 'Turkey',
        ],
        'UK & Europe' => [
            'Europe/London'    => 'United Kingdom',
            'Europe/Dublin'    => 'Ireland',
            'Europe/Paris'     => 'France / Belgium',
            'Europe/Berlin'    => 'Germany / Netherlands / Italy / Spain',
            'Europe/Oslo'      => 'Norway / Sweden / Denmark',
        ],
        'Americas' => [
            'America/New_York'    => 'USA / Canada — Eastern',
            'America/Chicago'     => 'USA — Central',
            'America/Denver'      => 'USA — Mountain',
            'America/Los_Angeles' => 'USA / Canada — Pacific',
        ],
        'Africa & Oceania' => [
            'Africa/Johannesburg' => 'South Africa',
            'Africa/Nairobi'      => 'Kenya',
            'Australia/Sydney'    => 'Australia — Sydney / Melbourne',
            'Australia/Perth'     => 'Australia — Perth',
            'Pacific/Auckland'    => 'New Zealand',
        ],
    ];

    /** country words (lower case) => zone, used to guess a timezone from a free trial's country */
    private const COUNTRY_GUESS = [
        'pakistan' => 'Asia/Karachi', 'india' => 'Asia/Kolkata', 'bangladesh' => 'Asia/Dhaka',
        'malaysia' => 'Asia/Kuala_Lumpur', 'singapore' => 'Asia/Singapore', 'indonesia' => 'Asia/Jakarta',
        'uae' => 'Asia/Dubai', 'emirates' => 'Asia/Dubai', 'dubai' => 'Asia/Dubai', 'oman' => 'Asia/Dubai',
        'saudi' => 'Asia/Riyadh', 'ksa' => 'Asia/Riyadh', 'kuwait' => 'Asia/Riyadh', 'bahrain' => 'Asia/Riyadh',
        'qatar' => 'Asia/Qatar', 'turkey' => 'Europe/Istanbul',
        'uk' => 'Europe/London', 'united kingdom' => 'Europe/London', 'england' => 'Europe/London',
        'scotland' => 'Europe/London', 'wales' => 'Europe/London', 'britain' => 'Europe/London',
        'ireland' => 'Europe/Dublin', 'france' => 'Europe/Paris', 'belgium' => 'Europe/Paris',
        'germany' => 'Europe/Berlin', 'netherlands' => 'Europe/Berlin', 'holland' => 'Europe/Berlin',
        'italy' => 'Europe/Berlin', 'spain' => 'Europe/Berlin',
        'norway' => 'Europe/Oslo', 'sweden' => 'Europe/Oslo', 'denmark' => 'Europe/Oslo',
        'usa' => 'America/New_York', 'united states' => 'America/New_York', 'america' => 'America/New_York',
        'us' => 'America/New_York', 'canada' => 'America/New_York',
        'south africa' => 'Africa/Johannesburg', 'kenya' => 'Africa/Nairobi',
        'australia' => 'Australia/Sydney', 'new zealand' => 'Pacific/Auckland',
    ];

    /** @return string[] every zone the form offers */
    public static function zones(): array
    {
        return array_merge(...array_map('array_keys', array_values(self::OPTIONS)));
    }

    public static function label(?string $zone): string
    {
        foreach (self::OPTIONS as $zones) {
            if (isset($zones[$zone])) {
                return $zones[$zone];
            }
        }

        return (string) $zone;
    }

    /** Best timezone for a free-typed country, defaulting to Pakistan. */
    public static function guessFromCountry(?string $country): string
    {
        $c = Str::lower(trim((string) $country));
        if ($c === '') {
            return self::ACADEMY;
        }
        if (isset(self::COUNTRY_GUESS[$c])) {
            return self::COUNTRY_GUESS[$c];
        }
        foreach (self::COUNTRY_GUESS as $word => $zone) {
            if (strlen($word) > 3 && Str::contains($c, $word)) {
                return $zone;
            }
        }

        return self::ACADEMY;
    }
}
