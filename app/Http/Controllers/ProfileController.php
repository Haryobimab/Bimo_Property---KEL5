<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\SessionGuard;

class ProfileController extends Controller
{
    public function destroy($id)
    {
        $user = Profile::find($id);
        $user->delete();
        return redirect('/profile')->with('success', 'Data user berhasil terhapus');
    }
    public function profileView () 
	{
        $title = "My Profile";
    	$id = Auth::user()->id;
    	$user = User::find($id);
		return view('user.profile', compact('user'));
	}

    public function updateProfile (Request $request) 
	{
		$data=$request->validate([
            'photo' => 'mimes:png, jpeg, jpg'
        ]);

        $id_user = Auth::user()->id;
        $user = User::find($id_user);

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $imageName = time() . '.' . $photo->getClientOriginalName();
            $photo->move(public_path('photo/'), $imageName);

            if ($user->photo != 'user.jpeg') { 
                File::delete('img/user profile' . $user->photo);
            }

            $user->photo = '/photo' .  $imageName;
            $user->save();
        }

        $user->name = $request->name == '' ? Auth::user()->name : $request->name;
        $user->email= $request->email == '' ? Auth::user()->email : $request->email;
        $user->save();
        return redirect()->back()->with('success', 'Profile berhasil terupdate');
	}
}
