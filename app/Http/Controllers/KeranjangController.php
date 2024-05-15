<?php

namespace App\Http\Controllers;


use App\Models\Produk;
use App\Models\Keranjang;
use App\Models\Order;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;


class KeranjangController extends Controller
{
    
    public function show(Request $request)
    {
        $title = "Keranjang";
        $keranjang = Keranjang::all();
        $countKeranjang = $keranjang->count();
        $selectedItems = $request->input('selected_items', []);
        // Mengitung total amount berdasarkan item yang dicentang
        $totalAmount = Keranjang::whereIn('id', $selectedItems)->sum('harga');
        // Menyimpan total amount ke dalam session
        session(['totalAmount' => $totalAmount]);
    
        return view('user.keranjang', compact('keranjang', 'title', 'countKeranjang',  'totalAmount'));
    }

    public function checkout()
    {
        $title = "Checkout";
        $keranjang = Keranjang::all();
        $subtotal = $keranjang->sum('total_harga');
        $tax = $subtotal * 0.1;
        $total = $subtotal + $tax;
        $selectedItems =session('selectedItems', []);
        return view('user.checkout', compact('keranjang', 'total', 'title',  'subtotal', 'tax', 'selectedItems'));
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

    public function processCheckout(Request $request)
    {
        $selectedItems = $request->input('selected_items', []);
        // Simpan daftar item yang dicentang ke dalam session atau dalam suatu tempat yang dapat diakses di view checkout
        session(['selectedItems' => $selectedItems]);

        // Tangkap data dari formulir checkout
        $nama = $request->input('nama');
        $email = $request->input('email');
        $alamat = $request->input('alamat');
        $nomor_hp = $request->input('nomor_hp');
        $jenis_pengiriman = $request->input('deliveryChoose');

        // Simpan data ke dalam tabel order
        $order = new Order();
        $order->nama = $nama;
        $order->email = $email;
        $order->alamat = $alamat;
        $order->nomor_hp = $nomor_hp;
        $order->jenis_pengiriman = $jenis_pengiriman;
        $order->save();

        // Redirect ke view checkout
        return redirect()->route('user.checkout');
    }

    
}
