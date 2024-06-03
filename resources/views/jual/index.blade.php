<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<style>
    h1{
        font-size:52px;
    }
    h5{
        font-size:20px;
    }

    
</style>

@extends('layouts.app')
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <p class="text-center" style="color:green">| J U A L P R O P E R T Y |</p>
        <h1 class="text-center" style="font-size:28px; margin-bottom:24px">Wujudkan impianmu dalam menjual rumah</h1>
    </div>
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div class="title" style="background-color: #E3FBCC; display: flex; align-items: center; padding:16px; border-radius:20px; margin-bottom:24px; max-width:25%">
            <i class="fas fa-home text-center" aria-hidden="true" style="margin-right: 10px; color:green"></i>
            <h5 class="text-center" style="margin: 0; color:green; ">DAFTAR PROPERTY</h5>
        </div>
        <a href="{{ route('jual.create') }}" class="btn btn-primary" style="background-color: green; font">Tambah Properti Baru</a>
    </div>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row">
        @foreach($juals as $jual)
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <img src="{{ asset('images/' . $jual->images->first()->image_path) }}" class="card-img-top" alt="{{ $jual->judul }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $jual->judul }}</h5>
                    <p class="card-text">{{ $jual->deskripsi }}</p>
                    <ul class="list-unstyled">
                        <li><strong>Lokasi:</strong> {{ $jual->lokasi }}</li>
                        <li><strong>Harga:</strong> Rp{{ number_format($jual->harga, 0, ',', '.') }}</li>
                        <li><strong>Kamar Tidur:</strong> {{ $jual->kamar_tidur }}</li>
                        <li><strong>Kamar Mandi:</strong> {{ $jual->kamar_mandi }}</li>
                        <li><strong>Garasi:</strong> {{ $jual->garasi }}</li>
                    </ul>
                </div>
                <div class="card-footer d-flex justify-content-between">
                    <a href="{{ route('jual.show', $jual->id) }}" class="btn btn-outline-success">Selengkapnya</a>
                    <a href="{{ route('jual.edit', $jual->id) }}" class="btn btn-outline-primary">Edit</a>
                    <form action="{{ route('jual.destroy', $jual->id) }}" method="POST" class="ml-1">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
