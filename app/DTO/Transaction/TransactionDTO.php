<?php

namespace App\DTO\Transaction;

readonly class TransactionDTO 
{
    public function __construct(
        public string $payerId,
        public string $payeeId,
        public int $value,
    )
    {
    }
}