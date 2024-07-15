<?php

namespace App\Http\Controllers;

use App\Models\LKS;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LKSController extends Controller
{
  public function show()
  {
    $profile = LKS::where('id_user', Auth::id())->first();
//    dd($profil);

    if ($profile == null) {

    } else {
      return view('profile', compact('profile'));
    }
  }
}