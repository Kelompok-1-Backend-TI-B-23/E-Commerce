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
        $purchaseHistory = DB::table('purchase_history')->get();
        $transactionDetails = DB::table('transaction_details')->get();

        // Mengirim data ke view purchaseHistory
        return view('purchaseHistory', [
            'purchaseHistory' => $purchaseHistory,
            'transactionDetails' => $transactionDetails
        ]);
    }

}
