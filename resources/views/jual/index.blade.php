@extends('layouts.layout')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-4">Daftar Properti</h2>
        <a href="{{ route('jual.create') }}" class="btn btn-primary">Tambah Properti Baru</a>
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
                    <a href="{{ route('jual.show', $jual->id) }}" class="btn btn-info btn-sm">Selengkapnya</a>
                    <a href="{{ route('jual.edit', $jual->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    <form action="{{ route('jual.destroy', $jual->id) }}" method="POST" class="ml-1">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
