@extends('layouts.app')
@section('content')

<!-- resources/views/furnitureuser.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Furniture</title>
    <!-- Tautkan stylesheet Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Tautkan CSS tambahan jika diperlukan -->
    <style>
        /* Tambahkan CSS tambahan di sini */
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Daftar Furniture</h1>
        <div class="row">
            @forelse($furnitures as $item)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100 shadow-sm">
                        
                    <img src="{{ asset('images/' .$item->img) }}" class="card-img-top" alt="{{ $item->img }}" style="height: 250px">
                        <div class="card-body">
                            <h5 class="card-title">Nama Furnitur : {{ $item->nama_furniture }}</h5>
                            <p class="card-text">Harga: {{ $item->harga }}</p>
                            <p class="card-text"> Deskripsi{{ $item->deskripsi }}</p>
                            <!-- Tampilkan informasi lainnya tentang furniture -->
                        </div>
                    </div>
                </div>
            @empty
                <div class="col">
                    <p class="text-center">Tidak ada furniture yang tersedia saat ini.</p>
                </div>
            @endforelse
        </div>
    </div>

    <!-- Tautkan script JavaScript Bootstrap -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Tautkan script JavaScript tambahan jika diperlukan -->
</body>
</html>

@endsection
