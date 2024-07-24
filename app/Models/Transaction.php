<?php

namespace App\Models;

use App\Enums\StatusEnum;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory, HasUuids;

    public $incrementing = false;

    protected $table = 'transactions';

    protected $fillable = [
        'id',
        'payer_id',
        'payee_id',
        'status',
        'value'
    ];

    protected $casts = [
        'status' => StatusEnum::class,
        'value' => 'integer',
    ];

    protected static function newFactory()
    {
        return \Database\Factories\Transaction\TransactionFactory::new();
    } 

}