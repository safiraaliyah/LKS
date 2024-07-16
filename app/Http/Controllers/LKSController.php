<?php

namespace App\Http\Controllers;

use App\Models\LKS;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LKSController extends Controller
{
  public function show()
  {
    $profile = LKS::where('id_user', Auth::id())->first();

    if ($profile == null) {

    } else {
      return view('lks.profile', compact('profile'));
    }
  }

  public function edit()
  {
    $profile = LKS::where('id_user', Auth::id())->first();

    if ($profile == null) {

    } else {
      return view('lks.form-data', compact('profile'));
    }
  }

  public function update(Request $request)
  {
    $profile = LKS::where('id_user', Auth::id())->first();

    // Validate the form data
    $validatedData = $request->validate([
    'foto_lks' => 'nullable|image|mimes:jpg,svg,raw|max:10048',
    'nama_lks' => 'required|string|max:255',
    'ketua_lks' => 'required|string|max:255',
    'alamat_lks' => 'required|string',
    'nomor_notaris' => 'required|string|max:255',
    'tanggal_akte_notaris' => 'required|date',
    'nomor_daftar' => 'required|string|max:255',
    'tanggal_tanda_daftar' => 'required|date',
    'kontak_pengurus' => 'required|string|max:255',
    'akreditasi_lks' => 'required|string|max:1',
    'jenis_lks' => 'required|string|in:LKS Kota,LKS Provinsi,LKS Nasional',
    'jenis_pelayanan' => 'required|string|in:Anak,Disabilitas,Lanjut Usia',
    ]);

    // Handle the file upload
    if ($request->hasFile('foto_lks')) {
      // Delete the old photo if it exists
      if ($profile->foto_lks) {
        // Delete the old file from the public directory
        $oldFilePath = public_path('img/lks/' . $profile->foto_lks);
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
    $profile->update($validatedData);

    // Redirect with a success message
    return redirect()->route('profile')->with('success', 'Profile updated successfully.');
  }

  public function upload()
  {
    return view('lks.form-upload');
  }

  public function send(Request $request)
  {
    $profile = LKS::where('id_user', Auth::id())->first();

    // Validate the form data
    $validatedData = $request->validate([
    'periode' => 'required|string|in:Januari,Februari,Maret,April,Mei,Juni,Juli,Agustus,September,Oktober,November,Desember',
    'laporan' => 'mimes:docx,pdf,xlsx,docs|max:100048',
    ]);

    // Handle the file upload
    if ($request->hasFile('laporan')) {
      // Delete the old file if it exists
      if ($profile->laporan) {
        // Delete the old file from the public directory
        $oldFilePath = public_path('laporan/lks/' . $profile->laporan);
        if (file_exists($oldFilePath)) {
          unlink($oldFilePath);
        }
      }

      // Store the new photo in the public directory
      $file = $request->file('laporan');
      $filename = time() . '_' . $file->getClientOriginalName();
      $file->move(public_path('laporan/lks/'), $filename);
      $validatedData['laporan'] = $filename;
    }

    Report::create([
      'id_lks'  => $profile->id,
      'periode' => $request->periode,
      'laporan' => $validatedData['laporan'],
    ]);

    return redirect()->route('profile')->with(['success' => 'Data Berhasil Ditambahkan!']);
  }
}