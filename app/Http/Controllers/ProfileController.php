<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use App\Models\Profile;
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
		$request->validate([
            'name' => 'required',
            'email' => 'required',
            'confirm_password' => 'required_with:password|same:password',
            'photo' => '',
        ]);
  
        $input = $request->all();
          
        if ($request->hasFile('photo')) {
            $photoName = time().'.'.$request->photo->getClientOriginalExtension();
            $request->photo->move(public_path('photo'), $photoName);
            
  
            $input['photo'] = $photoName;
            
        
        } else {
            unset($input['photo']);
        }
  
        if ($request->filled('password')) {
            $input['password'] = Hash::make($input['password']);
        } else {
            unset($input['password']);
        }
  
        auth()->user()->update($input);
        
    
        return back()->with('success', 'Profile updated successfully.');
	}
}
