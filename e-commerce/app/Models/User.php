<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class User extends Model
{
    protected $fillable = [
        'username',
        'email',
        'phone_number',
        'password',
        'address_street',
        'address_city',
        'address_province',
        'address_postal_code',
        'pin',
    ];

    public static function createAccount($data)
    {
        return self::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'phone_number' => $data['phone_number'],
            'password' => Hash::make($data['password']),
            'address_street' => $data['address_street'],
            'address_city' => $data['address_city'],
            'address_province' => $data['address_province'],
            'address_postal_code' => $data['address_postal_code'],
            'pin' => Hash::make($data['pin']),
        ]);
    }
}