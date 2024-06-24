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
        'role',
    ];

    protected $hidden = [
        'password',
        'pin',
        'remember_token',
    ];

    public function history()
    {
        return $this->hasMany(purchaseHistory::class, 'user_id');
    }


}