<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;

class checkoutController extends Controller
{
    public function index()
    {
        $cart = Cart::with('items.product')->where('user_id', auth()->id())->where('status', 'active')->first();

        if (!$cart || $cart->items->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        return view('checkout.index', compact('cart'));
    }

    public function processCheckout(Request $request)
    {
        $cart = Cart::with('items.product')->where('user_id', auth()->id())->where('status', 'active')->first();

        if (!$cart || $cart->items->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        // Process payment and create order
        // For simplicity, we assume the payment is successful (hrs ditambahin dr saldo)

        $order = Order::create([
            'user_id' => auth()->id(),
            'total_price' => $cart->items->sum(function($item) {
                return $item->quantity * $item->price;
            }),
            'status' => 'pending',
        ]);

        foreach ($cart->items as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->price,
            ]);
        }

        // Clear the cart
        $cart->items()->delete();
        $cart->update(['status' => 'completed']);

        return redirect()->route('checkout.index')->with('success', 'Order placed successfully!');
    }
}
