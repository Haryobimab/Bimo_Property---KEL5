<?php

namespace App\Http\Controllers;


use App\Models\Produk;
use App\Models\Favorite;
use App\Models\Keranjang;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;


class FavoriteController extends Controller
{
    
    public function show(Request $request)
    {
        $title = "Daftar Favorite";
        $id_user = auth()->user()->id;

        // dd($id_user);

        $favorite = Favorite::where('id_user',$id_user)->get();
        $countFavorite = $favorite->count();
        
        $data = [
            'favorite' => $favorite,
            'countFavorite' => $countFavorite
        ];
    
        return view('user.favorite', $data);
    }

    // public function checkout()
    // {
    //     $title = "Checkout";
    //     $keranjang = Keranjang::all();
    //     $subtotal = $keranjang->sum('barang.harga');
    //     $tax = $subtotal * 0.1;
    //     $total = $subtotal + $tax;
    //     return view('user.checkout', compact('keranjang', 'total', 'title',  'subtotal', 'tax'));
    // }

    // public function showDetails($id)
    // {
    //     $title = "Detail Keranjang";
    //     $keranjang = Keranjang::findOrFail($id);
    //     return view('user.checkout', compact('keranjang', 'title'));
    // }
    
    public function destroy($id)
    {
        $item = Favorite::findOrFail($id);
        $item->delete();
        return redirect()->route('favorite')->with('success', 'Item has been deleted from favorite lists.');
    }

    public function add_favorite($id){

        $data = [
            'id_rumah' => $id,
            'id_user' => auth()->user()->id
        ];

        Favorite::create($data);

        return response()->json(['message' => 'Item has been added to the favorite lists.']);

    }

    

    
}
