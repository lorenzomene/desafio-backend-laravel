<?php

namespace App\Exceptions\Transaction;

use Exception;

class TransactionException extends Exception
{
    public static function shopkeeperNotAllowedToMakeTransaction(): self
    {
        return new self('Shopkeepers are not allowed to pay.');
    }

    public static function notEnoughBalanceToMakeTransaction(): self
    {
        return new self('Shopkeepers are not allowed to pay.');
    }

    public static function unauthorizedByGateway(string $gatewayName): self
    {
        return new self(sprintf('Payment unauthorized by %s.', $gatewayName));
    }
}