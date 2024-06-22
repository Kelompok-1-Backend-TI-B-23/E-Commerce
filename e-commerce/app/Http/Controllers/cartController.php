<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;

class cartController extends Controller
{
    public function index()
    {
        $cart = Cart::with('items.product')->where('user_id', auth()->id())->first();
        return view('cart', compact('cart'));
    }

    public function showMenu()
    {
        $cart = Cart::with('items.product')->where('user_id', auth()->id())->first();
        return view('menu', compact('cart'));
    }


    public function addToCart(Request $request, $productId)
    {
        $product = Product::findOrFail($productId);

        $cart = Cart::firstOrCreate([
            'user_id' => auth()->id(),
        ]);

        $cartItem = CartItem::firstOrCreate([
            'cart_id' => $cart->id,
            'product_id' => $product->id,
        ], [
            'quantity' => $request->input('quantity', 1),
            'price' => $product->price,
        ]);

        if (!$cartItem->wasRecentlyCreated) {
            $cartItem->increment('quantity');
        }

        return redirect()->route('user.cart')->with('success', 'Product added to cart!');
    }

    public function updateCart(Request $request, $itemId)
    {
        $cartItem = CartItem::findOrFail($itemId);
        $newQuantity = $request->input('quantity');

        if ($newQuantity < 1) {
            $cartItem->delete();
            return redirect()->route('user.cart')->with('success', 'Item removed from cart.');
        }

        $cartItem->update(['quantity' => $newQuantity]);

        return redirect()->route('user.cart')->with('success', 'Cart updated!');
    }

    public function removeFromCart($itemId)
    {
        $cartItem = CartItem::findOrFail($itemId);
        $cartItem->delete();

        return redirect()->route('user.cart')->with('success', 'Product removed from cart!');
    }
}

