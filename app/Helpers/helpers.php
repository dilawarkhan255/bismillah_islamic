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
