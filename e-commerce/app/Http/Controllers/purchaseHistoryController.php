<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class purchaseHistoryController extends Controller
{
    public function index(){
        return view('purchaseHistory');
    }
}
