<?php

return [
    App\Providers\AppServiceProvider::class,
    App\Providers\Transaction\TransactionRouteProvider::class,
    App\Providers\Transaction\TransactionServiceProvider::class,
    App\Providers\PaymentGateway\PaymentGatewayServiceProvider::class,
];
