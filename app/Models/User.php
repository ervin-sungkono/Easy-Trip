<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function cart(){
        return $this->hasOne(Cart::class);
    }

    public function transactions(){
        return $this->hasMany(Transaction::class);
    }

    public function tickets(){
        return $this->hasMany(Ticket::class);
    }

    public function socialAccounts(){
        return $this->hasMany(SocialAccount::class);
    }
}
