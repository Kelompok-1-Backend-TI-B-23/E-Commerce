<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;

class CheckoutController extends Controller
{
    protected $shippingRates = [
        'Aceh' => 25, 
        'Bali' => 15, 
        'Banten'=> 10, 
        'Bengkulu' => 20, 
        'DKI Jakarta' => 5, 
        'DI Yogyakarta' => 10, 
        'Gorontalo' => 25, 
        'Jambi' => 20, 
        'Jawa Barat' => 10,
        'Jawa Tengah' => 10, 
        'Jawa Timur' => 10, 
        'Kalimantan Barat' => 20, 
        'Kalimantan Selatan' => 20, 
        'Kalimantan Tengah' => 20,
        'Kalimantan Timur' => 20, 
        'Kalimantan Utara' => 20, 
        'Kepulauan Bangka Belitung' => 20, 
        'Kepulauan Riau' => 20,
        'Lampung' => 20, 
        'Maluku' => 20, 
        'Maluku Utara' => 20, 
        'Nusa Tenggara Barat' => 15, 
        'Nusa Tenggara Timur' => 15, 
        'Papua' => 30,
        'Papua Barat' => 30, 
        'Riau' => 20, 
        'Sulawesi Barat' => 25, 
        'Sulawesi Selatan' => 25, 
        'Sulawesi Tengah' => 25, 
        'Sulawesi Tenggara' => 25,
        'Sulawesi Utara' => 25, 
        'Sumatera Barat' => 25, 
        'Sumatera Selatan' => 25, 
        'Sumatera Utara' => 25
        // Add other provinces and their respective shipping rates
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
        $cart = Cart::with('items.product')->where('user_id', auth()->id())->where('status', 'active')->first();

        if (!$cart || $cart->items->isEmpty()) {
            return redirect()->route('user.cart')->with('error', 'Your cart is empty.');
        }

        $user = auth()->user();
        $shippingCost = $this->shippingRates[$user->address_province] ?? 0;
        $totalPrice = $cart->items->sum(function($item) {
            return $item->quantity * $item->price;
        }) + $shippingCost;
         // Process payment and create order
        // For simplicity, we assume the payment is successful (hrs ditambahin dr saldo)

        $order = Order::create([
            'user_id' => auth()->id(),
            'total_price' => $totalPrice,
            'status' => 'pending',
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
        $cart->update(['status' => 'completed']);

        return redirect()->route('user.checkout')->with('success', 'Order placed successfully!');
    }
}