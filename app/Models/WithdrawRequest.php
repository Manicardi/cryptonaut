<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class WithdrawRequest extends Model
{
    use HasApiTokens;

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'amount',
        'wallet',
        'processed',
        'created_at',
    ];

    protected $casts = [
        'user_id' => 'double',
        'amount' => 'double',
        'wallet' => 'string',
        'processed' => 'boolean',
        'created_at' => 'datetime',
    ];

}
