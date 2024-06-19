<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class productdetailController extends Controller
{
    public function index()
    {
        // Your code for the product detail page goes here
        return view('productdetail'); // Assuming you have a view named 'product-detail'
    }
}