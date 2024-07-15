<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.admin-login');
    }

//    public function login(Request $request)
//    {
//        $request->validate([
//            'username' => 'required|string',
//            'password' => 'required|string',
//        ]);
//
//        $credentials = $request->only('username', 'password');
//
//        if (Auth::attempt($credentials)) {
//            return redirect()->intended('/');
//        }
//
//        return back()->withErrors([
//            'username' => 'The provided credentials do not match our records.',
//        ]);
//    }
}
