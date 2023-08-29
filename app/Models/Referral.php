<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Foundation\Auth\User as Authenticatable;
// use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Referral extends Model//extends Authenticatable
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

    // static public function create($request) {
    //     $referal = new Referral;
    //     $referal->user_id = $request['user_id'];
    //     $referal->name = $request['name'];
    //     $referal->created_at = $request['created_at'];
    //     $referal->referral_id = $request['referral_id'];
    //     $referal->save();
    // }
}
