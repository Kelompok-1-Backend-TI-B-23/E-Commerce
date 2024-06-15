<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class homeController extends Controller
{
    public function index(Request $request)
    {
        // Mengambil semua produk dari database
        $products = Product::all();

        // Mendapatkan user yang sedang login
        $user = Auth::user();

        // Jika user ada, ambil saldo eWallet dari user
        $balance = $user -> balance;

        // Mengirimkan data produk dan saldo eWallet ke view 'home'
        return view('home', [
            'products' => $products,
            'balance' => $balance,
        ]);
    }
}
