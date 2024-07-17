<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TransactionController extends Controller
{
   public function postPayment(): Response
   {
        return response()->noContent();
   } 
}
