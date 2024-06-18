<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class updateProfileController extends Controller
{

    protected $listprovinsi = [
        'Aceh', 'Bali', 'Banten', 'Bengkulu', 'DKI Jakarta', 'DI Yogyakarta', 'Gorontalo', 'Jambi', 'Jawa Barat',
        'Jawa Tengah', 'Jawa Timur', 'Kalimantan Barat', 'Kalimantan Selatan', 'Kalimantan Tengah',
        'Kalimantan Timur', 'Kalimantan Utara', 'Kepulauan Bangka Belitung', 'Kepulauan Riau',
        'Lampung', 'Maluku', 'Maluku Utara', 'Nusa Tenggara Barat', 'Nusa Tenggara Timur', 'Papua',
        'Papua Barat', 'Riau', 'Sulawesi Barat', 'Sulawesi Selatan', 'Sulawesi Tengah', 'Sulawesi Tenggara',
        'Sulawesi Utara', 'Sumatera Barat', 'Sumatera Selatan', 'Sumatera Utara'
    ];

    public function index(){
        $User = Auth::User();
        $provinces = $this->listprovinsi;
        return view("updateProfile", compact('User', 'provinces'));
    }

    public function update(Request $request){
        $User = Auth::User();

        $request->validate([
            'phoneNumber' => 'required|string|digits_between:10,13|unique:users,phone_number,' . $User->id,
            'province' => 'required|string',
            'city' => 'required|string|max:255',
            'detailStreet' => 'required|string|max:255',
            'postalCode' => 'required|string|max:10',
        ], [
            'phoneNumber.digits_between' => 'Phone number must be between 10 and 13 digits',
            'phoneNumber.unique' => 'Phone number already taken',
            'detailStreet.required' => 'Street is required',
            'city.required' => 'City is required',
            'province.required' => 'Province is required',
            'province.in' => 'Invalid province',
            'postalCode.required' => 'Postal code is required',
        ]);

        $User->phone_number = $request->phoneNumber;
        $User->address_province = $request->province;
        $User->address_city = $request->city;
        $User->address_street = $request->detailStreet;
        $User->address_postal_code = $request->postalCode;
        $User->save();

        return redirect()->route('user.profile')->with('success', 'Profile updated successfully.');
    }
}
