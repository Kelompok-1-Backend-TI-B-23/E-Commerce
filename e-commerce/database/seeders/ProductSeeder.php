<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
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
        // Make sure storagenya ada
        Storage::disk('public')->makeDirectory('images');

        // Image yang local dari seeder
        $images = [
            'shoes/image1.png',
            'shoes/image2.png',
            'shoes/image3.png',
            'shoes/image4.png',
            'shirts/image1.png',
            'shirts/image2.png',
            'shirts/image3.png',
            'shirts/image4.png',
            'pants/image1.png',
            'pants/image2.png',
            'pants/image3.png',
            'pants/image4.png',
        ];

        // Copy tiap image ke storage
        foreach ($images as $image) {
            Storage::disk('public')->put('images/' . $image, file_get_contents(public_path('images/' . $image)));
        }

        // Data produk sepatu 1
        Product::create([
            'name' => "Nike Air Force 1 '07",
            'description' => 'You cant stop ageing, but the Air Force 1 "Fresh" gets pretty close.Soft, textured leather helps conceal creasing and is easy to clean. The debossed branding, which replaces the woven labels, pairs with extra laces so you can eat that jam doughnut in peace. And the perforated sockliner keeps it airy and breathable. Now, theres really no reason not to rock white-on-white.',
            'stock' => '13',
            'price' => 1549000,
            'image_url' => 'images/shoes/image1.png',
            'category' => 'Shoes',
        ]);

        // Data produk sepatu 2
        Product::create([
            'name' => "Nike Air Force 1 '07",
            'description' => "Comfortable, durable and timeless—it's number 1 for a reason. The '80s construction pairs with classic colours for style that tracks whether you're on court or on the go.",
            'stock' => '17',
            'price' => 1329000,
            'image_url' => 'images/shoes/image2.png',
            'category' => 'Shoes',
        ]);

        // Data produk sepatu 3
        Product::create([
            'name' => "Nike Air Force 1 '07 Next Nature",
            'description' => 'This hoops original gives "fresh air" a whole new meaning. The breezy canvas, embroidered details and a bouquet of spring colours bring summertime vibes to what you already know and love: Nike Air cushioning, classic construction and style for days.',
            'stock' => '20',
            'price' => 1529000,
            'image_url' => 'images/shoes/image3.png',
            'category' => 'Shoes',
        ]);

        // Data produk sepatu 4
        Product::create([
            'name' => 'Nike Ijo',
            'description' => 'Description for Product 2',
            'category' => 'Shoes',
        ]);

        // Data produk Baju 1
        Product::create([
            'name' => 'JSON Sporty Green Shirts',
            'description' => "Bold, screen-printed graphics bring Nina's style to the forefront in this everyday tee. Expect a roomier fit if you typically wear women's clothing. We recommend sticking with your standard size.",
            'stock' => '21',
            'price' => 619000,
            'image_url' => 'images/shirts/image1.png',
            'category' => 'Shirts',
        ]);

        // Data produk Baju 2
        Product::create([
            'name' => 'JSON Sporty Blue Shirts',
            'description' => "Bold, screen-printed graphics bring Nina's style to the forefront in this everyday tee. Expect a roomier fit if you typically wear women's clothing. We recommend sticking with your standard size.",
            'stock' => '22',
            'price' => 639000,
            'image_url' => 'images/shirts/image2.png',
            'category' => 'Shirts',
        ]);

        // Data produk Baju 3
        Product::create([
            'name' => 'JSON Sporty x Raymond Euginio T-shirts',
            'description' => "Heavyweight French terry gives this hoodie a structured look, while fabric patches bring Nina's style to the forefront. Expect a roomier fit if you typically wear women's clothing. We recommend sticking with your standard size.",
            'stock' => '23',
            'price' => 1799000,
            'image_url' => 'images/shirts/image3.png',
            'category' => 'Shirts',
        ]);

        // Data produk Baju 4
        Product::create([
            'name' => 'JSON Sporty x Eileen T-shirts',
            'description' => "Bold, screen-printed graphics bring Nina's style to the forefront in this everyday tee. Expect a roomier fit if you typically wear women's clothing. We recommend sticking with your standard size.",
            'stock' => '18',
            'price' => 629000,
            'image_url' => 'images/shirts/image4.png',
            'category' => 'Shirts',
        ]);

        // Data produk Celana 1
        Product::create([
            'name' => 'JSON Sporty x Angel Shorts',
            'description' => 'Step into a world of color and style with our Vibrant Pink Pants. Crafted from premium, breathable fabric, these pants offer a perfect blend of comfort and fashion. The bold pink hue is designed to stand out, making a statement wherever you go. Featuring a sleek, modern fit with an elastic waistband and adjustable drawstrings, these pants ensure maximum comfort and a customized fit. Perfect for both casual outings and active days, these pants are your go-to choice for a trendy and comfortable look.',
            'category' => 'Pants',
            'stock' => '20',
            'price' => 189000,
            'image_url' => 'images/pants/image1.png',
            'category' => 'Pants',
        ]);

        // Data produk Celana 2
        Product::create([
            'name' => 'JSON Sporty x Jocelyn Shorts',
            'description' => 'Elevate your wardrobe with our Classic Dark Blue Pants, a timeless addition to your apparel collection. Made from high-quality, durable fabric, these pants provide both comfort and longevity. The deep blue color exudes sophistication and versatility, making them suitable for various occasions, from casual gatherings to more formal events. With a tailored fit and a mid-rise waist, these pants offer a flattering silhouette that pairs effortlessly with any top.',
            'category' => 'Pants',
            'stock' => '20',
            'price' => 187000,
            'image_url' => 'images/pants/image2.png',
            'category' => 'Pants',
        ]);

        // Data produk Celana 3
        Product::create([
            'name' => 'JSON Sporty x James Shorts',
            'description' => 'Refresh your look with our Bright Light Blue Pants, designed for those who love to embrace vibrant colors. These pants are crafted from soft, lightweight material, ensuring all-day comfort. The light blue shade adds a refreshing touch to your ensemble, perfect for warm days or casual outings. Featuring a relaxed fit and a drawstring waist, these pants provide a laid-back yet stylish appearance, ideal for any casual occasion.',
            'category' => 'Pants',
            'stock' => '20',
            'price' => 179000,
            'image_url' => 'images/pants/image3.png',
            'category' => 'Pants',
        ]);

        // Data produk Celana 4
        Product::create([
            'name' => 'JSON Sporty x Ariana Shorts',
            'description' => 'Discover the perfect blend of style and comfort with our Modern Gray Pants. Made from a high-quality fabric blend, these pants are designed to offer maximum flexibility and durability. The neutral gray tone makes them a versatile addition to any wardrobe, suitable for both casual and semi-formal settings. With a comfortable fit and practical features such as an elastic waistband and multiple pockets, these pants are as functional as they are fashionable.',
            'category' => 'Pants',
            'stock' => '20',
            'price' => 169000,
            'image_url' => 'images/pants/image4.png',
            'category' => 'Pants',
        ]);

    }
}
