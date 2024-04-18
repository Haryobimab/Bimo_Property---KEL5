<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function show(){
        return view('admin.dashboard');
     }
    
     public function index(){
        return view('admin.dashboard');
     }
    
     public function profile (){
        return view('admin.profileAdmin');
     }
}
