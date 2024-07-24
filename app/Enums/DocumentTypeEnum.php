<?php

namespace App\Enums;

enum DocumentTypeEnum: string {
    
    case CPF = 'cpf';
    case CNPJ = 'cnpj';

    public static function getByUserType(string $value): string
    {
        return match($value) {
            UserTypeEnum::Customer->value => self::CPF->value,
            UserTypeEnum::Shopkeeper->value => self::CNPJ->value
        };
    }
}