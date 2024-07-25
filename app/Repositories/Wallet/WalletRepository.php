<?php

namespace App\Repositories\Wallet;

use App\Models\Wallet;

class WalletRepository 
{

    public function findById(string $walletId): Wallet
    {
        return Wallet::find($walletId);
    }

    public function deposit(string $walletId, int $amount): bool
    {
        return Wallet::where('id', '=', $walletId)->increment('balance', $amount);
    }

    public function withdrawal(string $walletId, int $amount): bool
    {
        return Wallet::where('id', '=', $walletId)->decrement('balance', $amount);
    }
}