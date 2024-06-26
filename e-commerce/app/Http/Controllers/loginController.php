<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\FailedLoginAttempt;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'Enter a valid email',
            'email.email' => 'Enter a valid email',
            'password.required' => 'Enter your password',
        ]);

        $email = $request->email;
        $password = $request->password;
        $lockout_time = now()->subMinutes(30);

        $user = User::where('email', $email)->first();

        if ($user && Hash::check($password, $user->password)) {
            FailedLoginAttempt::where('email', $email)->delete();
            Auth::login($user);

            // Jika user yang login adalah dengan role admin, maka akan diarahkan ke admin dashboard
            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard');
            } else { // Jika bukan role admin, akan diarahkan ke user.home
                return redirect()->route('user.home');
            }
        } else {
            $failedAttempt = FailedLoginAttempt::where('email', $email)->first();

            if ($failedAttempt) {
                if ($failedAttempt->last_attempt_at <= $lockout_time) {
                    $failedAttempt->update(['attempt_count' => 0]);
                }
                $failedAttempt->update([
                    'attempt_count' => $failedAttempt->attempt_count + 1,
                    'last_attempt_at' => now(),
                ]);
            } else {
                FailedLoginAttempt::create([
                    'email' => $email,
                    'attempt_count' => 1,
                    'last_attempt_at' => now(),
                ]);
            }

            if ($failedAttempt && $failedAttempt->attempt_count >= 5 && $failedAttempt->last_attempt_at > $lockout_time) {
                return back()->withErrors(['email' => 'Too many login attempts. Please try again in 30 minutes']);
            }

            $remaining_attempts = 5 - ($failedAttempt ? $failedAttempt->attempt_count : 0);
            return back()->withErrors(['email' => "Wrong email or password. $remaining_attempts attempts remaining."]);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('Anda logout');
    }
}
