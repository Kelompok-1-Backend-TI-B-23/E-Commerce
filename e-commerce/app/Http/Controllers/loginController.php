<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use App\Models\User; 

class loginController extends Controller
{
    public function index(){
        return view("login");
    }

    function login (Request $request) {
        $request -> validate([
            'email' => 'required',
            'password' => 'required'
        ], [
            'email.required' => 'Enter a valid email',
            'password.required' => 'Enter your password',
        ]);

        $email = $request -> email;
        $attempts_key = 'login_attempts_' . $email;
        $lockout_time = 30; //minutes

        if (Cache::has($attempts_key) && Cache::get(attempts_key) >= 5) {
            return back() -> withErrors(['email' => 'Too many login attempts. Please try again in ' . $lockout_time . ' minutes']);
        }

        $user = User::where('email', $email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);

            // clear login attempts on successful login
            Cache::forget($attempts_key);

            // insert user login info in session
            $request->session()->regenerate();
            $request->session()->put('user', $user);

            return redirect()->intended('home');
        } else {
            Cache::increment($attempts_key);

            if (Cache::get($attempts_key) == 1){
                Cache::put($attempts_key, 1, $lockout_time * 60);
            }

            $remaining_attempts = 5 - Cache::get($attempts_key);
            return back()->withErrors(['email' => "Wrong email or password. $remaining_attempts attempts remianing."]);
        }
        
    }
}
