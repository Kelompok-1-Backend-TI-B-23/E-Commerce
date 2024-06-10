<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class changePinController extends Controller
{
    public function index(){
        return view("changePin");
    }

    public function changePin(Request $request)
    {
        $request->validate([
            'pin' => 'required|string|digits:6|confirmed',
            'new_pin' => 'required|string|digits:6|confirmed',
            'new_pin_confirm' => 'required|string|digits:6|confirmed'
        ]);

        $user = Auth::user();

        if(!Hash::check($request->pin, $user->pin)) {
            return back()->withErrors(['pin' => 'Pin is incorrect']);
        }

        $user->pin = Hash::make($request->new_pin);
        $user->save();

        return redirect('home')->with('status', 'PIN has been updated successfully');
    }
}
