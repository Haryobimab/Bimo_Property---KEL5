<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ulasan;

class UlasanController extends Controller
{
    public function create()
    {
      return view('Ulasan.ulasan');
    }
  
    public function store(Request $request)
    {
      $ulasan = $request->validate([
        'title' => 'required',
        'body' => 'required',
      ]);
      
  
      Ulasan::create($ulasan);

      return redirect()->route('ulasan.create')->with('success', 'Ulasan berhasil disimpan.');
    }
  
    public function index()
    {
      return view('Ulasan.daftar_ulasan_list', [
        'ulasans' => Ulasan::latest()->get(),
      ]);
    }
}
