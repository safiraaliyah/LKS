<?php

namespace App\Http\Controllers;

use App\Models\LKS;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit_laporan(string $id)
    {
      $idDecode = base64_decode($id);

      $report = Report::find($idDecode);
      return view('admin.edit-laporan', compact('report'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
  public function update_laporan(Request $request)
  {
    // Decode the ID
    $report = Report::find(base64_decode($request->id));

    // Validate the form data
    $validatedData = $request->validate([
      'periode' => 'required|string|in:Triwulan 1,Triwulan 2,Triwulan 3,Triwulan 4',
      'laporan' => 'mimes:docx,pdf,xlsx,docs|max:100048',
      'year' => 'required',
    ]);

    // Handle the file upload
    if ($request->hasFile('laporan')) {
      // Delete the old file if it exists
      if ($report->laporan) {
        $oldFilePath = public_path('laporan/lks' . $report->laporan);
        if (file_exists($oldFilePath)) {
          unlink($oldFilePath);
        }
      }

      // Store the new file
      $file = $request->file('laporan');
      $filename = time() . '_' . $file->getClientOriginalName();
      $file->move(public_path('laporan/lks'), $filename);
      $validatedData['laporan'] = $filename;
    } else {
      // Keep the existing file if no new file is uploaded
      unset($validatedData['laporan']);
    }

    // Update the report with the validated data
    $report->update($validatedData);

    return redirect()->route('history')->with(['success' => 'Laporan berhasil diperbarui!']);
  }

  /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

  public function destroy_laporan($id)
  {
    $report = Report::findOrFail(base64_decode($id));

    // Delete the file from the server
    if ($report->laporan) {
      $filePath = public_path('laporan/lks' . $report->laporan);
      if (file_exists($filePath)) {
        unlink($filePath);
      }
    }

    // Delete the report from the database
    $report->delete();

    return redirect()->route('history')->with(['success' => 'Laporan berhasil dihapus!']);
  }

}
