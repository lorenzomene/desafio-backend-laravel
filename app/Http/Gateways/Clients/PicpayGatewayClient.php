<?php

namespace App\Http\Gateways\Clients;

use App\Http\Gateways\PaymentGatewayInterface;
use Illuminate\Support\Facades\Http;

class PicpayGatewayClient implements PaymentGatewayInterface
{
    public function getName(): string
    {
        return 'picpay';
    }

    public function authorize(): bool
    {
        $request = Http::get('https://util.devi.tools/api/v2/authorize')->json();
        dd($request);
        return $request['status'] == 'success' && $request["data"]["authorization"] == true;
    }
}