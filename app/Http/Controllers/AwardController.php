<?php

namespace App\Http\Controllers;

use App\Models\Awards; // Perbaikan namespace model
use Illuminate\Http\Request;

class AwardController extends Controller
{
   // Menampilkan semua data penghargaan
  // Menampilkan semua data penghargaan
  public function indexUser()
  {
      $awards = Awards::all();
      $topAward = Awards::orderBy('rating', 'desc')->first(); // Ambil penghargaan dengan rating tertinggi
      return view('awarduser', compact('awards', 'topAward')); // Kirimkan variabel $topAward ke view
  }

  

  // Menampilkan halaman index untuk admin
  public function index()
  {
      $awards = Awards::all();
  
      // Mengambil penghargaan dengan rating tertinggi
      $topAward = $awards->sortByDesc('rating')->first();
  
      return view('admin.award', compact('awards', 'topAward'));
  }
   // Menampilkan form untuk membuat penghargaan baru
   public function create()
   {
       return view('admin.create');
   }

   // Menyimpan data penghargaan baru
   public function store(Request $request)
   {
       $request->validate([
           'nama_agen' => 'required',
           'lokasi' => 'required',
           'terjual' => 'required',
           'poin' => 'required',
           'rating' => 'required|string',
       ]);

       Awards::create($request->all());

       return redirect()->route('awards.index')
           ->with('success', 'Award created successfully.');
   }

   // Menampilkan detail penghargaan
   public function show($id)
   {
       $award = Awards::findOrFail($id);
       return view('admin.show', compact('award'));
   }

   // Menampilkan form edit untuk penghargaan
   public function edit($id)
   {
       $awards= Awards::findOrFail($id);
       return view('admin.award', ['editAward' => $awards]); // Perbaikan variabel menjadi $award
   }

   // Mengupdate data penghargaan
   public function update(Request $request, $id)
   {
       $request->validate([
           'nama_agen' => 'required',
           'lokasi' => 'required',
           'terjual' => 'required',
           'poin' => 'required',
           'rating' => 'required|string',
       ]);

       $awards = Awards::findOrFail($id);
       $awards->update($request->all());

       return redirect()->route('awards.index')
           ->with('success', 'Award updated successfully');
   }

   // Menghapus data penghargaan
   public function destroy($id)
   {
       $award = Awards::findOrFail($id);
       $award->delete();

       return redirect()->route('awards.index')
           ->with('success', 'Award deleted successfully');
   }
}