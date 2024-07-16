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
    public function edit_lks(string $id)
    {
      $idDecode = base64_decode($id);

      $lks = LKS::find($idDecode);
      return view('admin.edit-lks', compact('lks'));
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
    public function update_lks(Request $request)
    {
      // Decode the ID
      $lks = LKS::find($request->id);

      // Validate the form data
      $validatedData = $request->validate([
        'foto_lks' => 'nullable|image|mimes:jpg,svg,raw|max:10048',
        'nama_lks' => 'required|string|max:255',
        'ketua_lks' => 'required|string|max:255',
        'alamat_lks' => 'required|string',
        'nomor_notaris' => 'required|string|max:255',
        'tanggal_akte_notaris' => 'required|date',
        'kontrak_awal' => 'required|date',
        'kontrak_akhir' => 'required|date',
        'kontak_pengurus' => 'required|string|max:255',
        'akreditasi_lks' => 'required|string|max:1',
        'jenis_lks' => 'required|string|in:LKS Kota,LKS Provinsi,LKS Nasional',
        'jenis_pelayanan' => 'required|string|in:Anak,Disabilitas,Lanjut Usia',
      ]);

      // Handle the file upload
      if ($request->hasFile('foto_lks')) {
        // Delete the old photo if it exists
        if ($lks->foto_lks) {
          // Delete the old file from the public directory
          $oldFilePath = public_path('img/lks/' . $lks->foto_lks);
          if (file_exists($oldFilePath)) {
            unlink($oldFilePath);
          }
        }

        // Store the new photo in the public directory
        $file = $request->file('foto_lks');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('img/lks/'), $filename);
        $validatedData['foto_lks'] = $filename;
      }

      // Update the profile with validated data
      $lks->update($validatedData);

      // Redirect with a success message
      return redirect()->route('management')->with('success', 'Profile updated successfully.');
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

  public function destroy_lks($id)
  {
    $lks = LKS::findOrFail(base64_decode($id));

    // Delete the file from the server
    if ($lks->foto_lks) {
      $filePath = public_path('img/lks' . $lks->foto_lks);
      if (file_exists($filePath)) {
        unlink($filePath);
      }
    }

    // Delete the report from the database
    $lks->delete();

    return redirect()->route('management')->with(['success' => 'LKS berhasil dihapus!']);
  }

}
