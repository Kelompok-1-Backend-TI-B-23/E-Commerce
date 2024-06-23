<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $shoes = Category::where('name', 'Shoes')->first();
        $shirt = Category::where('name', 'Shirt')->first();
        $pants = Category::where('name', 'Pants')->first();

        // Data produk
        Product::create([
            'name' => 'Nike Putih',
            'description' => 'Description for Product 1',
            'stock' => '20',
            'price' => 50.00,
            'image_url' =>'images/image1.png',
            'category' => 'Shoes', 
        ]);

        Product::create([
            'name' => 'Nike Ijo',
            'description' => 'Description for Product 2',
            'stock' => '20',
            'price' => 75.00,
            'image_url' => 'images/image2.png',
            'category' => 'Shoes',
        ]);

        Product::create([
            'name' => 'Baju Ijo',
            'description' => 'Description for Product 3',
            'category' => 'Shirt', 
            'stock' => '20',
            'price' => 100.00,
            'image_url' => 'images/image3.png',
            'category' => 'Shirt',
        ]);

        Product::create([
            'name' => 'Baju Biru',
            'description' => 'Description for Product 4',
            'category' => 'Shirt', 
            'stock' => '20',
            'price' => 100.00,
            'image_url' => 'images/image4.png',
            'category' => 'Shirt',
        ]);

        Product::create([
            'name' => 'Celana Hijau',
            'description' => 'Description for Product 4',
            'category' => 'Pants',
            'stock' => '20',
            'price' => 100.00,
            'image_url' => 'images/image5.png',
            'category' => 'Pants',
        ]);

        Product::create([
            'name' => 'Celana Merah',
            'description' => 'Description for Product 4',
            'category' => 'Pants',
            'stock' => '20',
            'price' => 100.00,
            'image_url' => 'images/image6.png',
            'category' => 'Pants',
        ]);
    }
}
