<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ulasan;

class UlasanController extends Controller
{
    public function index()
    {
        return view('ulasan.index');
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        Ulasan::create([
            'title' => $request->title,
            'body' => $request->body,
        ]);

        return redirect()->back()->with('success', 'Ulasan berhasil disimpan.');


    }

    public function create(){
        return view('Ulasan.ulasan');
    }
}
