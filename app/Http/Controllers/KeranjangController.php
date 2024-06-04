<?php

namespace App\Http\Controllers;


use App\Models\Produk;
use App\Models\Keranjang;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;


class KeranjangController extends Controller
{
    
    public function show(Request $request)
    {
        $title = "Keranjang";
        $id_user = auth()->user()->id;

        // dd($id_user);

        $keranjang = Keranjang::where('id_user',$id_user)->get();
        $countKeranjang = $keranjang->count();
        $selectedItems = $request->input('selected_items', []);
        // Mengitung total amount
        $totalAmount = $keranjang->sum('barang.harga');
        // Menyimpan total amount ke dalam session
        session(['totalAmount' => $totalAmount]);
    
        return view('user.keranjang', compact('keranjang', 'title', 'countKeranjang',  'totalAmount'));
    }

    public function checkout()
    {
        $title = "Checkout";
        $keranjang = Keranjang::all();
        $subtotal = $keranjang->sum('barang.harga');
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

    public function add_cart($id){

        $data = [
            'id_barang' => $id,
            'id_user' => auth()->user()->id
        ];

        Keranjang::create($data);

        return response()->json(['message' => 'Item has been added to the cart.']);

    }

    

    
}
