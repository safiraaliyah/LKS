<?php

namespace App\Http\Controllers;

use App\Models\LKS;
use App\Models\Profil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {

        $profiles = LKS::all();
        return view('home', compact('profiles'));
    }
}
