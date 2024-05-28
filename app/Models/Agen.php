<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agen extends Model
{
    use HasFactory;

    protected $table = 'agen';

    protected $fillable = [
        'id',
        'nama_agen',
        'deskripsi_agen',
        'foto_agen',
        'alamat',
        'no_telp',
        'email',
        'rating',
        'property_sales',
        'customer_satisfaction',
        'property_transaction'
    ];
    
}
