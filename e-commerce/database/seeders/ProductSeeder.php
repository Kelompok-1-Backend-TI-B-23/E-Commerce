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
        $shoes = Category::where('name', 'Shoes');
        $shirt = Category::where('name', 'Shirt');
        $pants = Category::where('name', 'Pants');

        // Data produk
        Product::create([
            'name' => 'Nike Putih',
            'description' => 'Description for Product 1',
            'stock' => '20',
            'price' => 50.00,
            'image_url' =>'images/image1.png',
            'category_id' => $shoes->id, 
        ]);

        Product::create([
            'name' => 'Nike Ijo',
            'description' => 'Description for Product 2',
            'stock' => '20',
            'price' => 75.00,
            'image_url' => 'images/image2.png',
            'category_id' => $shoes->id,
        ]);

        // Contoh product kategori selain Shoes
        Product::create([
            'name' => 'Baju Ijo',
            'description' => 'Description for Product 3',
            'category' => 'Shirt', // Shoes,Shirt,Pants
            'stock' => '20',
            'price' => 100.00,
            'image_url' => 'images/image3.png',
            // 'category_id' => 2,
        ]);
    }
}
