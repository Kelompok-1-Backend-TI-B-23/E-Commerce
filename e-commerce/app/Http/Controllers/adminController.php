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
        // Mengarahkan ke view 'adminDashboard' 
        return view("adminDashboard");
    }

    public function indexProduct(Request $request)
    {
        // Mengambil data produk dari database (diurutkan berdasarkan id produk, ascending)
        $products = Product::orderBy('id', 'asc')->get();

        // Mengarahkan ke view 'adminProduct' dengan data produk
        return view('adminProduct', compact('products'));
    }

    public function indexTransaction(Request $request)
    {
        // Mengambil semua data transaksi dan usernya dari database
        $history = PurchaseHistory::all()->load('user', 'transaction');
 
        // Mengirimkan data produk dan saldo eWallet ke view 'adminPurchase'
        return view('adminPurchase', compact('history'));
    }

}
