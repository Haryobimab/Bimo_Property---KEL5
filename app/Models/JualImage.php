<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JualImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'jual_id',
        'image_path',
    ];

    public function jual()
    {
        return $this->belongsTo(Jual::class);
    }
}
