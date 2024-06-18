<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class productController extends Controller
{
    public function index()
    {
        // Mengambil semua produk dari database
        $products = Product::all();

        // Mengirimkan data produk ke view 'home'
        return view('product', ['products'=>$products]);
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'category'=>'required',
            'price' => 'required',
            'stock'=>'required',
            'description' => 'required',
            'image_url'=>'required',
        ]);
        $product = Product::create($request->all());
        return redirect()->route('profile');
    }
}
