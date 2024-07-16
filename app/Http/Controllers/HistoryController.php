<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('search');
        
        if ($query) {
            $reports = Report::whereHas('lks', function($q) use ($query) {
                $q->where('nama_lks', 'like', '%' . $query . '%');
            })->get();
        } else {
            $reports = Report::with('lks')->get();
        }

        return view('admin.history', compact('reports', 'query'));
    }
}
