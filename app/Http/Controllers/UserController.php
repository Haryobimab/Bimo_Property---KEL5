<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\SessionGuard;


class UserController extends Controller
{
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/profile')->with('success', 'Data user berhasil terhapus');
    }
    public function profile () 
	{
		$title = 'My Profile';
        $user =  \App\User::findOrFail($user);
		return view('user.profile', compact('title', 'user'));
	}

    public function update_profile (Request $request) 
	{
		$request->validate([
            'photo' => 'mimes:png, jpeg, jpg'
        ]);

        $id_user = Auth::user()->id;
        $user = User::find($id_user);

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $ubah_nama_photo = time() . '_' . $photo->getClientOriginalName();
            $photo->move('photo', $ubah_nama_photo);

            if ($user->photo != 'user.png') { 
                File::delete('img/user profile' . $user->photo);
            }

            $user->photo = $ubah_nama_photo;
            $user->save();
        }

        $user->name = $request->name == '' ? Auth::user()->name : $request->name;
        $user->email= $request->email == '' ? Auth::user()->email : $request->email;
        $user->save();
        return redirect('/profile')->with('success', 'Profile berhasil terupdate');
	}


 public function index(){
        return view('beranda');
     }
}

