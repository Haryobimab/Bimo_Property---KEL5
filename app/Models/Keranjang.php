<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Keranjang extends Model
{
    use HasFactory;

    protected $table = 'keranjang';

    protected $fillable = [
        'id',
        'nama_produk',
        'foto_produk',
        'tipe_produk',
        'deskripsi',
        'harga',
        'total_harga',

    ];

}
