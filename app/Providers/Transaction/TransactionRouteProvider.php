<?php

namespace App\Providers\Transaction;

use App\Http\Controllers\Transaction\TransactionController;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Route;

class TransactionRouteProvider extends RouteServiceProvider
{
   public function map(): void 
    {
        Route::prefix('api')->group(function () {
            Route::post('/transaction', [TransactionController::class, 'postPayment'])->name('transactions.create');
        });
    } 
}
