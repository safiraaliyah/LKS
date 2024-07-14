<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use Illuminate\Http\Request;

class HomeAdminController extends Controller
{
    public function index()
    {
        $profils = Profil::all();
        return view('admin.homeAdmin', compact('profils'));
    }
}
