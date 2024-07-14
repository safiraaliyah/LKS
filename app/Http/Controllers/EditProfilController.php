<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profil;
use Illuminate\Support\Facades\Storage;

class EditProfilController extends Controller
{
    public function index($id)
    {
        $profil = Profil::findOrFail($id);
        return view('editprofil', compact('profil'));
    }

    public function update(Request $request, $id)
    {
        // Validasi data
        $request->validate([
            'nama' => 'required',
            'ketua' => 'required',
            'alamat' => 'required',
            'nomor_notaris' => 'required',
            'tanggal_notaris' => 'required|date',
            'nomor_daftar' => 'required',
            'tanggal_daftar' => 'required|date',
            'kontak' => 'required',
            'akreditasi' => 'required',
            'jenis_lks' => 'required',
            'jenis_pelayanan' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // Ubah validasi gambar sesuai kebutuhan
        ]);

        // Ambil data profil dari database
        $profil = Profil::findOrFail($id);
        
        // Update data profil dengan nilai dari form
        $profil->nama = $request->input('nama');
        $profil->ketua = $request->input('ketua');
        $profil->alamat = $request->input('alamat');
        $profil->nomor_notaris = $request->input('nomor_notaris');
        $profil->tanggal_notaris = $request->input('tanggal_notaris');
        $profil->nomor_daftar = $request->input('nomor_daftar');
        $profil->tanggal_daftar = $request->input('tanggal_daftar');
        $profil->kontak = $request->input('kontak');
        $profil->akreditasi = $request->input('akreditasi');
        $profil->jenis_lks = $request->input('jenis_lks');
        $profil->jenis_pelayanan = $request->input('jenis_pelayanan');

        // Cek jika ada file foto yang diunggah
        if ($request->hasFile('image')) {
            // Hapus foto lama jika ada
            if ($profil->image) {
                Storage::delete($profil->image);
            }

            $file = $request->file('image');
            $path = $file->store('public/foto_profil');
            $profil->image = $path;
        }

        // Simpan perubahan data profil ke database
        $profil->save();

        // Redirect ke halaman profil dengan pesan sukses
        return redirect('/profil/' . $profil->id)->with('success', 'Profil berhasil diperbarui');
    }
}
