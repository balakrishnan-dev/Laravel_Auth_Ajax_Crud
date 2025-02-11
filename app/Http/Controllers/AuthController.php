<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index(){
        return view('/auth.login');
    }

    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required' 
        ]);
        if(Auth::attempt($request->only('email','password'))){
            return redirect('/')->route('/dashboard')->with(['message'=>'Login Succesfully']);
        }else{
            return redirect('/')->route('/login')->with(['message'=>'Credtional Error ']);

        }
    }
}