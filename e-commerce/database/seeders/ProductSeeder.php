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
            'name' => 'White Shoes',
            'description' => 'Description for Product 1',
            'category' => 'Shoes',
            'stock' => '20',
            'price' => 50.00,
            'image_url' =>'images/image1.png',
            // 'category_id' => 1, 
        ]);

        Product::create([
            'name' => 'Green Shoes',
            'description' => 'Description for Product 2',
            'category' => 'Shoes',
            'stock' => '20',
            'price' => 75.00,
            'image_url' => 'images/image2.png',
            // 'category_id' => 2,
        ]);

        Product::create([
            'name' => 'Black Hoodie',
            'description' => 'Description for Product 3',
            'category' => 'Shirts',
            'stock' => '10',
            'price' => 60.00,
            'image_url' => 'images/image3.png',
            // 'category_id' => 3,
        ]);
        
        Product::create([
            'name' => 'Black Sweatpants',
            'description' => 'Description for Product 4',
            'category' => 'Pants',
            'stock' => '30',
            'price' => 70.00,
            'image_url' => 'images/image4.png',
            // 'category_id' => 4,
        ]);
        
        Product::create([
            'name' => 'Black T-Shirt',
            'description' => 'Description for Product 5',
            'category' => 'Shirts',
            'stock' => '25',
            'price' => 45.00,
            'image_url' => 'images/image5.png',
            // 'category_id' => 5,
        ]);
        
        Product::create([
            'name' => 'Brown T-Shirt',
            'description' => 'Description for Product 6',
            'category' => 'Shirts',
            'stock' => '35',
            'price' => 45.00,
            'image_url' => 'images/image6.png',
            // 'category_id' => 6,
        ]);
    }
}
