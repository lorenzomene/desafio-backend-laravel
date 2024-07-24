<?php

namespace App\Enums;

enum StatusEnum: string {
    
    case Created = 'created';
    case Withdraw = 'withdraw';
    case Debited = 'debited';
    case Completed = 'completed';
    
}