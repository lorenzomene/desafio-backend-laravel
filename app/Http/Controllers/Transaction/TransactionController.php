<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use App\Repositories\Transaction\TransactionRepository;
use App\Requests\Transaction\CreateTransactionRequest;
use App\Services\Transaction\TransactionService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TransactionController extends Controller
{
   public function __construct(
      private readonly TransactionService $service
   )
   {  
   }

   public function postPayment(CreateTransactionRequest $request): Response
   {
      $this->service->handle($request->toDTO());
      return response()->noContent();
   } 
}
