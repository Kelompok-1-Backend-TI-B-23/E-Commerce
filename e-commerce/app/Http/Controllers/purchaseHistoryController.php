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
}
