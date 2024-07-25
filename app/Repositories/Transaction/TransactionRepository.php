<?php

namespace App\Repositories\Transaction;

use App\DTO\Transaction\TransactionDTO;
use App\Enums\StatusEnum;
use App\Models\Transaction;

class TransactionRepository 
{

    public function startTransaction(TransactionDTO $payload): Transaction
    {
        return Transaction::create([
            'payer_id' => $payload->payerId,
            'payee_id' => $payload->payeeId,
            'value' => $payload->value,
            'status' => StatusEnum::Created,
        ]);
    }    

    public function updateTransactionStatus(string $transactionId, StatusEnum $status)
    {
        return Transaction::find($transactionId)->update([
            'status' => $status,
        ]);
    }

}