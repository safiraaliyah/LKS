<?php

namespace App\Http\Controllers;

use App\Models\LKS;
use App\Models\Profil;
use Illuminate\Http\Request;

class ManagementController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

      
        if ($search) {
            $lks = LKS::where('nama_lks', 'like', "%{$search}%")->get();
        } else {
            $lks = LKS::all();
        }

        return view('admin.management', compact('lks', 'search'));
    }
}
