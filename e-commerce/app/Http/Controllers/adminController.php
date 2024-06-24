<?php

namespace App\Http\Controllers;

use App\Models\Product;
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
        // Mengambil semua produk dari database
        $products = Product::all();


        // Mengirimkan data produk dan saldo eWallet ke view 'home'
        return view('adminProduct', compact('products'));
    }

}
