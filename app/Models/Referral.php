<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Referral extends Model
{
    use HasApiTokens;

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'name',
        'created_at',
        'referral_id',
        'referral_name',
    ];

    protected $casts = [
        'user_id' => 'double',
        'name' => 'string',
        'created_at' => 'datetime',
        'referral_id' => 'double',
        'referral_name' => 'string',
    ];

}
