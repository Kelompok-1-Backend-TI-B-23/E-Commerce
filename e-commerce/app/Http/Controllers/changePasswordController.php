<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function index()
    {
        return view("changePassword");
    }

    public function changePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'currentPassword' => 'required',
            'password' => [
                'required',
                'string',
                'min:8',
                'regex:/[a-z]/', // must contain lowercase letter
                'regex:/[A-Z]/', // must contain uppercase letter
                'regex:/[0-9]/', // must contain number
                'regex:/[!@#$%^&*]/', // must contain symbol
                'confirmed'
            ],
            'password_confirmation' => [
                'required',
                'string',
                'min:8',
                'regex:/[a-z]/', // must contain lowercase letter
                'regex:/[A-Z]/', // must contain uppercase letter
                'regex:/[0-9]/', // must contain number
                'regex:/[!@#$%^&*]/' // must contain symbol
            ]
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = Auth::user();

        if (!$user) {
            return redirect()->route('indexLogin')->withErrors(['error' => 'You must be logged in to change your password']);
        }

        if (!Hash::check($request->currentPassword, $user->password)) {
            return back()->withErrors(['currentPassword' => 'Current password is incorrect']);
        }

        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('user.home')->with('success', 'Password changed successfully');
    }
}
