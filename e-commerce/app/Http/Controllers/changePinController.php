<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class changePinController extends Controller
{
    public function index(){
        return view("changePin");
    }
}
