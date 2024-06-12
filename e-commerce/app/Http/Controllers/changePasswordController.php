<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class changePasswordController extends Controller
{
    public function index()
    {
        return view('changePassword');
    }

    public function changePassword(Request $request)
    {
        // Validasi input
        $request->validate([
            'currentPassword' => 'required',
            'newPassword' => 'required|min:8|confirmed',
            'newPassword_confirmation' => 'required',
        ]);

        $user = Auth::user();

        // Check apakah password lama benar
        if (!Hash::check($request->currentPassword, $user->password)) {
            return back()->withErrors(['currentPassword' => 'Current password does not match']);
        }

        // Update password
        $user->password = Hash::make($request->newPassword);
        $user->save();

        return back()->with('success', 'Password changed successfully');
    }
}