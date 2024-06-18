<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class changePasswordController extends Controller
{
    public function index(){
        return view("changePassword");
    }

    public function changePassword(Request $request){
        $request->validate([
            'currentPassword' => 'required',
            'newPassword' => 'required|min:6|confirmed',
        ]);

        $user = Auth::user();

        if (!$user) {
            return redirect('login')->withErrors(['error' => 'You must be logged in to change your password']);
        }

        if (!Hash::check($request->currentPassword, $user->password)) {
            return back()->withErrors(['currentPassword' => 'Current password is incorrect']);
        }

        $user->password = Hash::make($request->newPassword);
        $user->save();

        return redirect('home')->with('status', 'Password changed successfully');
    }
}