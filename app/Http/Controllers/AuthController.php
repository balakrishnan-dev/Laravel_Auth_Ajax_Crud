<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
   public function index(){
    return view('auth.login');
   }

   public function login(Request $request){
        $request->validate([
            'email' => 'required|string',
            'password' => 'required'
        ]);
        if(Auth::attempt($request->only('email','password'))){
            return redirect()->route('dashboard')->with('login','Logged Successfully');
        }
        return redirect()->back()->with('error', 'Invalid Credentials');
   }

   public function register(Request $request){
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
            return redirect('/')->with('register','Registration Successfully');
        }

        public function showRegisterForm(){
            return view('auth.register');
        }
        public function dashboard(){
            return view('dashboard');
        }

        public function logout(Request $request){
            $user = Auth::user();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            $user->delete();
            return redirect('/')->with('logout','Logout Successfully');
        }
        
}
