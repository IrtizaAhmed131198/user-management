<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\User;

class AuthController extends Controller
{
    // Show login form
    public function showLogin()
    {
        return view('login');
    }

    // Handle login
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        // Attempt to authenticate user
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            // Check user status before redirecting
            $user = Auth::user();

            return redirect()->intended('/');
        }

        return redirect()->route('login.show')->withErrors('Invalid credentials');
    }

    // Logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.show');
    }
}
