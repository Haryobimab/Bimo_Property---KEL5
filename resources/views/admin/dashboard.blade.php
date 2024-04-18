@extends('layouts.admin_beranda')
@section('content')
<!-- Main Content -->
<main class="container mt-5">
        <h1 class="text-center">Selamat datang di Dashboard Admin Bimo Property </h1>
        <p style="margin-bottom: 20px;" class="lead text-center">tempat di mana Anda dapat mengelola dan mengontrol semua aspek dari situs web Anda dengan mudah dan efisien</p>
        <!-- Kotak-kotak fitur -->
        <div style="margin-top:40px"class="row text-center">
            <div class="col-md-3 mb-3">
                <div class="feature-box border p-4">
                    <a href="{{ url('aktifitasmingguan') }}">
                        <img src="{{ asset('IMG/inspirasi1.jpeg') }}" alt="Beli Ruko" class="img-fluid mb-3">
                        <div class="feature-text">
                            <h3>Beli Ruko</h3>
                            <h4>12 Ruko Tambahan Bulan Ini</h4>
                            <p style="font-size:16px; color:green">+2.3%</p>
                            <h3 style="background-color: #4BA30D; color: white;"class="btn btn-primary">Lihat Detail</h3>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="feature-box border p-4">
                    <a href="{{ url('kegiatanpembinaan') }}">
                        <img src="{{ asset('IMG/inspirasi2.jpeg') }}" alt="Berita" class="img-fluid mb-3">
                        <div class="feature-text">
                            <h3>Berita</h3>
                            <h4>15 Berita Bulan Ini</h4>
                            <p style="font-size:16px; color:green">+6.7%</p>
                            <h3 style="background-color: #4BA30D; color: white;"class="btn btn-primary">Lihat Detail</h3>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="feature-box border p-4">
                    <a href="{{ url('kegiatan_tahfizhs') }}">
                        <img src="{{ asset('IMG/inspirasi3.jpeg') }}" alt="FAQ" class="img-fluid mb-3">
                        <div class="feature-text">
                            <h3>FAQ</h3>
                            <h4>2 FAQ bulan Ini</h4>
                            <p style="font-size:16px; color:red">-1.2%</p>
                            <h3 style="background-color: #4BA30D; color: white;"class="btn btn-primary">Lihat Detail</h3>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="feature-box border p-4">
                    <a href="{{ url('kegiatan_tahfizhs') }}">
                        <img src="{{ asset('IMG/inspirasi3.jpeg') }}" alt="Ulasan" class="img-fluid mb-3">
                        <div class="feature-text">
                            <h3>Ulasan</h3>
                            <h4>105 Ulasan Bulan Ini</h4>
                            <p style="font-size:16px; color:green">+6.7%</p>
                            <h3 style="background-color: #4BA30D; color: white;"class="btn btn-primary">Lihat Detail</h3>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        
</main>

@endsection