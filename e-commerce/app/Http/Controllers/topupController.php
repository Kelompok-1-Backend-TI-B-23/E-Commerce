<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class topupController extends Controller
{
    public function index(){
        $user = Auth::user();
        return view('topup', compact('user'));
    }

    public function topUp(Request $request){
        $request->validate([
            'amount' => 'required|numeric|max:2000000',
            'pin' => 'required'
        ]);

        $user = Auth::user();

        if(Hash::check($request->pin, $user->pin)) {
            $user->balance += $request->amount;
            $user->save();

            return back()->with('success', 'Successfully top-up');
        } else {
            return back()->with('error', "PIN Salah");
        }
    }
}
