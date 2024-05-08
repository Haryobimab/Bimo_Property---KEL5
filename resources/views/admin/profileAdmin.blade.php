<link rel="stylesheet" href="/css/profileadmin.css" >
@extends('layouts.admin_beranda')
@section('content')
<div class="content" style="margin-left:320px; margin-top:36px">
    <div class="profile">
            <div class="row">
                <div class="profile-kiri ">
                    <ul>
                        <h1> Profile Saya</h1>
                        <h2> Ini merupakan bagian profil yang bisa Anda gunakan untuk login di dashboard Bimo Property</h2>
                    </ul>
                    <!-- Foto dan data diri -->
                    <img src="{{ asset('photo/' . auth()->user()->photo) }}" alt=""  style=" scale:80%; border-radius:50%">  
                    <div style="margin-bottom:80px"class="data-diri">
                        <h3> Username </h3>
                        <div class="kotak"> {{auth()->user()->username}}  </div>
                        <h3> Nama </h3>
                        <div class="kotak"> {{auth()->user()->name}} </div>
                        <h3> Email </h3>
                        <div class="kotak"> {{auth()->user()->email}} </div>
                    </div>
                </div>
     </div>
</div>

@endsection
    

           