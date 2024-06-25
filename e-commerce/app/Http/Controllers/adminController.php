<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\PurchaseHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class adminController extends Controller
{

    public function index(Request $request)
    {
        return view("adminDashboard");
    }

    public function indexProduct(Request $request)
    {
        $products = Product::orderBy('id', 'asc')->get();
        return view('adminProduct', compact('products'));
    }

    public function indexTransaction(Request $request)
    {
        // Mengambil semua data transaksi dari database
        $history = PurchaseHistory::all()->load('user', 'transaction');
 
        // Mengirimkan data produk dan saldo eWallet ke view 'home'
        return view('adminPurchase', compact('history'));
    }

}
