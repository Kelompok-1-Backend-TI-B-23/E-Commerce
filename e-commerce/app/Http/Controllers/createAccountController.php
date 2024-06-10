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

     public function index()
     {
        $provinces = $this->listprovinsi;
        return view('create_account', compact('provinces'));
     }

    //  public function createAccount(Request $request)
    //  {
    //      $request->validate([
    //          'username' => 'required|unique:users,username',
    //          'email' => 'required|email|unique:users,email',
    //          'phone_number' => 'required|digits_between:10,13|unique:users,phone_number',
    //          'password' => [
    //              'required',
    //              'confirmed',
    //              'min:8',
    //              'regex:/[A-Z]/',
    //              'regex:/[a-z]/',    
    //              'regex:/[0-9]/',   
    //              'regex:/[@$!%*?&#]/'
    //          ],
    //          'address_street' => 'required',
    //          'address_city' => 'required',
    //          'address_province' => 'required|in:' . implode(',', $this->listprovinsi),
    //          'address_postal_code' => 'required',
    //          'pin' => 'required|digits:6|confirmed',
    //      ], [
    //         'username.required' => 'Username is required',
    //         'username.unique' => 'Username already taken',
    //         'email.required' => 'Email is required',
    //         'email.email' => 'Invalid email format',
    //         'email.unique' => 'Email already taken',
    //         'phone_number.required' => 'Phone number is required',
    //         'phone_number.digits_between' => 'Phone number must be between 10 and 13 digits',
    //         'phone_number.unique' => 'Phone number already taken',
    //         'password.required' => 'Password is required',
    //         'password.confirmed' => 'Password confirmation does not match',
    //         'password.min' => 'Password must be at least 8 characters',
    //         'password.regex' => 'Password must contain at least one uppercase letter, one lowercase letter, one number, and one special character',
    //         'address_street.required' => 'Street is required',
    //         'address_city.required' => 'City is required',
    //         'address_province.required' => 'Provisnce is required',
    //         'address_province.in' => 'Invalid province',
    //         'address_postal_code.required' => 'Postal code is required',
    //         'pin.required' => 'Pin is required',
    //         'pin.digits' => 'Pin must be 6 digits',
    //         'pin.confirmed' => 'Pin confirmation does not match',
    //     ]);
 
    //     $user = User::createAccount($request->all());
 
    //      if ($user) {
    //         return redirect()->route('/home')->with('success', 'Proses registrasi berhasil');
    //     } else {
    //         return back()->withInput()->with('error', 'Proses registrasi gagal. Silakan coba lagi.');
    //     }
    //     }
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
