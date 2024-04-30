@extends('layouts.app')
    @section('content')

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ibeli Furniture</title>
  <link rel="stylesheet" href="styles.css">
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
  <header class="bg-white shadow py-4">
    <div class="container mx-auto px-4 flex justify-between items-center">
      <div>
        <h1 class="text-2xl font-bold">Ibeli Furniture</h1>
        <p class="text-gray-600">Telusuri beragam pilihan furniture yang sesuai dengan kebutuhan dan budget Anda</p>
      </div>
      <div>
        <input type="text" placeholder="Cari furniture..." class="border border-gray-300 rounded-md px-4 py-2">
        <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-md ml-2">Cari</button>
      </div>
    </div>
  </header>



  <main class="container mx-auto px-4 py-8">
    <h2 class="text-2xl font-bold mb-4">Produk Terbaru</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
      <div class="bg-white shadow-md rounded-md overflow-hidden">
        <img src="dining-table.jpg" alt="Whitesburg Dining Room Table" class="w-full h-48 object-cover">
        <div class="p-4">
          <h2 class="text-lg font-bold">Whitesburg Dining Room Table</h2>
          <p class="text-gray-600">Meja makan dengan gaya tradisional yang indah, terbuat dari kayu berkualitas tinggi dan dilengkapi dengan kursi yang nyaman.</p>
          <p class="text-xl font-bold mt-2">Rp280.000</p>
          <div class="mt-4">
            <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-md mr-2">Tambah Keranjang</button>
            <button class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-md">Lihat Detail</button>
          </div>
        </div>
      </div>

      <div class="bg-white shadow-md rounded-md overflow-hidden">
        <img src="bed.jpg" alt="Zinus Upholstered Platform Bed" class="w-full h-48 object-cover">
        <div class="p-4">
          <h2 class="text-lg font-bold">Zinus Upholstered Platform Bed</h2>
          <p class="text-gray-600">Tempat tidur dengan desain modern dan kokoh, dilengkapi dengan bingkai kayu yang kuat dan penyangga berlapis kain untuk kenyamanan ekstra.</p>
          <p class="text-xl font-bold mt-2">Rp450.000</p>
          <div class="mt-4">
            <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-md mr-2">Tambah Keranjang</button>
            <button class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-md">Lihat Detail</button>
          </div>
        </div>
      </div>

      <div class="bg-white shadow-md rounded-md overflow-hidden">
        <img src="bookcase.jpg" alt="Sauder Beginnings 5-Shelf Bookcase" class="w-full h-48 object-cover">
        <div class="p-4">
          <h2 class="text-lg font-bold">Sauder Beginnings 5-Shelf Bookcase</h2>
          <p class="text-gray-600">Meja makan dengan gaya tradisional yang indah, terbuat dari kayu berkualitas tinggi dan dilengkapi dengan kursi yang nyaman.</p>
          <p class="text-xl font-bold mt-2">Rp280.000</p>
          <div class="mt-4">
            <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-md mr-2">Tambah Keranjang</button>
            <button class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-md">Lihat Detail</button>
          </div>
        </div>
      </div>

      <div class="bg-white shadow-md rounded-md overflow-hidden">
        <img src="chair.jpg" alt="Herman Miller Aeron Chair" class="w-full h-48 object-cover">
        <div class="p-4">
          <h2 class="text-lg font-bold">Herman Miller Aeron Chair</h2>
          <p class="text-gray-600">Kursi kantor ergonomis dengan desain yang inovatif dan nyaman, dilengkapi dengan berbagai fitur penyesuaian untuk mendukung postur tubuh yang sehat.</p>
          <p class="text-xl font-bold mt-2">Rp280.000</p>
          <div class="mt-4">
            <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-md mr-2">Tambah Keranjang</button>
            <button class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-md">Lihat Detail</button>
          </div>
        </div>
      </div>
    </div>
  </main>





    @endsection