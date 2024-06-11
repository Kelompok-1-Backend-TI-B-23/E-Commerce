<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class purchaseHistoryController extends Controller
{
    public function index(){
        return view('purchaseHistory');
    }

    public function purchaseHistory(){
        // Mengambil data dari tabel purchase_histories
        $purchaseHistories = DB::table('purchase_history')->get();

        // Mengirim data ke view purchaseHistory
        return view('purchaseHistory', ['purchaseHistories' => $purchaseHistories]);
    }

}
