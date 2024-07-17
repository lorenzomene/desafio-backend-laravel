<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TransactionController extends Controller
{
   public function postPayment(): Response
   {
        return response()->noContent();
   } 
}
