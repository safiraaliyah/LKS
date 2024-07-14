<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function show($id)
    {
        $profil = Profil::find($id);
        if ($profil) {
            return view('profil', compact('profil'));
        } else {
            return redirect('/')->with('error', 'Profil tidak ditemukan');
        }
    }
}

