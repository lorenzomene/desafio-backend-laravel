<?php

namespace App\Exceptions\PaymentGateway;

use Exception;

class PaymentGatewayException extends Exception
{
    public static function unavailableProvider(): self
    {
        return new self('No existing implementation for provider found.');
    }
}