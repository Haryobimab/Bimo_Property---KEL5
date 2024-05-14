<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FAQ extends Model
{
    use HasFactory;

    protected $table = 'faqs'; // Assuming your table name is 'faqs'

    protected $fillable = [
        'question',
        'answer',
        // Add other fillable columns here if any
    ];

    // You can define relationships or custom methods here if needed
}
