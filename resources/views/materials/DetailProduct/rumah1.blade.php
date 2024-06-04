<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Detail Page</title>
    <link rel="stylesheet" href="{{ asset('css/Prodetail/hal1.css') }}">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
@extends('layouts.app')
@section('content')

@php
    if (!function_exists('rupiah')) {
        function rupiah($angka){
            $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
            return $hasil_rupiah;
        }
    }
@endphp

<body class="#">
    <div class="bg-white p-8 rounded-lg shadow-md">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div>
                <h1 class="text-2xl font-bold">{{ $rumah->nama_rumah }}</h1>
                <p class="price mb-4 text-3xl">{{ rupiah($rumah->harga) }}</p>
                <hr class="my-4">
                <h2 class="text-2xl mb-2">Deskripsi Produk</h2>
                <p class="text-gray-600 leading-relaxed text-justify mb-2">
                    {{ $rumah->informasi }}
                </p>
                <ul class="list-disc list-inside mb-4">
                    <li><strong>Lokasi:</strong> {{ $rumah->lokasi }}</li>
                    <li><strong>Jumlah Kamar:</strong> {{ $rumah->jumlah_kamar }} Kamar</li>
                    <li><strong>Jumlah Kamar Mandi:</strong> {{ $rumah->jumlah_kamar_tidur }} Kamar Tidur</li>
                    <li><strong>Jumlah Parkiran:</strong> {{ $rumah->jumlah_parkir }} Parkiran</li>
                </ul>
                <a href="https://api.whatsapp.com/send/?phone=6281314053331" target="_blank" class="btn btn-outline-primary w-100">Hubungi Agen</a>
            </div>
            <div id="productDetail">
                <img src="{{ asset('/') }}images/{{ $rumah->img }}" alt="Product Image 1" class="w-full mb-4 rounded-lg border border-green-500">
            </div>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function changeMainImage(element) {
            var mainImage = document.getElementById('productDetail').querySelector('img');
            mainImage.src = element.src;
        }
    </script>
</body>
</html>
@endsection
