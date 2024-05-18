<style>
    
</style>

@extends('layouts.admin_beranda')
@section('content')
<!-- Main Content -->

<div class="content">
        <div class="title" style="margin-top:36px; display: flex; ">
            <h1 class="" style="font-size:36px">Dashboard </h1>
            <div class="biodata" style="margin-left:800px">
                <img style="width:40px; height:40px; border-radius:30%" src="{{ asset('photo/' . auth()->user()->photo) }}" alt="User Profile Picture">
                <a class="btn2" style="color: #05603A ; font-size:18px; font-weight:400; margin-left:20px" href="/admin/profile">{{ Auth::user()->name }}</a>
            </div>
        </div>
        <div class="row" style="margin-top:32px">
            <div class="col-md-4">
                <div class="card" style="border:none; border-radius:20px">
                    <div class="card-body d-flex align-items-center" style="display: flex; ">
                        <i class="fas fa-newspaper fa-1x mr-3" style="background-color:#16B364; color: #ECFDF3; padding:12px; border-radius:12px"></i>
                        <div>
                            <h5 class="card-title" style="font-size:18px; color:#164C63">Berita</h5>
                            <h4 class="card-text" style="font-size:16px; color:#16B364;">15 Berita</h4>
                           
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" style="border:none; border-radius:20px">
                    <div class="card-body d-flex align-items-center">
                        <i class="fas fa-star fa-1x mr-2" style=" margin-right:12px; background-color:#3538CD; color:#E0EAFF; padding:12px; border-radius:12px"></i>
                        <div >
                            <h5 class="card-title" style="font-size:18px; color:#164C633">Penjualan Bahan Bangunan</h5>
                            <h4 class="card-text" style="font-size:16px; color:#3538CD ">{{$countBahanBangunan}} Produk</h4>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" style="border:none; border-radius:20px">
                    <div class="card-body d-flex align-items-center">
                        <i class="fas fa-couch fa-1x mr-3" style="background-color:#E31B54; color:#FFE4E8; padding:12px; border-radius:12px"></i>
                        <div>
                            <h5 class="card-title" style="font-size:18px; color:#164C63">Penjualan Furniture</h5>
                            <h4 class="card-text" style="font-size:16px; color:#E31B54; ">{{$countFurniture}} Produk</h4>
                        </div>
                        
                    </div>
                </div>
            </div>
                <div class="col-md-8" style="margin-top:24px">
                    <div class="card" style="border:none">
                        <div class="card-header">
                            <h5 class="card-title">List Agen</h5>
                           
                        </div>
                        <div class="card-body" >
                            <table class="table">
                                <thead >
                                    <tr>
                                        
                                        <th scope="col">Nama Agen</th>
                                        <th scope="col">Lokasi Agen</th>
                                        <th scope="col">Rating</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @foreach ($agen as $agent) --}}
                                    <tr>
                                        
                                        {{-- <td>{{ $agent->nama_agen }}</td>
                                        <td>{{ $agent->alamat }}</td> --}}
                                        <td >
                                            {{-- <p style="background-color:#FEF0C7; color:#DC6803; padding-left:16px; border-radius:12px; width:50%">{{ $agent->rating }}</p>
                                        </td> --}}
                                    </tr>
                                    {{-- @endforeach --}}
                                   
                                    <!-- Tambahkan baris data agen sesuai kebutuhan -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card" style="margin-top:24px; border:none">
                        <div class="card-header" >
                            <h5 class="card-title">Ketersediaan Rumah</h5>
                            <p class="card-description" style="color:#98A2B3">Daftar pertanyaan yang dipunyai</p>
                        </div>
                        <div class="card-body">
                            <ul class="list-group">
                                <li class="list-group-item">Keren</li>
                                <li class="list-group-item">Bagus</li>
                                <li class="list-group-item">mantap</li>
                                <!-- Tambahkan daftar FAQ sesuai kebutuhan -->
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4" style="margin-top:24px">
                    <div class="card" style="border:none">
                        <div class="card-header">
                            <h5 class="card-title">List FAQ</h5>
                            <p class="card-description" style="color:#98A2B3">Daftar pertanyaan yang dipunyai</p>
                        </div>
                        <div class="card-body">
                            <ul class="list-group">
                                <li class="list-group-item">1. Apa itu FAQ?</li>
                                <li class="list-group-item">2. Bagaimana cara menggunakan FAQ?</li>
                                <li class="list-group-item">3. Apakah FAQ dapat membantu?</li>
                                <!-- Tambahkan daftar FAQ sesuai kebutuhan -->
                            </ul>
                        </div>
                    </div>
                    <div class="card" style="margin-top:24px; border:none">
                        <div class="card-header" >
                            <h5 class="card-title">List Ulasan</h5>
                            <p class="card-description" style="color:#98A2B3">Daftar pertanyaan yang dipunyai</p>
                        </div>
                        <div class="card-body">
                            <ul class="list-group">
                                <li class="list-group-item"></li>
                                <li class="list-group-item">Bagus</li>
                                <li class="list-group-item">mantap</li>
                                <li class="list-group-item">mantap</li>
                                <li class="list-group-item">mantap</li>
                                <!-- Tambahkan daftar FAQ sesuai kebutuhan -->
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4" style="margin-top:24px">
                    
                </div>
        </div>
    </div>

@endsection