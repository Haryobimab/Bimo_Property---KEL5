<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Favorite extends Model
{
    use HasFactory;

    protected $table = 'favorites';

    protected $guarded = [];

    public function rumah(): BelongsTo
    {
        return $this->belongsTo(Rumah::class, 'id_rumah');
    }

}
