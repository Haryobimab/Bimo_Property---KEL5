<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JualController extends Controller
{
    // Menampilkan Jual
    public function index()
    {
        return view('jual');
    }
}
