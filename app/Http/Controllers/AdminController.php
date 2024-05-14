<?php

namespace App\Http\Controllers;

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

   public function agen(){
      return view('admin.addAgen');
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
public function ruko(){

      // dd('ok');

      $data = [
         'ruko' => Beliruko::orderBy('id','DESC')->get()
      ];

      return view('admin.ruko', $data);

   }

   public function add_ruko(Request $request)
    {
        

        // Menyimpan gambar
        $imageName = time().'.'.$request->img->extension();
        $request->img->move(public_path('images'), $imageName);

        // Menyimpan data ke database
        Beliruko::create([
            'img' => $imageName,
            'nama_ruko' => $request->nama_ruko,
            'harga' => $request->harga,
            'lokasi' => $request->lokasi,
            'jumlah_kamar' => $request->jumlah_kamar,
            'jumlah_kamar_mandi' => $request->jumlah_kamar_mandi,
            'jumlah_parkir' => $request->jumlah_parkir,
            'informasi' => $request->informasi,
        ]);

        return redirect()->back()->with('success', 'Data ruko berhasil ditambahkan.');
    }

    public function get_ruko_by_id($id)
    {
        $ruko = Beliruko::find($id);

        if (!$ruko) {
            return response()->json(['message' => 'Ruko not found'], 404);
        }

        return response()->json(['ruko' => $ruko], 200);
    }


    public function update_ruko(Request $request, $id)
    {

        // dd($request->logo_client);

        $client = Beliruko::find($id);

        $data = [
           'nama_ruko' => $request->nama_ruko,
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
        return redirect()->back()->with(['success' => 'Data ruko berhasil diubah!']);
    }

    public function destroy_ruko($id)
    {
        $data = Beliruko::find($id);

        if (file_exists(public_path('images/' . $data->img))) {
            unlink(public_path('images/' . $data->img));
        }

        $data->delete();
        return redirect()->back()->with(['success' => 'Data ruko berhasil dihapus!']);
    }
}

