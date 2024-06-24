<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
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
        // Ensure the storage directory exists
        Storage::disk('public')->makeDirectory('images');

        // List of images to be copied
        $images = [
            'image1.png',
            'image2.png',
        ];

        // Copy each image to the storage
        foreach ($images as $image) {
            Storage::disk('public')->put('images/' . $image, file_get_contents(public_path('images/' . $image)));
        }

        // Example product data
        Product::create([
            'name' => 'Nike Putih',
            'description' => 'Description for Product 1',
            'category' => 'Shoes',
            'stock' => 20,
            'price' => 50.00,
            'image_url' => 'images/image1.png',
        ]);

        Product::create([
            'name' => 'Nike Ijo',
            'description' => 'Description for Product 2',
            'category' => 'Shoes',
            'stock' => 20,
            'price' => 75.00,
            'image_url' => 'images/image2.png',
        ]);
    }
}
