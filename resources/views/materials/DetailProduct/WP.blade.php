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
                <h1 class="text-2xl font-bold">Wallpaper Roll 45 x 10 M</h1>
                <p class="rating mb-4">Stok Total: 500, Terjual 60</p>
                <p class="price mb-4 text-3xl">Rp33.500</p>
                <hr class="my-4">
                <h2 class="text-2xl mb-2">Deskripsi Produk</h2>
                <p class="text-gray-600 leading-relaxed text-justify mb-2">Dapatkan tampilan baru yang memukau untuk dinding Anda dengan mudah menggunakan Wallpaper Lebar 45 cm x Panjang 10 Meter ini. Ideal untuk proyek dekorasi rumah berskala besar maupun kecil, wallpaper ini hadir dengan berbagai macam motif dan warna yang siap disesuaikan dengan gaya interior Anda.</p>
                <ul class="list-disc list-inside mb-4">
                    <li><strong>Kondisi:</strong> Baru</li>
                    <li>Mudah diaplikasikan</li>
                    <li>Hasil akhir yang menawan dengan kualitas premium</li>
                    <li>Beragam pilihan warna dan motif</li>
                    <li>Praktis dan hemat biaya</li>
                </ul>
                <hr class="my-4">
                <h2 class="text-2xl mb-2 mt-8">Spesifikasi</h2>
                <ul class="list-disc list-inside mb-2">
                    <li><strong>Dimensi:</strong> Lebar 45 cm x Panjang 10 Meter (sekitar 4.5 meter persegi)</li>
                    <li><strong>Material:</strong> Umumnya terbuat dari Vinyl (PVC) dengan tekstur tertentu</li>
                    <li><strong>Perekat:</strong> Sudah termasuk lem perekat di bagian belakang wallpaper</li>
                    <li><strong>Motif dan warna:</strong> Tersedia dalam berbagai pilihan</li>
                </ul>
                <hr class="my-4">
            </div>
            <div id="productDetail">
                <img src="/IMG/Prodetail/roll1.jpg" alt="Product Image 1" class="w-full mb-4 rounded-lg border border-green-500">
                <div class="grid grid-cols-3 gap-4" id="productGallery">
                    <img src="/IMG/Prodetail/roll1.jpg" alt="Product Image 2" class="w-full rounded-lg productImage border border-green-500" onclick="changeMainImage(this)">
                    <img src="/IMG/Prodetail/roll2.jpg" alt="Product Image 3" class="w-full rounded-lg productImage border border-green-500" onclick="changeMainImage(this)">
                    <img src="/IMG/Prodetail/roll3.webp" alt="Product Image 4" class="w-full rounded-lg productImage border border-green-500" onclick="changeMainImage(this)">
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
