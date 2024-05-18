<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rumah extends Model
{
    use HasFactory;
    
        // Nama tabel di dalam basis data
        protected $table = 'rumah';
    
        // Kolom-kolom yang dapat diisi (fillable)
        protected $guarded = [];  
    
}
