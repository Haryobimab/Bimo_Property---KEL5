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
<body class="#">
    <div class="bg-white p-8 rounded-lg shadow-md">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div>
                <h1 class="text-2xl font-bold">Besi Beton 10 MM Ulir SNI</h1>
                <p class="rating mb-4">Stok Total: 12000, Terjual 3 rb+</p>
                <p class="price mb-4 text-3xl">Rp61.000</p>
                <hr class="my-4">
                <h2 class="text-2xl mb-2">Deskripsi Produk</h2>
                <p class="text-gray-600 leading-relaxed text-justify mb-2">Bangun struktur beton yang kokoh dan tahan lama dengan Besi Beton 10 MM Ulir SNI. Besi Beton 10 MM Ulir SNI adalah material bangunan yang digunakan untuk konstruksi struktur beton seperti kolom, balok, dan plat. Produk ini memenuhi standar SNI 15-7064-2014 dan memiliki kualitas yang terjamin dengan standar mutu tinggi. Cocok digunakan untuk proyek bangunan bertingkat, jembatan, dan infrastruktur lainnya</p>
                <ul class="list-disc list-inside mb-4">
                    <li><strong>Kondisi:</strong> Baru dari Pabrik</li>
                    <li><strong>Kategori:</strong> Bahan Bangunan</li>
                    <li><strong>Dikirim dari Kota Bandung</strong></li>
                </ul>
                <hr class="my-4">
                <h2 class="text-2xl mb-2 mt-8">Spesifikasi</h2>
                <ul class="list-disc list-inside mb-2">
                    <li><strong>Diameter:</strong> 10 mm</li>
                    <li><strong>Panjang:</strong>6 meter, 9 meter, dan 12 meter</li>
                    <li><strong>Indonesian Standard:</strong> SNI 15-7064-2014</li>
                    <li><strong>Berat:</strong> 15 kg/meter</li>
                    <li><strong>Material:</strong> Baja dengan ulir</li>
                </ul>
                <hr class="my-4">
            </div>
            <div id="productDetail">
                <img src="/IMG/Prodetail/besi1.jpg" alt="Product Image 1" class="w-full mb-4 rounded-lg border border-green-500">
                <div class="grid grid-cols-3 gap-4" id="productGallery">
                    <img src="/IMG/Prodetail/besi1.jpg" alt="Product Image 2" class="w-full rounded-lg productImage border border-green-500" onclick="changeMainImage(this)">
                    <img src="/IMG/Prodetail/besi2.jpg" alt="Product Image 3" class="w-full rounded-lg productImage border border-green-500" onclick="changeMainImage(this)">
                    <img src="/IMG/Prodetail/besi3.jpg" alt="Product Image 4" class="w-full rounded-lg productImage border border-green-500" onclick="changeMainImage(this)">
                </div>
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