<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index(){
        $reports = Report::with('lks')->get();
        return view('admin.history', compact('reports'));
    }
}
