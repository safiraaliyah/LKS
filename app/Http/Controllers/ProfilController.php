<?php

namespace App\Http\Controllers;

use App\Models\LKS;
use App\Models\Profil;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function show($nama_lks)
    {
      $decodedNamaLks = urldecode($nama_lks);

      $profile = LKS::where('nama_lks', $decodedNamaLks)->first();

      if ($profile) {
          return view('profile', compact('profile'));
      } else {
          return view('404');
      }
    }
}

