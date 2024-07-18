<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Wallet extends Model
{
    use HasFactory, HasUuids;

    public $incrementing = false;

    protected $table = 'wallets';

    protected $fillable = [
        'id',
        'user_id',
        'balance',
    ];

    protected $casts = [
        'balance' => 'integer',
    ];

    protected static function newFactory()
    {
        return \Database\Factories\Wallet\WalletFactory::new();
    } 

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}