<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
use App\Models\Agen;
use App\Models\Rumah;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function show(){
    //   $agen = Agen::all();
      $countFurniture = $this->countFurnitureProducts();
      $countBahanBangunan = $this->countBahanBangunanProducts();
      return view('admin.dashboard', compact('countFurniture', 'countBahanBangunan', ));
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

     public function addAgen(){
        return view('admin.addAgen');
     }
  

   public function countFurnitureProducts()
   {
      //$count = Keranjang::where('tipe_produk', 'Furniture')->count();
      //return $count;
   }

   public function countBahanBangunanProducts()
   {
      //$count = Keranjang::where('tipe_produk', 'Bahan Bangunan')->count();
      //return $count;
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

    public function rumah(){

        // dd('ok');
  
        $data = [
           'house' => Rumah::orderBy('id','DESC')->get() //SELECT * FROM RUMAH ORDER BY ID DESC
        ];
  
        return view('admin.rumah', $data);
  
     }
  
     public function add_rumah(Request $request)
     {
         
  
         // Menyimpan gambar
         $imageName = time().'.'.$request->img->extension();
         $request->img->move(public_path('images'), $imageName);
  
         // Menyimpan data ke database
         Rumah::create([
             'img' => $imageName,
             'nama_rumah' => $request->nama_rumah,
             'harga' => $request->harga,
             'lokasi' => $request->lokasi,
             'jumlah_kamar' => $request->jumlah_kamar,
             'jumlah_kamar_mandi' => $request->jumlah_kamar_mandi,
             'jumlah_parkir' => $request->jumlah_parkir,
             'informasi' => $request->informasi,
         ]);
  
         return redirect()->back()->with('success', 'Data rumah berhasil ditambahkan.');
     }
  
     public function get_rumah_by_id($id)
      {
          $rumah = Rumah::find($id);
  
          if (!$rumah) {
              return response()->json(['message' => 'Rumah not found'], 404);
          }
  
          return response()->json(['rumah' => $rumah], 200);
      }
  
      public function update_rumah(Request $request, $id)
      {
  
          // dd($request->logo_client);
  
          $client = Rumah::find($id);
  
          $data = [
             'nama_rumah' => $request->nama_rumah,
             'harga' => $request->harga,
             'lokasi' => $request->lokasi,
             'jumlah_kamar' => $request->jumlah_kamar,
             'jumlah_kamar_mandi' => $request->jumlah_kamar_mandi,
             'jumlah_parkir' => $request->jumlah_parkir,
             'informasi' => $request->informasi,
          ];
  
          if ($request->hasFile('img')) {
  
              $file = $request->file('img');
              $fileName = $file->getClientOriginalName();
  
              // dd($fileName);
  
              if (file_exists(public_path('images/' . $request->img))) {
                  unlink(public_path('images/' . $request->img));
              }
  
              $imageName = time() . '.' . $request->img->extension();
              $request->img->move(public_path('images'), $imageName);
              $data['img'] = $imageName;
          } else {
              $data['img'] = $request->old_img;
          }
  
  
          $client->update($data);
          return redirect()->back()->with(['success' => 'Data rumah berhasil diubah!']);
      }
  
      public function destroy_rumah($id)
      {
          $data = Rumah::find($id);// SELECT * FROM RUMAH WHERE ID = 2 
  
          if (file_exists(public_path('images/' . $data->img))) {
              unlink(public_path('images/' . $data->img));
          }
  
          $data->delete();
          return redirect()->back()->with(['success' => 'Data rumah berhasil dihapus!']);
      }
}
