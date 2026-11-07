<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Throwable;

class Setting extends Model
{
    protected $fillable = [
        'key',
        'value',
    ];

    /**
     * Return every setting as a flat key => value array. Missing tables
     * (for example before migrations run) degrade to an empty array so the
     * site never crashes because of configuration storage.
     */
    public static function allAsArray(): array
    {
        try {
            return Cache::rememberForever('settings.all', function () {
                return static::query()->pluck('value', 'key')->all();
            });
        } catch (Throwable $e) {
            return [];
        }
    }

    public static function get(string $key, $default = null)
    {
        $settings = static::allAsArray();

        if (! array_key_exists($key, $settings)) {
            return $default;
        }

        $value = $settings[$key];

        return ($value === null || $value === '') ? $default : $value;
    }

    public static function set(string $key, $value): void
    {
        static::updateOrCreate(['key' => $key], ['value' => $value]);
        static::forgetCache();
    }

    public static function forgetCache(): void
    {
        Cache::forget('settings.all');
    }

    protected static function booted()
    {
        static::saved(fn () => static::forgetCache());
        static::deleted(fn () => static::forgetCache());
    }
}
