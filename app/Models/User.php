<?php

namespace App\Models;

use App\Enums\DocumentTypeEnum;
use App\Enums\UserTypeEnum;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class User extends Model
{
    use HasFactory, HasUuids;

    public $incrementing = false;

    protected $table = 'users';

    protected $fillable = [
        'id',
        'name',
        'email',
        'document_type',
        'document_number',
        'user_type',
    ];

    protected static function newFactory()
    {
        return \Database\Factories\User\UserFactory::new();
    } 


    public function wallet(): HasOne
    {
        return $this->hasOne(Wallet::class);
    }

}
