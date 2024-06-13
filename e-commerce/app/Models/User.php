<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'username',
        'email',
        'password',
        'pin',
        'phone_number',
        'address_street',
        'address_city',
        'address_province',
        'address_postal_code',
        'balance',
    ];

    protected $hidden = [
        'password',
        'pin',
        'remember_token',
    ];

    // public function setPasswordAttribute($value)
    // {
    //     $this->attributes['password'] = bcrypt($value);
    // }

    // public function setPinAttribute($value)
    // {
    //     $this->attributes['pin'] = bcrypt($value);
    // }
}