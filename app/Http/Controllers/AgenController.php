<?php

namespace App\Http\Controllers;

use App\Models\Agen;
use Illuminate\Http\Request;

class AgenController extends Controller
{
    /**
     * Display a listing of the agents.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $region = $request->input('region');

        $agens = Agen::when($search, function ($query, $search) {
            return $query->where('nama_agen', 'like', "%{$search}%")
                         ->orWhere('deskripsi_agen', 'like', "%{$search}%");
        })
        ->when($region, function ($query, $region) {
            return $query->where('alamat', 'like', "%{$region}%");
        })
        ->get();

        return view('agen.cariagen', compact('agens', 'search', 'region'));
    }

    public function show($id)
    {
        $agen = Agen::findOrFail($id);
        return view('agen.detailagen', compact('agen'));
    }
    
}
