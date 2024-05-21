<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Beliruko;
use App\Models\Rumah;

class RentalRumahController extends Controller
{
    // Metode untuk menampilkan semua data dari model
    public function index()
    {
        $rumah = Rumah::all();

        $data = [
            'rumah' => $rumah
        ];
        // $belirukoExists = $belirukos->isNotEmpty(); // Check if any berita exists

       return view("rental_rumah", $data);
    }

    // Metode untuk menampilkan detail data
    public function show($id)
    {
        $rumah = Rumah::findOrFail($id);
        // return view();

        $data = [
            'rumah' => $rumah
        ];

        return view('materials.DetailProduct.rumah', $data);
    }

}
