<?php

use App\Models\Setting;

if (! function_exists('setting')) {
    /**
     * Read a database-backed setting with a safe fallback.
     */
    function setting(string $key, $default = null)
    {
        return Setting::get($key, $default);
    }
}

if (! function_exists('setting_asset')) {
    /**
     * Resolve a stored image path or URL to a usable asset URL.
     */
    function setting_asset(?string $path, string $fallback = '1n-west/images/cover_bg_1.jpg'): string
    {
        if (! $path) {
            return asset($fallback);
        }

        if (preg_match('#^https?://#i', $path)) {
            return $path;
        }

        return asset(ltrim($path, '/'));
    }
}

if (! function_exists('setting_link')) {
    /**
     * Resolve a stored link setting (absolute URL, route path or mailto/tel).
     */
    function setting_link(string $key, ?string $default = null): ?string
    {
        $value = setting($key, $default);

        if (! $value) {
            return null;
        }

        if (preg_match('#^(https?://|mailto:|tel:)#i', $value)) {
            return $value;
        }

        return url($value);
    }
}

if (! function_exists('property_image_url')) {
    /**
     * Resolve a property/blog image, supporting both local and remote
     * placeholders, with a graceful fallback when nothing is stored.
     */
    function property_image_url(?string $path, ?string $fallback = null): string
    {
        $fallback = $fallback ?: 'https://placehold.co/800x600/e9ecef/495057?text=1N-West';

        if (! $path) {
            return $fallback;
        }

        if (preg_match('#^https?://#i', $path)) {
            return $path;
        }

        $local = public_path('1n-west/images/' . ltrim($path, '/'));

        return file_exists($local)
            ? asset('1n-west/images/' . ltrim($path, '/'))
            : $fallback;
    }
}

if (! function_exists('avatar_url')) {
    function avatar_url(?string $path, ?string $name = null): string
    {
        $fallback = 'https://ui-avatars.com/api/?background=0d6efd&color=ffffff&name='
            . urlencode($name ?: '1N-West');

        if (! $path) {
            return $fallback;
        }

        return property_image_url($path, $fallback);
    }
}
