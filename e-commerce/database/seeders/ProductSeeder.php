<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Contoh data produk
        Product::create([
            'name' => 'Nike Putih',
            'description' => 'Description for Product 1',
            'category' => 'Shoes',
            'stock' => '20',
            'price' => 50.00,
            'image_url' =>'images/image1.png',
            // 'category_id' => 1, 
        ]);

        Product::create([
            'name' => 'Nike Ijo',
            'description' => 'Description for Product 2',
            'category' => 'Shoes',
            'stock' => '20',
            'price' => 75.00,
            'image_url' => 'images/image2.png',
            // 'category_id' => 2,
        ]);
    }
}
