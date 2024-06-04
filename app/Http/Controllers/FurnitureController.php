<?php

namespace App\Http\Controllers;

use App\Models\Furniture;
use Illuminate\Http\Request;

class FurnitureController extends Controller
{
    public function indexUser()
    {
        $furnitures = Furniture::all();
        return view('furnitureuser', compact('furnitures'));
    }

    public function index()
    {
        $furnitures = Furniture::all();
        return view('admin.furniture', compact('furnitures'));
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_furniture' => 'required',
            'harga' => 'required|numeric',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'deskripsi' => 'required',
        ]);

        if ($request->hasFile('img')) {
            $imageName = time() . '.' . $request->file('img')->getClientOriginalExtension();
            $request->file('img')->move(public_path('images'), $imageName);
        } else {
            $imageName = null;
        }

        Furniture::create([
            'nama_furniture' => $request->nama_furniture,
            'harga' => $request->harga,
            'img' => $imageName,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('furnitures.index')
            ->with('success', 'Furniture created successfully.');
    }

    public function show($id)
    {
        $furniture = Furniture::findOrFail($id);
        return view('admin.show', compact('furniture'));
    }

    public function edit($id)
    {
        $furniture = Furniture::findOrFail($id);
        return view('admin.edit', compact('furniture'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_furniture' => 'required',
            'harga' => 'required|numeric',
            'img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'deskripsi' => 'required',
        ]);

        $furniture = Furniture::findOrFail($id);

        // Cek apakah ada file gambar baru yang diunggah
        if ($request->hasFile('img')) {
            // Hapus gambar lama jika ada
            if ($furniture->img && file_exists(public_path('images/' . $furniture->img))) {
                unlink(public_path('images/' . $furniture->img));
            }

            // Simpan gambar baru
            $imageName = time() . '.' . $request->file('img')->getClientOriginalExtension();
            $request->file('img')->move(public_path('images'), $imageName);
            $furniture->img = $imageName;
        }

        // Update data furniture
        $furniture->nama_furniture = $request->nama_furniture;
        $furniture->harga = $request->harga;
        $furniture->deskripsi = $request->deskripsi;
        $furniture->save();

        return redirect()->route('furnitures.index')
            ->with('success', 'Furniture updated successfully.');
    }


    public function destroy($id)
    {
        $furniture = Furniture::findOrFail($id);
        if ($furniture->img && file_exists(public_path('images/' . $furniture->img))) {
            unlink(public_path('images/' . $furniture->img));
        }
        $furniture->delete();

        return redirect()->route('furnitures.index')
            ->with('success', 'Furniture deleted successfully.');
    }
}
