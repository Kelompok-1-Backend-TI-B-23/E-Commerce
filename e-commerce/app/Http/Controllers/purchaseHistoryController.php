<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class purchaseHistoryController extends Controller
{
    public function index(){
        
        // Mengambil data riwayat transaksi berdasarkan user yang sedang login
        $user = Auth::user()->load('history.transaction');

        // Mengarahkan ke view 'purchaseHistory' dengan data riwayat transaksi yang dilakukan user
        return view('purchaseHistory', compact('user'));
    }
}
