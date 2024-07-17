<?php

namespace App\Enums;

enum UserType: int {
    
    case Customer = 1;
    case Shopkeeper = 2;

    public static function toString(int $value): ?string
    {
        return match($value) {
            self::Customer->value => 'Customer',
            self::Shopkeeper->value => 'Shopkeeper',
            default => 'Customer',
        };
    }

    public static function toInt(string $name): ?int
    {
        return match($name) {
            'Customer' => self::Customer->value,
            'Shopkeeper' => self::Shopkeeper->value,
            default => self::Customer->value,
        };
    }
}