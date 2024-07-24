<?php

namespace App\Services\Transaction;

use App\DTO\Transaction\TransactionDTO;
use App\Repositories\Transaction\TransactionRepository;

class TransactionService
{
    public function __construct(
        private readonly TransactionRepository $repository
    )
    {   
    }

    public function handle(TransactionDTO $transactionDTO)
    {
        $this->repository->startTransaction($transactionDTO);
    }
}