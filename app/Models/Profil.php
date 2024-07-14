<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Profil extends Model
{
    use HasFactory;
    protected $fillable = [
        'image',
        'nama',
        'ketua',
        'alamat',
        'nomor_notaris',
        'tanggal_notaris',
        'nomor_daftar',
        'tanggal_daftar',
        'kontak',
        'akreditasi',
        'jenis_lks',
        'jenis_pelayanan',
    ];

    protected $dates = [
        'tanggal_notaris',
        'tanggal_daftar',
    ];
}
