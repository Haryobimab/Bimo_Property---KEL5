<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\PesananDetail;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class KeranjangController extends Controller
{
    protected $pesanan;
    protected $pesanan_details = [];

    public function show()
    {
        if(Auth::user()){
            $this->pesanan = Keranjang::where('id', Auth::user()->id)->where('status',0)->first();
            if($this->pesanan)
            {
                $this->pesanan_details = Keranjang::where('pesanan_id', $this->pesanan->id)->get();
            }
        }
        return view('user.keranjang', [
            'pesanan' => $this->pesanan,
            'pesanan_details'=> $this->pesanan_details
        ]);
    }
}
