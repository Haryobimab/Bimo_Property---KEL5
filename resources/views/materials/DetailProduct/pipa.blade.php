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
                <h1 class="text-2xl font-bold">Pipa PVC Rucika Standard Ukuran 4 inch</h1>
                <p class="rating mb-4">Stok Total: 600, Terjual 50</p>
                <p class="price mb-4 text-3xl">Rp295.000</p>
                <hr class="my-4">
                <h2 class="text-2xl mb-2">Deskripsi Produk</h2>
                <p class="text-gray-600 leading-relaxed text-justify mb-2">Pipa PVC Rucika Standard ukuran 4 inci adalah solusi yang ideal untuk kebutuhan sistem perpipaan Anda. Dibuat dari bahan PVC berkualitas tinggi, pipa ini menawarkan kombinasi yang optimal antara kekuatan, daya tahan, dan kemudahan pemasangan. Material PVC yang digunakan dalam pipa ini terkenal karena ketahanannya terhadap korosi, kelembaban, dan zat kimia, menjadikannya pilihan yang tahan lama untuk berbagai aplikasi perpipaan.</p>
                <ul class="list-disc list-inside mb-4">
                    <li><strong>Kondisi:</strong> Baru</li>
                    <li>Mudah Dipasang</li>
                    <li>Kekuatan tahan lama</li>
                    <li><strong>Kategori:</strong> Bahan Bangunan</li>
                    <li><strong>Dikirim dari Kota Bandung</strong></li>
                </ul>
                <hr class="my-4">
                <h2 class="text-2xl mb-2 mt-8">Spesifikasi</h2>
                <ul class="list-disc list-inside mb-2">
                    <li><strong>Merk:</strong> Rucika</li>
                    <li><strong>Tipe:</strong> AW (Air Bersih) & D (Drainase)</li>
                    <li><strong>Indonesia Standard:</strong> SNI 19-7047-2005 & SNI 3676-2013</li>
                    <li><strong>Warna:</strong> Tersedia dalam 3 pilihan warna</li>
                </ul>
                <hr class="my-4">
            </div>
            <div id="productDetail">
                <img src="/IMG/Prodetail/pipa1.jpg" alt="Product Image 1" class="w-full mb-4 rounded-lg border border-green-500">
                <div class="grid grid-cols-3 gap-4" id="productGallery">
                    <img src="/IMG/Prodetail/pipa1.jpg" alt="Product Image 2" class="w-full rounded-lg productImage border border-green-500" onclick="changeMainImage(this)">
                    <img src="/IMG/Prodetail/pipa2.jpg" alt="Product Image 3" class="w-full rounded-lg productImage border border-green-500" onclick="changeMainImage(this)">
                    <img src="/IMG/Prodetail/pipa4.webp" alt="Product Image 4" class="w-full rounded-lg productImage border border-green-500" onclick="changeMainImage(this)">
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
