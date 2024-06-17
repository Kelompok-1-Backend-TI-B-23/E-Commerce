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
            'pin' => 'required|string|digits:6',
            'new_pin' => 'required|string|digits:6|confirmed',
            'new_pin_confirmation' => 'required|string|digits:6',
        ]);

        $user = Auth::user();

        // Check if the user is authenticated
        if (!$user) {
            return redirect('login')->withErrors(['error' => 'You must be logged in to change your PIN']);
        }

        if(!Hash::check($request->pin, $user->pin)) {
            return back()->withErrors(['pin' => 'Pin is incorrect']);
        }

        $user->pin = Hash::make($request->new_pin);
        $user->save();

        return redirect('home')->with('status', 'PIN has been updated successfully');
    }
}
