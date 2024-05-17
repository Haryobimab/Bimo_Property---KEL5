<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Beliruko;

class BelirukoController extends Controller
{
    // Metode untuk menampilkan semua data dari model
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
