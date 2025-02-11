<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Show login form
    public function showLogin() {
        return view('auth.login');
    }
    public function index(){
        return view('dashboard');
    }
    // Show registration form
    public function showRegister() {
        return view('auth.register');
    }

    // Handle registration
    public function register(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success', 'User registered successfully. Please login.');
    }

    // Handle login
    public function login(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->route('dashboard')->with('success', 'Login successful');
        } else {
            return redirect()->route('login')->with('error', 'Invalid credentials');
        }
    }

    // Logout
    public function logout() {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Logged out successfully');
    }
}
