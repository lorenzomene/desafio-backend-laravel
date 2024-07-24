<?php

namespace App\Services\Transaction;

use App\DTO\Transaction\TransactionDTO;
use App\Enums\StatusEnum;
use App\Enums\UserTypeEnum;
use App\Exceptions\Transaction\TransactionException;
use App\Repositories\Transaction\TransactionRepository;
use App\Repositories\Wallet\WalletRepository;

class TransactionService
{
    public function __construct(
        private readonly TransactionRepository $transactionRepository,
        private readonly WalletRepository $walletRepository,
    )
    {   
    }

    public function handle(TransactionDTO $transactionDTO)
    {
        $payerWallet = $this->walletRepository->findByIdWithUser($transactionDTO->payerId);

        if (!$payerWallet->isCustomer()) {
            throw TransactionException::shopkeeperNotAllowedToMakeTransaction();
        }
        
        if ($payerWallet->hasBalanceToMakeTransaction($transactionDTO->value)) {
            throw TransactionException::notEnoughBalanceToMakeTransaction();
        }


        $transaction = $this->transactionRepository->startTransaction($transactionDTO);

        $this->transactionRepository->updateTransactionStatus($transaction->getKey(), StatusEnum::Completed);
    }
}