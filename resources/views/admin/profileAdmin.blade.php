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
                    <div style="margin-bottom:100px"class="data-diri">
                        <form class="form-floating">
                            <label for="floatingInputValue">Username</label>
                            <input type="email" class="form-control" id="floatingInputValue" placeholder="name@example.com" value="{{auth()->user()->username}}">
                        </form>
                        <form class="form-floating">
                            <label for="floatingInputValue">Nama</label>
                            <input type="email" class="form-control" id="floatingInputValue" placeholder="name@example.com" value="{{auth()->user()->name}}">
                        </form>
                        <form class="form-floating">
                            <label for="floatingInputValue">Email</label>
                            <input type="email" class="form-control" id="floatingInputValue" placeholder="name@example.com" value="{{auth()->user()->email}}">
                        </form>
                    </div>
     </div>
</div>

@endsection
    

           