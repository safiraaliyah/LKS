<?php

namespace App\Http\Controllers;

use App\Models\LKS;
use App\Models\Profil;
use Illuminate\Http\Request;

class ManagementController extends Controller
{
    public function index()
    {
        $lks = LKS::all();
        return view('admin.management', compact('lks'));
    }
}
