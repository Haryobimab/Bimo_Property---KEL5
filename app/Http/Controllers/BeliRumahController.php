<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rumah;

class BeliRumahController extends Controller
{
    // Metode untuk menampilkan semua data dari model
    public function index()
    {
        $rumah = Rumah::all();

        $data = [
            'rumah' => $rumah
        ];
        // $belirukoExists = $belirukos->isNotEmpty(); // Check if any berita exists

       return view("belirumah", $data);
    }

    // Metode untuk menampilkan detail data
    public function show($id)
    {
        $rumah = Rumah::findOrFail($id);
        // return view();

        $data = [
            'rumah' => $rumah
        ];

        return view('materials.DetailProduct.rumah1', $data);
    }

    
    public function rumah()
    {
        \Log::info('Metode rumah dipanggil'); // Tambahkan logging di sini

        $data = [

            'house' => Rumah::orderBy('id', 'DESC')->get()
        ];
    
        return view('admin.belirumah1', $data);
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




