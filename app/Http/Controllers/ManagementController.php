<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use Illuminate\Http\Request;

class ManagementController extends Controller
{
    public function index()
    {
        $profils = Profil::all();
        return view('admin.management', compact('profils'));
    }
}
