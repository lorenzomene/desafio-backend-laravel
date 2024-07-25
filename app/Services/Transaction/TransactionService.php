<?php

namespace App\Services\Transaction;

use App\DTO\Transaction\TransactionDTO;
use App\Enums\StatusEnum;
use App\Enums\UserTypeEnum;
use App\Exceptions\Transaction\TransactionException;
use App\Models\Wallet;
use App\Repositories\Transaction\TransactionRepository;
use App\Repositories\Wallet\WalletRepository;
use Illuminate\Support\Facades\DB;

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

        $this->validateTransactionConditions($payerWallet, $transactionDTO->value);

        DB::transaction(function() use ($payerWallet, $transactionDTO) {
            $transaction = $this->transactionRepository->startTransaction($transactionDTO);
            
            $payeeWallet = $this->walletRepository->findByIdWithUser($transactionDTO->payeeId);

            $this->walletRepository->deposit($payeeWallet->getKey(), $transactionDTO->value);
            $this->walletRepository->withdrawal($payerWallet->getKey(), $transactionDTO->value);

            $this->transactionRepository->updateTransactionStatus($transaction->getKey(), StatusEnum::Completed);
        });

    }

    private function validateTransactionConditions(Wallet $wallet, int $value): void
    {
        if (!$wallet->isCustomer()) {
            throw TransactionException::shopkeeperNotAllowedToMakeTransaction();
        }
        
        if ($wallet->hasBalanceToMakeTransaction($value)) {
            throw TransactionException::notEnoughBalanceToMakeTransaction();
        }
    }
}