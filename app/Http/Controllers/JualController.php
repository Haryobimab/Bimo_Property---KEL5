<?php
// app/Http/Controllers/JualController.php

namespace App\Http\Controllers;

use App\Models\Jual;
use App\Models\JualImage;
use Illuminate\Http\Request;

class JualController extends Controller
{
    public function index()
    {
        $juals = Jual::all();
        return view('jual.index', compact('juals'));
    }

    public function create()
    {
        return view('jual.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_properti' => 'required',
            'deskripsi' => 'required',
            'lokasi' => 'required',
            'harga' => 'required|numeric',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $jual = Jual::create($request->all());

        if($request->hasFile('images')) {
            foreach($request->file('images') as $image) {
                $path = $image->store('public/images');
                JualImage::create([
                    'jual_id' => $jual->id,
                    'image_path' => $path
                ]);
            }
        }

        return redirect()->route('jual.index')->with('success', 'Properti berhasil ditambahkan');
    }

    public function edit(Jual $jual)
    {
        return view('jual.edit', compact('jual'));
    }

    public function update(Request $request, Jual $jual)
    {
        $request->validate([
            'nama_properti' => 'required',
            'deskripsi' => 'required',
            'lokasi' => 'required',
            'harga' => 'required|numeric',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $jual->update($request->all());

        if($request->hasFile('images')) {
            foreach($request->file('images') as $image) {
                $path = $image->store('public/images');
                JualImage::create([
                    'jual_id' => $jual->id,
                    'image_path' => $path
                ]);
            }
        }

        return redirect()->route('jual.index')->with('success', 'Properti berhasil diperbarui');
    }

    public function destroy(Jual $jual)
    {
        $jual->delete();
        return redirect()->route('jual.index')->with('success', 'Properti berhasil dihapus');
    }
}
