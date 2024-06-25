<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class purchaseHistoryController extends Controller
{
    public function index(){
        $user = Auth::user()->load('history.transaction');
        return view('purchaseHistory', compact('user'));
    }
}
