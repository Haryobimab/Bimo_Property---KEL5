<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>beli Furniture</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="styles.css">
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

@extends('layouts.app')
@section('content')
<body class="">
  <div class="container mx-auto px-4 text-center mb-8">
    <h1 class="text-2xl font-bold">Beli Bahan Bangunan</h1>
    <p class="text-gray-600">Telusuri beragam pilihan bahan bangunan yang sesuai dengan kebutuhan Anda</p>
  </div>

  <div class="flex justify-center">
    <form action="/search" class="max-w-[480px] w-full px-4">
      <div class="relative">
        <input type="text" name="q" class="w-full border h-12 shadow p-4 rounded-full dark:text-gray-800 dark:border-gray-700 dark:bg-gray-200" placeholder="search">
        <button type="submit">
          <svg class="text-teal-400 h-5 w-5 absolute top-3.5 right-3 fill-current dark:text-teal-300"
            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
            x="0px" y="0px" viewBox="0 0 56.966 56.966"
            style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve">
            <path
              d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z">
            </path>
          </svg>
        </button>
      </div>
    </form>
  </div>

  <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">
    <div class="bg-white shadow-md rounded-md overflow-hidden m-4">
      <img src="/IMG/genteng.jpg" alt="Whitesburg Dining Room Table" class="w-full h-48 object-cover">
      <div class="p-4">
        <h2 class="text-lg font-bold">Genteng Beton Metal</h2>
        <p class="text-gray-600">Genteng beton berkualitas tinggi dengan ketahanan lama dan beragam warna yang menarik. Cocok untuk rumah modern dan minimalis.</p>
        <p class="text-xl font-bold mt-2">Rp25.000/m²</p>
        <div class="mt-4">
          <button class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-md mr-2" onclick="addToCart(5)">Tambah Keranjang</button>
          <a href="{{ route('genteng.index')}}" class="border border-green-600 hover:bg-green-100 text-green-600 font-bold py-2 px-4 rounded-md">Lihat Detail</a>
        </div>
      </div>
    </div>

    <div class="bg-white shadow-md rounded-md overflow-hidden m-4">
      <img src="/IMG/floor.jpg" alt="Zinus Upholstered Platform Bed" class="w-full h-48 object-cover">
      <div class="p-4">
        <h2 class="text-lg font-bold">Granit Keramik Lantai Granito 60x60 CM</h2>
        <p class="text-gray-600">Keramik lantai granit berkualitas tinggi dengan desain elegan dan tahan lama. Cocok untuk ruang tamu, kamar tidur, dan dapur.</p>
        <p class="text-xl font-bold mt-2">Rp120.000/m²</p>
        <div class="mt-4">
          <button class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-md mr-2" onclick="addToCart(6)">Tambah Keranjang</button>
          <a href="{{ route('lantai.index')}}" class="border border-green-600 hover:bg-green-100 text-green-600 font-bold py-2 px-4 rounded-md">Lihat Detail</a>
        </div>
      </div>
    </div>

    <div class="bg-white shadow-md rounded-md overflow-hidden m-4">
      <img src="/IMG/bajaringan.jpg" alt="Sauder Beginnings 5-Shelf Bookcase" class="w-full h-48 object-cover">
      <div class="p-4">
        <h2 class="text-lg font-bold">C75 Baja Ringan Galvalum</h2>
        <p class="text-gray-600">Rangka atap baja ringan galvalum. Ringan, kuat, dan tahan karat, cocok untuk berbagai kebutuhan konstruksi.</p>
        <p class="text-xl font-bold mt-2">Rp90.500</p>
        <div class="mt-4">
          <button class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-md mr-2" onclick="addToCart(7)">Tambah Keranjang</button>
          <a href="{{ route('bajari.index')}}" class="border border-green-600 hover:bg-green-100 text-green-600 font-bold py-2 px-4 rounded-md">Lihat Detail</a>
        </div>
      </div>
    </div>

    <div class="bg-white shadow-md rounded-md overflow-hidden m-4">
      <img src="/IMG/rucika.jpg" alt="Herman Miller Aeron Chair" class="w-full h-48 object-cover">
      <div class="p-4">
        <h2 class="text-lg font-bold">Pipa PVC Rucika Standard Ukuran 4 inch</h2>
        <p class="text-gray-600">Pipa PVC Rucika Standard terbuat dari bahan PVC berkualitas tinggi yang tahan lama, kuat, dan mudah dipasang. Cocok untuk berbagai aplikasi perpipaan seperti air bersih, irigasi, dan limbah</p>
        <p class="text-xl font-bold mt-2">Rp295.000</p>
        <div class="mt-4">
          <button class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-md mr-2" onclick="addToCart(8)">Tambah Keranjang</button>
          <a href="{{ route('pipa.index')}}" class="border border-green-600 hover:bg-green-100 text-green-600 font-bold py-2 px-4 rounded-md">Lihat Detail</a>
        </div>
      </div>
    </div>
  </div>

  <nav aria-label="Page navigation example" class="mt-8"> <!-- Add margin-top for spacing -->
    <ul class="pagination justify-content-center">
      <li class="page-item disabled">
        <a class="page-link" href="{{ route('belibahanbangunan.index') }}" tabindex="-1">Previous</a>
      </li>
      <li class="page-item"><a class="page-link" href="{{ route('belibahanbangunan.index') }}">1</a></li>
      <li class="page-item"><a class="page-link" href="">2</a></li>
      <li class="page-item">
        <a class="page-link" href="#">Next</a>
      </li>
    </ul>
  </nav>

</main>

@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

 <script>
  // Function to handle adding item to cart
  function addToCart(productId) {
      // Get CSRF token value from the meta tag
      var csrfToken = $('meta[name="csrf-token"]').attr('content');
      
      // Send Ajax request to server
      $.ajax({
          url: '/add_cart/' + productId, // Ganti dengan URL endpoint API yang sesuai
          type: 'POST',
          data: {_token: csrfToken}, // Sertakan token CSRF dalam data
          success: function(response) {
              // Tampilkan notifikasi bahwa item telah ditambahkan ke keranjang
              toastr.options.toastClass = 'bg-success'; 
              toastr.success('Item berhasil ditambahkan ke keranjang!');
          },
          error: function(xhr, status, error) {
              // Tampilkan pesan error jika terjadi kesalahan
              toastr.options.toastClass = 'bg-danger'; 
              toastr.error('Tidak dapat menambahkan item ke keranjang!');
          }
      });
  }
</script>
</html>
