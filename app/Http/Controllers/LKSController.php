<?php

namespace App\Http\Controllers;

use App\Models\LKS;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
      // Delete the old photo if exists
      if ($profile->foto_lks) {
        Storage::delete('public/img/lks/' . $profile->foto_lks);
      }

      // Store the new photo
      $file = $request->file('foto_lks');
      $filename = time() . '_' . $file->getClientOriginalName();
      $file->storeAs('public/img/lks', $filename);
      $validatedData['foto_lks'] = $filename;
    }

    // Update the profile with validated data
    $profile->update($validatedData);

    // Redirect with a success message
    return redirect()->route('profile')->with('success', 'Profile updated successfully.');
  }
}