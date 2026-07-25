<?php

if (!function_exists('setting')) {
    function setting(string $key, $default = null)
    {
        return \App\Models\SiteSetting::get($key, $default);
    }
}

if (!function_exists('section')) {
    function section(string $page, string $key, string $field = 'title', $default = null)
    {
        return \App\Models\Section::getSection($page, $key, $field, $default);
    }
}

if (!function_exists('faIcon')) {
    function faIcon($class)
    {
        $class = trim((string) $class);
        if ($class === '') return '';

        if (strpos($class, 'fas ') === 0 || strpos($class, 'far ') === 0 || strpos($class, 'fab ') === 0 || strpos($class, 'fa ') === 0) {
            return $class;
        }

        $brandIcons = [
            'fa-facebook', 'fa-facebook-f', 'fa-facebook-square',
            'fa-instagram', 'fa-twitter', 'fa-youtube', 'fa-youtube-square',
            'fa-whatsapp', 'fa-whatsapp-square',
            'fa-linkedin', 'fa-linkedin-in',
            'fa-tiktok', 'fa-pinterest', 'fa-telegram', 'fa-telegram-plane',
            'fa-snapchat', 'fa-reddit', 'fa-github',
        ];

        $iconName = ltrim($class, 'fa-');
        $baseName = 'fa-' . $iconName;

        foreach ($brandIcons as $brand) {
            if ($baseName === $brand || $baseName === $brand . '-square' || $class === $brand) {
                return 'fab ' . $class;
            }
        }

        return 'fas ' . $class;
    }
}
