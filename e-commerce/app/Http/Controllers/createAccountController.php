<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class createAccountController extends Controller
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

     public function index()
     {
        $provinces = $this->listprovinsi;
        $cities = $this->listkota;
        return view('createAccount', compact('provinces', 'cities'));
     }

    public function createAccount(Request $request)
    {
            $validator = Validator::make($request->all(), [
                'username' => 'required|string|max:255|unique:users',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => [
                    'required',
                    'string',
                    'min:8',
                    'regex:/[a-z]/', // harus ada huruf kecil
                    'regex:/[A-Z]/', // harus ada huruf besar
                    'regex:/[0-9]/', // harus ada angka
                    'regex:/[!@#$%^&*]/', // harus ada simbol
                    'confirmed'
                ],
                'pin' => 'required|string|digits:6|confirmed',
                'phone_number' => 'required|string|max:15|unique:users',
                'address_street' => 'required|string|max:255',
                'address_city' => 'required|string|max:255',
                'address_province' => 'required|string|max:255',
                'address_postal_code' => 'required|string|max:10',
            ], [
                'username.required' => 'Username is required',
                'username.unique' => 'Username already taken',
                'email.required' => 'Email is required',
                'email.email' => 'Invalid email format',
                'email.unique' => 'Email already taken',
                'phone_number.required' => 'Phone number is required',
                'phone_number.digits_between' => 'Phone number must be between 10 and 13 digits',
                'phone_number.unique' => 'Phone number already taken',
                'password.required' => 'Password is required',
                'password.confirmed' => 'Password confirmation does not match',
                'password.min' => 'Password must be at least 8 characters',
                'password.regex' => 'Password must contain at least one uppercase letter, one lowercase letter, one number, and one special character',
                'address_street.required' => 'Street is required',
                'address_city.required' => 'City is required',
                'address_province.required' => 'Province is required',
                'address_province.in' => 'Invalid province',
                'address_postal_code.required' => 'Postal code is required',
                'pin.required' => 'Pin is required',
                'pin.digits' => 'Pin must be 6 digits',
                'pin.confirmed' => 'Pin confirmation does not match',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $user = User::create([
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'phone_number' => $request->phone_number,
                'address_street' => $request->address_street,
                'address_city' => $request->address_city,
                'address_province' => $request->address_province,
                'address_postal_code' => $request->address_postal_code,
                'pin' => Hash::make($request->pin),
                'balance' => 0.00, // Default balance
            ]);

            if ($user) {
                return redirect('login');
            }

            return back()->with('error', 'User creation failed. Please try again.');
        }
}
