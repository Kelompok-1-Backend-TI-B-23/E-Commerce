<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;

class aboutController extends Controller
{
    public function index()
    {
        $cart = Cart::with('items.product')->where('user_id', auth()->id())->where('status', 'active')->first();
        return view('cart.index', compact('cart'));
    }

    public function addToCart(Request $request, $productId){
        $product = Product::findOrFail($productId);
        $cart = Cart::firstOrCreate([
            'user_id' => auth()->id(),
            'status' => 'active',
        ]);

        $cartItem = CartItem::firstOrCreate([
            'cart_id' => $cart->id,
            'product_id' => $product->id,
        ], [
            'quantity' => 1,
            'price' => $product->price,
        ]);

        if (!$cartItem->wasRecentlyCreated) {
            $cartItem->increment('quantity');
        }
        return redirect()->route('cart.index')->with('success', 'Product added to cart!');
    }

    public function removeFromCart($itemId)
    {
        $cartItem = CartItem::findOrFail($itemId);
        $cartItem->delete();

        return redirect()->route('cart.index')->with('success', 'Product removed from cart!');
    }
}
