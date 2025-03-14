<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
// Show the registration form
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

// Handle registration form submission
    public function register(Request $request)
    {
        $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
    ]);

        User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    return redirect('/login')->with('success', 'Registration successful. Please login.');
}


// Show the login form
public function showLoginForm()
{
    return view('auth.login');
}

// Handle login form submission
public function login(Request $request)
{
    $credentials = $request->validate([
    'email' => 'required|string|email',
    'password' => 'required|string',
    ]);

        if (Auth::attempt($credentials)) {
        return redirect()->intended('/');
    }

        return redirect('/login')->with('error', 'Invalid credentials. Please try again.');
    }
}
