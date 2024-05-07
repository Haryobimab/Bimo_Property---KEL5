<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\PesananDetail;
use App\Models\Produk;
use App\Models\Keranjang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class KeranjangController extends Controller
{
    protected $pesanan;
    protected $pesanan_details = [];

    public function show()
    {
        $title = "Keranjang";
        $keranjang = Keranjang::all();
        return view('user.keranjang', compact('keranjang', 'title'));
    }

    public function checkout()
    {
        $title = "Checkout";
        $keranjang = Keranjang::all();
        $total = Keranjang::sum('total_harga');
        return view('user.checkout', compact('keranjang', 'total', 'title'));
    }

    public function showDetails($id)
    {
        $title = "Detail Keranjang";
        $keranjang = Keranjang::findOrFail($id);
        return view('user.checkout', compact('keranjang', 'title'));
    }
    
    public function destroy($id)
    {
        $item = Keranjang::findOrFail($id);
        $item->delete();

        return redirect()->route('user.keranjang')->with('success', 'Item has been deleted from keranjang.');
    }
}
