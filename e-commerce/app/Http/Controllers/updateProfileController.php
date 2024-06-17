<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class updateProfileController extends Controller
{
    public function index(){
        $User = Auth::User();
        return view("updateProfile", compact('User'));
    }

    public function update(Request $request){
        $User = Auth::User();

        $request->validate([
            'phoneNumber' => 'required|string|max:15|unique:Users,phone_number,' . $User->id,
            'province' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'detailStreet' => 'required|string|max:255',
            'postalCode' => 'required|string|max:10',
        ]);

        $User->phone_number = $request->phoneNumber;
        $User->address_province = $request->province;
        $User->address_city = $request->city;
        $User->address_street = $request->detailStreet;
        $User->address_postal_code = $request->postalCode;
        $User->save();

        return redirect()->route('User.profile')->with('success', 'Profile updated successfully.');
    }
}
