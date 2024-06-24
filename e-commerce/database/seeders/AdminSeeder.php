<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $email = 'admin@json.sporty.id';
        $password = 'Jsonsport123@';

        User::create([
            'username' => 'admin',
            'email' => $email,
            'password' => Hash::make($password),
            'pin' => Hash::make('000000'),  
            'phone_number' => '000000000',  
            'address_street' => 'Admin', 
            'address_city' => 'Admin',
            'address_province' => 'Admin', 
            'address_postal_code' => '12345',  
            'balance' => 0.00,
            'role' => 'admin',
        ]);
    }
}
