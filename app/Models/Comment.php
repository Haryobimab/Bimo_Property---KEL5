<?php

// app/Models/Comment.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['jual_id', 'user_id', 'comment'];

    public function jual()
    {
        return $this->belongsTo(Jual::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
