<?php

// app/Models/Jual.php

// app/Models/Jual.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jual extends Model
{
    use HasFactory;

    protected $fillable = ['nama_properti', 'deskripsi', 'lokasi', 'harga'];

    public function images()
    {
        return $this->hasMany(JualImage::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
