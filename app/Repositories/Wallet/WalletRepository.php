<?php

namespace App\Repositories\Wallet;

use App\Models\Wallet;

class WalletRepository 
{

    public function findByIdWithUser(string $walletId): Wallet
    {
        return Wallet::with('user')->find($walletId);
    }
}