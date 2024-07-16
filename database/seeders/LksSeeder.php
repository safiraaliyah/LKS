<?php

namespace Database\Seeders;

use App\Models\LKS;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      LKS::create([
      'id_user' => 3,
      'nama_lks' => 'Panti Wreda Hanna',
      'ketua_lks' => 'Yayasan Panti Wreda Hanna',
      'alamat_lks' => 'Surokarsan MG II/267, Yogyakarta.55151',
      'nomor_notaris' => 107,
      'tanggal_akte_notaris' => '1986-04-25',
      'kontrak_awal' => '2022-04-25',
      'kontrak_akhir' => '2025-04-25',
      'kontak_pengurus' => '081234567890',
      'akreditasi_lks' => 'A',
      'jenis_lks' => 'LKS Nasional',
      'jenis_pelayanan' => 'Lanjut Usia',
      'foto_lks' => 'hanna.jpg',
      'created_at' => now(),
      'updated_at' => now(),
      ]);

      LKS::create([
      'id_user' => 4,
      'nama_lks' => 'Panti Wreda Pandu',
      'ketua_lks' => 'Yayasan Panti Wreda Pandu',
      'alamat_lks' => 'JL. Ponggalaan, UH VII/203 Giwangan, Yogyakarta. 55163',
      'nomor_notaris' => 120,
      'tanggal_akte_notaris' => '1990-05-12',
      'kontrak_awal' => '2021-05-12',
      'kontrak_akhir' => '2024-05-12',
      'kontak_pengurus' => '081298765432',
      'akreditasi_lks' => 'B',
      'jenis_lks' => 'LKS Kota',
      'jenis_pelayanan' => 'Lanjut Usia',
      'foto_lks' => 'pandu.jpg',
      'created_at' => now(),
      'updated_at' => now(),
      ]);

      LKS::create([
      'id_user' => 5,
      'nama_lks' => 'Panti Wreda Mulya',
      'ketua_lks' => 'Yayasan Panti Wreda Mulya',
      'alamat_lks' => 'JL. Uril Sumoharjo No.20, Klitren, Kec. Gondokusuman, Yogyakarta. 55222',
      'nomor_notaris' => 130,
      'tanggal_akte_notaris' => '1995-03-18',
      'kontrak_awal' => '2021-05-12',
      'kontrak_akhir' => '2026-05-12',
      'kontak_pengurus' => '082134567891',
      'akreditasi_lks' => 'A',
      'jenis_lks' => 'LKS Provinsi',
      'jenis_pelayanan' => 'Lanjut Usia',
      'foto_lks' => 'mulya.jpg',
      'created_at' => now(),
      'updated_at' => now(),
      ]);
    }
}
