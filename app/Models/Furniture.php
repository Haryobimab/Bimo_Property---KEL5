<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Furniture extends Model
{
    protected $fillable = [
        'img', 'nama_furniture', 'harga', 'deskripsi'
    ];
    
    public static $rules = [
        'img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'nama_furniture' => 'required|string',
        'harga' => 'required|string',
        'deskripsi' => 'required|string',
    ];
}
