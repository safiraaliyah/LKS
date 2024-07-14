<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $profils = Profil::all();
        return view('home', compact('profils'));
    }
}
