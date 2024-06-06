<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jual extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'deskripsi',
        'lokasi',
        'harga',
        'kamar_tidur',
        'kamar_mandi',
        'garasi',
    ];

    public function images()
    {
        return $this->hasMany(JualImage::class);
    }
}
