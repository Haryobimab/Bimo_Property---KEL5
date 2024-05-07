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

    public function show()
    {
        $title = "Keranjang";
        $keranjang = Keranjang::all();
        $countKeranjang = $keranjang->count();
        $totalCart = Keranjang::sum('total_harga');
        return view('user.keranjang', compact('keranjang', 'title', 'countKeranjang', 'totalCart'));
    }

    public function checkout()
    {
        $title = "Checkout";
        $keranjang = Keranjang::all();
        $subtotal = $keranjang->sum('harga');
        $tax = $subtotal * 0.1;
        $total = $subtotal + $tax;
        return view('user.checkout', compact('keranjang', 'total', 'title',  'subtotal', 'tax'));
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
