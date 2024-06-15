<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PurchaseHistory;

class purchaseHistoryController extends Controller
{
    public function index(){
        // $purchaseHistory = PurchaseHistory::with('history.product')->where('user_id', auth()->id())->where('status', 'active')->first();
        // return view('purchaseHistory.index', compact('purchaseHistory'));

        $user = User::with('history.transaction.product');
        return view('purchaseHistory.index', compact('user'));
    }

}
