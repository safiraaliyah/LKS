<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthAdminController extends Controller
{
  public function show()
  {
    return view('admin.admin-login');
  }

  public function login(Request $request): RedirectResponse
  {
    $credentials = $request->validate([
      'username' => ['required'],
      'password' => ['required'],
    ]);

    // Fetch the user using Eloquent
    $user = User::where('username', $credentials['username'])->first();

    if ($user && $credentials['password'] == $user->password && $user->role == 'admin') {
      Auth::login($user);
      $request->session()->regenerate();

      return redirect()->intended('/');
    }

    return back()->withErrors([
      'role' => 'The provided credentials do not match our records.',
    ]);
  }

}
