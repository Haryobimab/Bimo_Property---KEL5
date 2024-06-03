<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\JanjiTemu;
use App\Models\Agen;
use Illuminate\Http\Request;
use Exception;

class JanjiTemuController extends Controller
{
    public function index($id)
{
    // Retrieve the agent based on the passed ID
    $agen = Agen::find($id);

    // Retrieve the janji temu records with the agent data
    $janjitemu = JanjiTemu::where('agen_id', $id)->with('agen')->latest()->paginate(5);

    // Pass both janjitemu and agen to the view
    return view('janjitemu.index', compact('janjitemu', 'agen'));
}


    public function create($id)
    {
        $agen = Agen::find($id);
        return view('janjitemu.create', compact('agen'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'nama' => 'required',
                'email' => 'required',
                'telepon' => 'required',
                'tanggal' => 'required',    
                'property' => 'required',
                'jam' => 'required',
                'pesan' => 'required',
                'agen_id' => 'required|exists:agen,id',
            ]);

            JanjiTemu::create($request->all());

            return redirect()->view('janjitemu.index')
                ->with('success', 'Janji Temu berhasil dibuat.');
        } catch (Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
    

    public function edit(JanjiTemu $janjiTemu)
    {
        return view('janjitemu.edit', compact('janjiTemu'));
    }

    public function update(Request $request, JanjiTemu $janjiTemu)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'telepon' => 'required',
            'tanggal' => 'required',
            'jam' => 'required',
            'pesan' => 'required',
        ]);

        $janjiTemu->update($request->all());

        return redirect()->route('janji-temu.index')
            ->with('success', 'Janji Temu berhasil diupdate.');
    }

    public function destroy(JanjiTemu $janjiTemu)
    {
        $janjiTemu->delete();

        return redirect()->route('janji-temu.index')
            ->with('success', 'Janji Temu berhasil dihapus.');
    }

    public function complete(Request $request, $id)
    {
        $janjiTemu = JanjiTemu::findOrFail($id);
        $janjiTemu->status = 'completed';
        $janjiTemu->save();

        return redirect()->back()->with('success', 'Janji Temu telah selesai.');
    }

    public function cancel(Request $request, $id)
    {
        $janjiTemu = JanjiTemu::findOrFail($id);
        $janjiTemu->status = 'canceled';
        $janjiTemu->save();

        return redirect()->back()->with('success', 'Janji Temu telah dibatalkan.');
    }

    public function rescheduleForm($id)
    {
        $janjiTemu = JanjiTemu::findOrFail($id);
        return view('janjitemu.reschedule', compact('janjiTemu'));
    }

}
