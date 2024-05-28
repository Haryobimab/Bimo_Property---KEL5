<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
use App\Models\Agen;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function show(){
      $agen = Agen::all();
      $countFurniture = $this->countFurnitureProducts();
      $countBahanBangunan = $this->countBahanBangunanProducts();
      return view('admin.dashboard', compact('countFurniture', 'countBahanBangunan', 'agen'));
     }
    
     public function index(){
      $agen = Agen::all();
      $countFurniture = $this->countFurnitureProducts();
      $countBahanBangunan = $this->countBahanBangunanProducts();
      return view('admin.dashboard', compact('countFurniture', 'countBahanBangunan', 'agen'));
      return view('admin.dashboard',);
     }
    
     public function profile (){
        return view('admin.profileAdmin');
     }

   public function countFurnitureProducts()
   {
      $count = Keranjang::where('tipe_produk', 'Furniture')->count();
      return $count;
   }

   public function countBahanBangunanProducts()
   {
      $count = Keranjang::where('tipe_produk', 'Bahan Bangunan')->count();
      return $count;
   }

   
   public function addAgen(){
      return view('admin.addAgen');
   }

   public function storeAgen(Request $request)
    {
        $request->validate([
            'nama_agen' => 'required|string|max:255',
            'deskripsi_agen' => 'required|string',
            'foto_agen' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'alamat' => 'required|string|max:255',
            'no_telp' => 'required|string|max:15',
            'email' => 'required|email|max:255',
            'rating' => 'required|numeric|min:0|max:5',  
        ]);

        $imageName = time().'.'.$request->foto_agen->extension();
        $request->foto_agen->move(public_path('IMG/Agen'), $imageName);

        Agen::create([
            'nama_agen' => $request->nama_agen,
            'deskripsi_agen' => $request->deskripsi_agen,
            'foto_agen' => $imageName,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'email' => $request->email,
            'rating' => $request->rating,
        ]);

        return redirect()->route('admin.addAgen')->with('success', 'Agen berhasil ditambahkan!');
    }
}
