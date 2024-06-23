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

        // Data produk sepatu 1
        Product::create([
            'name' => "Nike Air Force 1 '07",
            'description' => 'You cant stop ageing, but the Air Force 1 "Fresh" gets pretty close.Soft, textured leather helps conceal creasing and is easy to clean. The debossed branding, which replaces the woven labels, pairs with extra laces so you can eat that jam doughnut in peace. And the perforated sockliner keeps it airy and breathable. Now, theres really no reason not to rock white-on-white.',
            'stock' => '13',
            'price' => 1549000,
            'image_url' =>'images/shoes/image1.png',
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
            'name' => "Nike Air Force 1 '07 EasyOn",
            'description' => "Quicker than 1, 2, 3—the original hoops shoe lets you get going. This version of the AF-1 features Nike EasyOn technology for a hands-free experience. The flexible heel collapses when you step in then snaps back into place, making it easy to slip the shoe on and off. Add that to its clean, crisp leather and you've got ultimate wearability. Yeah, it's everything you love and then some.",
            'stock' => '23',
            'price' => 1829000,
            'image_url' => 'images/shoes/image4.png',
            'category' => 'Shoes',
        ]);

        // Data produk Baju 1
        Product::create([
            'name' => 'JSON Sporty Green Shirt',
            'description' => "Bold, screen-printed graphics bring Nina's style to the forefront in this everyday tee. Expect a roomier fit if you typically wear women's clothing. We recommend sticking with your standard size.",
            'stock' => '21',
            'price' => 619000,
            'image_url' => 'images/shirt/image1.png',
            'category' => 'Shirt',
        ]);

        // Data produk Baju 2
        Product::create([
            'name' => 'JSON Sporty Blue Shirt',
            'description' => "Bold, screen-printed graphics bring Nina's style to the forefront in this everyday tee. Expect a roomier fit if you typically wear women's clothing. We recommend sticking with your standard size.",
            'stock' => '22',
            'price' => 639000,
            'image_url' => 'images/shirt/image2.png',
            'category' => 'Shirt',
        ]);

        // Data produk Baju 3
        Product::create([
            'name' => 'JSON Sporty x Raymond Euginio T-shirt',
            'description' => "Heavyweight French terry gives this hoodie a structured look, while fabric patches bring Nina's style to the forefront. Expect a roomier fit if you typically wear women's clothing. We recommend sticking with your standard size.",
            'stock' => '23',
            'price' => 1799000,
            'image_url' => 'images/shirt/image3.png',
            'category' => 'Shirt',
        ]);

        // Data produk Baju 4
        Product::create([
            'name' => 'JSON Sporty x Eileen T-shirt',
            'description' => "Bold, screen-printed graphics bring Nina's style to the forefront in this everyday tee. Expect a roomier fit if you typically wear women's clothing. We recommend sticking with your standard size.", 
            'stock' => '18',
            'price' => 629000,
            'image_url' => 'images/shirt/image4.png',
            'category' => 'Shirt',
        ]);

        // Data produk Celana 1
        Product::create([
            'name' => 'JSON Sporty x Angel Shorts',
            'description' => 'Description for Product 4',
            'category' => 'Pants',
            'stock' => '20',
            'price' => 189000,
            'image_url' => 'images/pants/image1.png',
            'category' => 'Pants',
        ]);

        // Data produk Celana 2
        Product::create([
            'name' => 'JSON Sporty x Jocelyn Shorts',
            'description' => 'Description for Product 4',
            'category' => 'Pants',
            'stock' => '20',
            'price' => 187000,
            'image_url' => 'images/pants/image2.png',
            'category' => 'Pants',
        ]);

        // Data produk Celana 3
        Product::create([
            'name' => 'JSON Sporty x James Shorts',
            'description' => 'Description for Product 4',
            'category' => 'Pants',
            'stock' => '20',
            'price' => 179000,
            'image_url' => 'images/pants/image3.png',
            'category' => 'Pants',
        ]);

        // Data produk Celana 4
        Product::create([
            'name' => 'JSON Sporty x Ariana Shorts',
            'description' => 'Description for Product 4',
            'category' => 'Pants',
            'stock' => '20',
            'price' => 169000,
            'image_url' => 'images/pants/image4.png',
            'category' => 'Pants',
        ]);
    }
}
