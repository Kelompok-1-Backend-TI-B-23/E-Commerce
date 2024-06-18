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

    protected $listkota = [
        'Aceh' => ['Banda Aceh', 'Langsa', 'Lhokseumawe', 'Meulaboh', 'Sabang', 'Subulussalam'],
        'Bali' => ['Denpasar'],
        'Banten' => ['Cilegon', 'Serang', 'Tangerang Selatan', 'Tangerang'],
        'Bengkulu' => ['Bengkulu'],
        'DKI Jakarta' => ['Jakarta Barat', 'Jakarta Pusat', 'Jakarta Selatan', 'Jakarta Timur', 'Jakarta Utara', 'Kepulauan Seribu'],
        'DI Yogyakarta' => ['Yogyakarta'],
        'Gorontalo' => ['Gorontalo'],
        'Jambi' => ['Jambi', 'Sungai Penuh'],
        'Jawa Barat' => ['Bandung', 'Bekasi', 'Bogor', 'Cimahi', 'Cirebon', 'Depok', 'Sukabumi', 'Tasikmalaya', 'Banjar'],
        'Jawa Tengah' => ['Magelang', 'Pekalongan', 'Purwokerto', 'Salatiga', 'Semarang', 'Surakarta', 'Tegal'],
        'Jawa Timur' => ['Batu', 'Blitar', 'Kediri', 'Madiun', 'Malang', 'Mojokerto', 'Pasuruan', 'Probolinggo', 'Surabaya'],
        'Kalimantan Barat' => ['Pontianak', 'Singkawang'],
        'Kalimantan Selatan' => ['Banjarbaru', 'Banjarmasin'],
        'Kalimantan Tengah' => ['Palangka Raya'],
        'Kalimantan Timur' => ['Balikpapan', 'Bontang', 'Samarinda'],
        'Kalimantan Utara' => ['Tarakan'],
        'Kepulauan Bangka Belitung' => ['Pangkal Pinang'],
        'Kepulauan Riau' => ['Batam', 'Tanjung Pinang'],
        'Lampung' => ['Bandar Lampung', 'Metro'],
        'Maluku' => ['Ambon', 'Tual'],
        'Maluku Utara' => ['Ternate', 'Tidore Kepulauan'],
        'Nusa Tenggara Barat' => ['Bima', 'Mataram'],
        'Nusa Tenggara Timur' => ['Kupang'],
        'Papua' => ['Jayapura'],
        'Papua Barat' => ['Manokwari', 'Sorong'],
        'Riau' => ['Dumai', 'Pekanbaru'],
        'Sulawesi Barat' => ['Mamuju'],
        'Sulawesi Selatan' => ['Makassar', 'Palopo', 'Parepare'],
        'Sulawesi Tengah' => ['Palu'],
        'Sulawesi Tenggara' => ['Bau-Bau', 'Kendari'],
        'Sulawesi Utara' => ['Bitung', 'Kotamobagu', 'Manado', 'Tomohon'],
        'Sumatera Barat' => ['Bukittinggi', 'Padang', 'Padang Panjang', 'Pariaman', 'Payakumbuh', 'Sawahlunto', 'Solok'],
        'Sumatera Selatan' => ['Lubuklinggau', 'Pagar Alam', 'Palembang', 'Prabumulih'],
        'Sumatera Utara' => ['Binjai', 'Gunungsitoli', 'Medan', 'Padang Sidempuan', 'Pematang Siantar', 'Sibolga', 'Tanjung Balai', 'Tebing Tinggi']
    ];

    public function index(){
        $User = Auth::User();
        $provinces = $this->listprovinsi;
        $cities = $this->listkota;
        return view("updateProfile", compact('User', 'provinces', 'cities'));
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
