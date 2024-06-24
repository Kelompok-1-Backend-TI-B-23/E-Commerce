<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class AddBalanceToUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Add balance to all users
        User::all()->each(function ($user) {
            $user->balance += 1000000; // Add Rp. 1,000,000 to each user
            $user->save();
        });
    }
}
