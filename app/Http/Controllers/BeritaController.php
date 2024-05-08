<?php

namespace App\Http\Controllers;

use App\Models\BeritaModel;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index() {
        $beritas = BeritaModel::all();
        $beritaExists = $beritas->isNotEmpty(); // Check if any berita exists
    
        return view("berita", compact("beritas", "beritaExists"));
    }    

    public function update(Request $request, $id) {
        $validated = $request->validate([
            'page' => 'required|max:255',
            'title' => 'required|max:255',
            'body' => 'required',
        ]);
    
        $berita = BeritaModel::findOrFail($id);
        $berita->update([
            "page" => $request->page,
            "title" => $request->title,
            "body" => $request->body
        ]);
    
        return back()->with("success", "Post has been updated");
    }

    public function destroy($id)
    {
        // Find the berita record by id
        $berita = BeritaModel::findOrFail($id);

        // Delete the berita record
        $berita->delete();

        // Redirect back with a success message
        return redirect()->back()->with("success", "Berita has been deleted successfully.");
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
        ]);
    
        BeritaModel::create([
            "page" => "Berita",
            'title' => $request->title,
            'body' => $request->body,
        ]);
    
        return redirect()->route('berita.index')->with('success', 'Created successfully.');
    }
}
