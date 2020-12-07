<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function dashboard(){
        if(Auth::check()){
            return view('admin.dashboard');
        }

        return redirect()->route('admin.show-form');
    }

    public function showForm(){
        return view('admin.form-login');
    }

    public function authenticate(Request $request){
        $credentials = [
            'email' =>  $request['email'],
            'password' => $request['password']
        ];

        if(Auth::attempt($credentials)){
            return redirect()->route('admin.dashboard');
        }

        return redirect()->back()->withInput()->withErrors(['Os dados informados não conferem.']);
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('admin.show-form');
    }
}
