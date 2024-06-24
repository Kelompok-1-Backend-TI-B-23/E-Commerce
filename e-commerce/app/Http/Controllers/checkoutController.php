<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Hash;

class CheckoutController extends Controller
{
    protected $shippingRates = [
        'Aceh' => 25000, 
        'Bali' => 15000, 
        'Banten'=> 10000, 
        'Bengkulu' => 20000, 
        'DKI Jakarta' => 5000, 
        'DI Yogyakarta' => 10000, 
        'Gorontalo' => 25000, 
        'Jambi' => 20000, 
        'Jawa Barat' => 10000,
        'Jawa Tengah' => 10000, 
        'Jawa Timur' => 10000, 
        'Kalimantan Barat' => 20000, 
        'Kalimantan Selatan' => 20000, 
        'Kalimantan Tengah' => 20000,
        'Kalimantan Timur' => 20000, 
        'Kalimantan Utara' => 20000, 
        'Kepulauan Bangka Belitung' => 20000, 
        'Kepulauan Riau' => 20000,
        'Lampung' => 20000, 
        'Maluku' => 20000, 
        'Maluku Utara' => 20000, 
        'Nusa Tenggara Barat' => 15000, 
        'Nusa Tenggara Timur' => 15000, 
        'Papua' => 30000,
        'Papua Barat' => 30000, 
        'Riau' => 20000, 
        'Sulawesi Barat' => 25000, 
        'Sulawesi Selatan' => 25000, 
        'Sulawesi Tengah' => 25000, 
        'Sulawesi Tenggara' => 25000,
        'Sulawesi Utara' => 25000, 
        'Sumatera Barat' => 25000, 
        'Sumatera Selatan' => 25000, 
        'Sumatera Utara' => 25
    ];

    public function index()
    {
        $cart = Cart::with('items.product')->where('user_id', auth()->id())->first();

        if (!$cart || $cart->items->isEmpty()) {
            return redirect()->route('user.cart')->with('error', 'Your cart is empty.');
        }

        $user = auth()->user();
        $shippingCost = $this->shippingRates[$user->address_province] ?? 0;

        return view('checkout', compact('cart', 'shippingCost'));
    }

    public function processCheckout(Request $request)
    {
        $request->validate([
            'pin' => 'required',
        ]);

        $cart = Cart::with('items.product')->where('user_id', auth()->id())->first();

        if (!$cart || $cart->items->isEmpty()) {
            return back()->with('error', 'Your cart is empty.');
        }

        $user = auth()->user();
        $shippingCost = $this->shippingRates[$user->address_province] ?? 0;

        $totalPrice = $cart->items->sum(function($item) {
            return $item->quantity * $item->product->price;
        }) + $shippingCost;

        if (!Hash::check($request->pin, $user->pin)) {
            return back()->with('error', 'PIN is incorrect.');
        }

        if ($user->balance < $totalPrice) {
            return back()->with('error', 'Insufficient balance.');
        }

        $user->balance -= $totalPrice;
        $user->save();

        $order = Order::create([
            'user_id' => auth()->id(),
            'total_price' => $totalPrice,
            'shipping_cost' => $shippingCost, 
        ]);

        foreach ($cart->items as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->product->price,
            ]);
        }

        // Clear the cart
        $cart->items()->delete();

        return redirect()->route('user.home')->with('success', 'Order placed successfully!');
    }
}
