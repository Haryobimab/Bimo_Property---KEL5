<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beliruko extends Model
{
    use HasFactory;
    
        // Nama tabel di dalam basis data
        protected $table = 'beliruko';
    
        // Kolom-kolom yang dapat diisi (fillable)
        protected $fillable = [
            'Nama rumah', 
            'gambar', 
            'informasi'
        ];
    
        // Kolom-kolom yang harus disembunyikan (hidden) saat di-serialisasi
        protected $hidden = ['password', 'remember_token'];
    
        // Metode untuk mendapatkan data terkait
        public function relatedModel()
        {
            return $this->hasOne('App\Models\RelatedModel');
        }
    
        // Metode untuk mendapatkan data terkait dengan hubungan banyak-ke-banyak
        public function relatedModels()
        {
            return $this->belongsToMany('App\Models\RelatedModel', 'pivot_table_name', 'nama_model_id', 'related_model_id');
        }
    
      
    
}
