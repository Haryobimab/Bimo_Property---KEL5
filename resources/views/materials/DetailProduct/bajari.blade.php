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
                <h1 class="text-2xl font-bold">C75 Baja Ringan Galvalum</h1>
                <p class="rating mb-4">Stok Total: 600, Terjual 50</p>
                <p class="price mb-4 text-3xl">Rp90.500</p>
                <hr class="my-4">
                <h2 class="text-2xl mb-2">Deskripsi Produk</h2>
                <p class="text-gray-600 leading-relaxed text-justify mb-2">C75 Baja Ringan Galvalum merupakan solusi terbaik untuk kebutuhan struktur atap yang ringan, namun tetap kuat dan tahan lama. Dibuat dengan menggunakan material berkualitas tinggi, baja ringan galvalum ini menawarkan kombinasi yang optimal antara kekuatan, ketahanan terhadap karat, dan kemudahan penggunaan.</p>
                <ul class="list-disc list-inside mb-4">
                    <li><strong>Kondisi:</strong> Baru</li>
                    <li>Ringan dan Mudah Dipasang</li>
                    <li>Kekuatan tahan lama</li>
                    <li><strong>Kategori:</strong> Bahan Bangunan</li>
                    <li><strong>Dikirim dari Kota Bandung</strong></li>
                </ul>
                <hr class="my-4">
                <h2 class="text-2xl mb-2 mt-8">Spesifikasi</h2>
                <ul class="list-disc list-inside mb-2">
                    <li><strong>Tipe:</strong>  C75</li>
                    <li><strong>Material:</strong> Baja Galvanis</li>
                    <li><strong>Berat:</strong> Sekitar 2.4 kg/meter</li>
                    <li><strong>Kegunaan:</strong> Rangka atap, rangka kuda-kuda, purlin, dan struktur lainnya</li>
                </ul>
                <hr class="my-4">
            </div>
            <div id="productDetail">
                <img src="/IMG/Prodetail/bajari1.png" alt="Product Image 1" class="w-full mb-4 rounded-lg border border-green-500">
                <div class="grid grid-cols-3 gap-4" id="productGallery">
                    <img src="/IMG/Prodetail/bajari1.png" alt="Product Image 2" class="w-full rounded-lg productImage border border-green-500" onclick="changeMainImage(this)">
                    <img src="/IMG/Prodetail/bajari2.jpg" alt="Product Image 3" class="w-full rounded-lg productImage border border-green-500" onclick="changeMainImage(this)">
                    <img src="/IMG/Prodetail/bajari3.jpg" alt="Product Image 4" class="w-full rounded-lg productImage border border-green-500" onclick="changeMainImage(this)">
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
