<?php

namespace App\Repositories\Wallet;

use App\Models\Wallet;

class WalletRepository 
{

    public function findByIdWithUser(string $walletId): Wallet
    {
        return Wallet::with('user')->find($walletId);
    }

    public function deposit(string $walletId, int $amount) 
    {
        Wallet::where('id', '=', $walletId)->increment('balance', $amount);
    }

    public function withdrawal(string $walletId, int $amount) 
    {
        Wallet::where('id', '=', $walletId)->decrement('balance', $amount);
    }
}