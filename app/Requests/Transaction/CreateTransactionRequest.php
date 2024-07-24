<?php

namespace App\Requests\Transaction;

use App\DTO\Transaction\TransactionDTO;
use Illuminate\Foundation\Http\FormRequest;

class CreateTransactionRequest extends FormRequest 
{
    public function authorize(): true 
    {
        return true;
    }

    public function rules()
    {
        return [
            'payer_id' => ['required', 'string'],//poderia colocar validação se existe nos models de wallet, mantendo simples por enquanto
            'payee_id' => ['required', 'string'],
            'value' => ['required', 'integer'],
        ];
    }

    public function toDTO(): TransactionDTO
    {
        return new TransactionDTO(
            payerId: $this->input('payer_id'),
            payeeId: $this->input('payee_id'),
            value: $this->input('value'),
        );
    }
}