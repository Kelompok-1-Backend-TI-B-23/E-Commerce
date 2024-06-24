<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\PurchaseHistory;
use App\Models\TransactionDetails;

class purchaseHistoryController extends Controller
{
    public function index(){
        $user = Auth::user()->load('history.transaction');
        return view('purchaseHistory', compact('user'));
    }

    // hanya sementara untuk testing
    public function buy(){
        return view('buy');
    }

    public function store(Request $request){
        $user = Auth::user();

        $history = PurchaseHistory::create([
            'user_id' => $user->id,
            'transaction_date' => now(),
            'ship_fee' => $request->ship_fee,
            'total_price' => $request->total_price,
        ]);

        if ($history) {
            foreach ($request->input('products') as $productData) {
                $product = Product::findOrFail($productData['product_id']);
                $history->transaction()->attach($product, ['quantity' => $productData['quantity']]);
            }
            return redirect('/user/purchaseHistory');
        }
    }

}
