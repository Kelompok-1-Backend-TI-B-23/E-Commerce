<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CartItem;
class CartItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        CartItem::create([
            'cart_id' => 2,
            'product_id' => 1,
            'quantity' => 1,
        ]);

        CartItem::create([
            'cart_id' => 2,
            'product_id' => 2,
            'quantity' => 1,
        ]);
    }
}
