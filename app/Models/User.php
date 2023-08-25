<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'wallet',
        'level',
        'experience',
        'points',
        'coin',
        'energy',
        'energy_limit',
        'travel_start_at',
        'energy_collect_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'password' => 'hashed',
        'wallet' => 'string',
        'level' => 'double',
        'experience' => 'double',
        'points' => 'double',
        'coin' => 'double',
        'energy' => 'double',
        'energy_limit' => 'double',
        'travel_start_at' => 'datetime',
        'energy_collect_at' => 'datetime',
    ];
}
