<?php

namespace App\Http\Gateways;

interface PaymentGatewayInterface 
{
    public function getName(): string;
    
    public function authorize(): bool;
}