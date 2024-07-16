<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LKS extends Model
{
  use HasFactory;

  // Fillable fields
  protected $fillable = [
                          'id_user',
                          'nama_lks',
                          'ketua_lks',
                          'alamat_lks',
                          'nomor_notaris',
                          'tanggal_akte_notaris',
                          'nomor_daftar',
                          'tanggal_tanda_daftar',
                          'kontak_pengurus',
                          'akreditasi_lks',
                          'jenis_lks',
                          'jenis_pelayanan',
                          'foto_lks',
                        ];

  // Relationship to User model
  public function user()
  {
    return $this->belongsTo(User::class, 'id_user');
  }
}
