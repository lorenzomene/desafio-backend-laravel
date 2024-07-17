<?php

namespace App\Enums;

enum Status: int {
    
    case Pending = 1;
    case Error = 2;
    case Success = 3;
    
    public static function toString(int $value): ?string
    {
        return match($value) {
            self::Pending->value => 'Pending',
            self::Error->value => 'Error',
            self::Success->value => 'Success',
            default => 'Pending',
        };
    }

    public static function toInt(string $name): ?int
    {
        return match($name) {
            'Pending' => self::Pending->value,
            'Error' => self::Error->value,
            'Success' => self::Success->value,
            default => self::Pending->value,
        };
    }
}