<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Beliruko;

class BelirukoController extends Controller
{
    // Metode untuk menampilkan semua data dari model
    public function index()
    {
        $belirukos = Beliruko::all();
        $belirukoExists = $belirukos->isNotEmpty(); // Check if any berita exists

       return view("beliruko", compact("belirukos", "belirukoExists"));
    }

    // Metode untuk menampilkan detail data
    public function show($id)
    {
        $belirukos = Beliruko::findOrFail($id);
        return view('beliruko', ['data' => $beliruko]);
    }

    // Metode untuk menampilkan halaman form untuk membuat data baru
    public function create()
    {
        return view('form_create');
    }

    // Metode untuk menyimpan data baru ke dalam database
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'Nama ruko' => 'required',
            'Gambar' => 'required',
            'Informasi' => 'required',
            // tambahkan aturan validasi lainnya di sini
        ]);

        // Simpan data ke dalam database
        Beliruko::create([
            'Nama ruko' => $request->input('field1'),
            'Gambar' => $request->input('field2'),
            'Informasi' => $request->input('field2'),
            // tambahkan field lainnya sesuai kebutuhan
        ]);

        return redirect()->route('route.index')->with('success', 'Data berhasil disimpan.');
    }

    // Metode untuk menampilkan halaman form untuk mengedit data
    public function edit($id)
    {
        $beliruko = Beliruko::findOrFail($id);
        return view('form_edit', ['data' => $beliruko]);
    }

    // Metode untuk menyimpan perubahan data yang telah diedit
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'Nama ruko' => 'required',
            'Gambar' => 'required',
            'Informasi' => 'required',
            // tambahkan aturan validasi lainnya di sini
        ]);

        // Perbarui data di dalam database
        $beliruko = Beliruko::findOrFail($id);
        $beliruko->update([
            'Nama ruko' => $request->input('field1'),
            'Gambar' => $request->input('field2'),
            'Informasi' => $request->input('field2'),
            // tambahkan field lainnya sesuai kebutuhan
        ]);

        return redirect()->route('route.index')->with('success', 'Data berhasil diperbarui.');
    }

    // Metode untuk menghapus data
    public function destroy($id)
    {
        $beliruko = Beliruko::findOrFail($id);
        $beliruk->delete();
        return redirect()->route('route.index')->with('success', 'Data berhasil dihapus.');
    }
}
