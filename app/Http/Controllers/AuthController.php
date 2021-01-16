<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function index(){
        if (Auth::user()) {
            Session::flash('success', 'Selamat anda berhasil login');
            return redirect()->route('AdminIndex');
        }
        return view('admin.login');
    }

    public function login(Request $request){
        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        Auth::attempt($data);
        if (Auth::check()) {
            Session::flash('success', 'Selamat anda berhasil login');
            return redirect()->route('AdminIndex');
        } else {
            Session::flash('error', 'Email/password salah');
            return redirect()->route('AdminLogin');
        }
    }

    public function logout()
    {
        Auth::logout();
        Session::flash('success', 'Anda telah Logout');
        return redirect()->route('AdminLogin');
    }
}
