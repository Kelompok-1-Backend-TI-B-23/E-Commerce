<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class aboutController extends Controller
{
    public function index(){
        return view("about");
    }

    public function addToCart(Request $request, $productId){
        $product = Product::findOrFail($productId);
        $cart = Cart::firstOrCreate([
            'user_id' => auth()->id(),
            'status' => 'active',
        ]);
    }
}
