<?php

namespace App\Providers\PaymentGateway;

use App\Exceptions\PaymentGateway\PaymentGatewayException;
use App\Http\Gateways\Clients\PicpayGatewayClient;
use App\Http\Gateways\PaymentGatewayInterface;
use Illuminate\Support\ServiceProvider;

class PaymentGatewayServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->app->bind(PaymentGatewayInterface::class, function($app) {
            return match($app['config']['payments.default_provider']) {
                'picpay' => new PicpayGatewayClient(),
                default => throw PaymentGatewayException::unavailableProvider(),
            };
        });
    }
}
