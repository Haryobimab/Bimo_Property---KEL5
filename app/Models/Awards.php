<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Awards extends Model
{
   // Nama tabel di dalam basis data
   protected $fillable = [
      'nama_agen', 'lokasi','terjual','poin', 'rating'
  ];
  
  public static $rules = [
      'nama_agen' => 'required',
      'lokasi' => 'required|varchar', // Pastikan validasi ini memeriksa tipe string
      'terjual' => 'required|varchar',
      'poin' => 'required|varchar',
      'rating' => 'required|string',
  ];

}
