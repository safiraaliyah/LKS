<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LksController extends Controller
{
    // Menampilkan form login
    public function showLoginForm()
    {
        return view('admin.lks-login');
    }

    // Menangani login
    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            // Jika login berhasil
            return redirect()->intended('/loginLks'); // Sesuaikan dengan rute setelah login
        }

        // Jika login gagal
        return redirect()->back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ]);
    }
}
