<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

}
