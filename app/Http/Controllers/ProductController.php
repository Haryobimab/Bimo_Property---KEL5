<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Keranjang;


class ProductController extends Controller
{
    public function index()
    {
        return view('materials.belibahanbangunan');
    
    }

    public function show()
    {
        return view('materials.halaman2');
    }


    //Integrasi ke Keranjang
    public function count_cart(){


        $id_login = auth()->user()->id;
        $data = Keranjang::where('id_user', $id_login)->count();

        // Berikan respons dalam bentuk JSON yang berisi jumlah item dalam keranjang
        return response()->json(['itemCount' => $data]);

    }

    //untuk ke halaman detail
    public function show3()
    {
        return view('materials.DetailProduct.semen');
    }

    public function show4()
    {
        return view('materials.DetailProduct.Besibeton');
    }

    public function show5()
    {
        return view('materials.DetailProduct.WP');
    }

    public function show6()
    {
        return view('materials.DetailProduct.Cat');
    }

    public function show7()
    {
        return view('materials.DetailProduct.genteng');
    }

    public function show8()
    {
        return view('materials.DetailProduct.lantai');
    }

    public function show9()
    {
        return view('materials.DetailProduct.bajari');
    }

    public function show10()
    {
        return view('materials.DetailProduct.pipa');
    }
}
