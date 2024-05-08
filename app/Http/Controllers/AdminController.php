<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
use App\Models\Agen;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function show(){
        return view('admin.dashboard');
     }
    
     public function index(){
      $countFurniture = $this->countFurnitureProducts();
      $countBahanBangunan = $this->countBahanBangunanProducts();
      return view('admin.dashboard', compact('countFurniture', 'countBahanBangunan'));
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

   public function addAgen(Request $request)
   {
      $agen = new Agen;
      $agen->nama_agen = $request->input('nama_agen');
      $agen->deskripsi_agen = $request->input('deskripsi_agen');
      $agen->alamat = $request->input('alamat');
      $agen->no_telp = $request->input('no_telp');
      $agen->email = $request->input('email');
      $agen->rating = $request->input('rating');
      $agen->save();

      return redirect()->back()->with('success', 'Agen added successfully');
   }
}
