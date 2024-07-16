<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
      'id_lks',
      'periode',
      'laporan'
    ];

  // Enable timestamps
  public $timestamps = true;

  public function lks()
  {
    return $this->belongsTo(LKS::class, 'id_lks');
  }
}
