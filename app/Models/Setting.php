<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'key',
        'value',
        'type',
        'is_translatable',
        'description',
    ];

    protected $casts = [
        'is_translatable' => 'boolean',
    ];

    public static function getValue(string $key, mixed $default = null): mixed
    {
        $setting = static::where('key', $key)->first();

        if (!$setting) {
            return $default;
        }

        return match ($setting->type) {
            'integer' => (int) $setting->value,
            'boolean' => (bool) $setting->value,
            'json' => json_decode($setting->value, true),
            default => $setting->value,
        };
    }

    public static function setValue(string $key, mixed $value, string $type = 'string', ?string $description = null): self
    {
        $record = static::firstOrNew(['key' => $key]);

        $record->value = is_array($value) || is_object($value)
            ? json_encode($value, JSON_THROW_ON_ERROR)
            : (string) $value;

        $record->type = $type;
        $record->description = $description;
        $record->save();

        return $record;
    }
}
