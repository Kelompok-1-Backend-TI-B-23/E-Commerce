<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Cart;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cart::create([
            'status' => 'active',
            'user_id' => 1
        ]);

        Cart::create([
            'status' => 'active',
            'user_id' => 2
        ]);
    }
}
