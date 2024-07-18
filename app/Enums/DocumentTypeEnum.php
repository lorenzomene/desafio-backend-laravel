<?php

namespace App\Enums;

enum DocumentTypeEnum: int {
    
    case CPF = 1;
    case CNPJ = 2;

    public static function toString(int $value): string
    {
        return match($value) {
            self::CPF->value => 'CPF',
            self::CNPJ->value => 'CNPJ',
            default => 'CPF',
        };
    }

    public static function toInt(string $name): int
    {
        return match($name) {
            'CPF' => self::CPF->value,
            'CNPJ' => self::CNPJ->value,
            default => self::CPF->value,
        };
    }
}