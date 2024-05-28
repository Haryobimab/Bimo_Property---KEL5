<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jual;
use App\Models\JualImage;

class JualController extends Controller
{
    public function create()
    {
        return view('jual.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'lokasi' => 'required|string',
            'harga' => 'required|integer',
            'kamar_tidur' => 'required|integer',
            'kamar_mandi' => 'required|integer',
            'garasi' => 'required|integer',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $jual = Jual::create($data);

        if ($request->hasfile('images')) {
            foreach ($request->file('images') as $file) {
                $name = time() . rand(1, 100) . '.' . $file->extension();
                $file->move(public_path('images'), $name);
                JualImage::create([
                    'jual_id' => $jual->id,
                    'image_path' => $name,
                ]);
            }
        }

        return redirect()->route('jual.index')->with('success', 'Properti berhasil ditambahkan.');
    }

    public function index()
    {
        $juals = Jual::with('images')->get();
        return view('jual.index', compact('juals'));
    }

    public function show($id)
    {
        $jual = Jual::with('images')->findOrFail($id);
        return view('jual.show', compact('jual'));
    }

    public function edit($id)
    {
        $jual = Jual::with('images')->findOrFail($id);
        return view('jual.edit', compact('jual'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'lokasi' => 'required|string',
            'harga' => 'required|integer',
            'kamar_tidur' => 'required|integer',
            'kamar_mandi' => 'required|integer',
            'garasi' => 'required|integer',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $jual = Jual::findOrFail($id);
        $jual->update($data);

        if ($request->hasfile('images')) {
            // Hapus gambar lama
            foreach ($jual->images as $image) {
                if (file_exists(public_path('images/' . $image->image_path))) {
                    unlink(public_path('images/' . $image->image_path));
                }
                $image->delete();
            }

            // Simpan gambar baru
            foreach ($request->file('images') as $file) {
                $name = time() . rand(1, 100) . '.' . $file->extension();
                $file->move(public_path('images'), $name);
                JualImage::create([
                    'jual_id' => $jual->id,
                    'image_path' => $name,
                ]);
            }
        }

        return redirect()->route('jual.index')->with('success', 'Properti berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $jual = Jual::findOrFail($id);
        $jual->images()->each(function($image) {
            unlink(public_path('images/' . $image->image_path));
            $image->delete();
        });
        $jual->delete();

        return redirect()->route('jual.index')->with('success', 'Properti berhasil dihapus.');
    }
}
