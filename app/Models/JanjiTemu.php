<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JanjiTemu extends Model
{
    use HasFactory;

    protected $table = 'janji_temus';

    protected $fillable = [
        'nama', 'email', 'telepon', 'tanggal', 'jam', 'pesan', 'status', 'agen_id'
    ];

    public function agen()
    {
        return $this->belongsTo(Agen::class);
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
