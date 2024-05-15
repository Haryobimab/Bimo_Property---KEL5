<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JualImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'jual_id',
        'path',
    ];

    /**
     * Get the jual that owns the JualImage.
     */
    public function jual()
    {
        return $this->belongsTo(Jual::class);
    }
}
