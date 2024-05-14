@extends('layouts.admin_beranda')
@section('content')
<!-- Main Content -->

<div class="content">
        <div class="title" style="margin-top:36px">
            <h1 class="text-center">Selamat datang di Dashboard Admin Bimo Property </h1>
            <p style="margin-bottom: 20px;" class="lead text-center">tempat di mana Anda dapat mengelola dan mengontrol semua aspek dari situs web Anda dengan mudah dan efisien</p>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body d-flex align-items-center">
                        <i class="fas fa-newspaper fa-2x mr-3" style="background-color:#ECFDF3; color:#039855; padding:12px; border-radius:12px"></i>
                        <div>
                            <h5 class="card-title" style="font-size:12px; color:#98A2B3">Berita</h5>
                            <h4 class="card-text">15 Berita</h4>
                           
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body d-flex align-items-center">
                        <i class="fas fa-star fa-2x mr-3" style="background-color:#ECFDF3; color:#039855; padding:12px; border-radius:12px"></i>
                        <div>
                            <h5 class="card-title" style="font-size:12px; color:#98A2B3">Penjualan Bahan Bangunan</h5>
                            <h4 class="card-text">{{$countBahanBangunan}} Produk</h4>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body d-flex align-items-center">
                        <i class="fas fa-couch fa-2x mr-3" style="background-color:#ECFDF3; color:#039855; padding:12px; border-radius:12px"></i>
                        <div>
                            <h5 class="card-title" style="font-size:12px; color:#98A2B3">Penjualan Furniture</h5>
                            <h4 class="card-text">{{$countFurniture}} Produk</h4>
                        </div>
                        
                    </div>
                </div>
            </div>
                <div class="col-md-8" style="margin-top:24px">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">List Agen</h5>
                            <p class="card-description" style="color:#98A2B3">Daftar agen yang bekerjasama</p>
                        </div>
                        <div class="card-body" >
                            <table class="table">
                                <thead >
                                    <tr>
                                        <th scope="col">Nomor</th>
                                        <th scope="col">Nama Agen</th>
                                        <th scope="col">Lokasi Agen</th>
                                        <th scope="col">Rating</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Agen 1</td>
                                        <td>Lokasi 1</td>
                                        <td >
                                            <p style="background-color:#FEF0C7; color:#DC6803; padding-left:16px; border-radius:12px; width:50%">4.9</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Agen 2</td>
                                        <td>Lokasi 2</td>
                                        <td >
                                            <p style="background-color:#FEF0C7; color:#DC6803; padding-left:16px; border-radius:12px; width:50%">4.9</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>Agen 3</td>
                                        <td>Lokasi 3</td>
                                        <td >
                                            <p style="background-color:#FEF0C7; color:#DC6803; padding-left:16px; border-radius:12px; width:50%">4.9</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">4</th>
                                        <td>Agen 4</td>
                                        <td>Lokasi 4</td>
                                        <td >
                                            <p style="background-color:#FEF0C7; color:#DC6803; padding-left:16px; border-radius:12px; width:50%">4.9</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row" style="margin:16px">5</th>
                                        <td>Agen 5</td>
                                        <td>Lokasi 5</td>
                                        <td >
                                            <p style="background-color:#FEF0C7; color:#DC6803; padding-left:16px; border-radius:12px; width:50%">4.9</p>
                                        </td>
                                    </tr>
                                    <!-- Tambahkan baris data agen sesuai kebutuhan -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card" style="margin-top:24px">
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
                    <div class="card">
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
                    <div class="card" style="margin-top:24px">
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