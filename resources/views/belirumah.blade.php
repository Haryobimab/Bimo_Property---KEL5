
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Beli Rumah</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="styles.css">
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


  <style>
    .red-text {
      color: red; /* Important to override default styles */
    }
  </style>

</head>

@extends('layouts.app')
        @section('content')

      
    <div class="container mx-auto px-4 text-center mb-8">
        <h1 class="text-2xl font-bold">Beli Rumah</h1>
            <p class="text-gray-600">Telusuri beragam pilihan rumah yang sesuai dengan kebutuhan dan budget Anda</p>
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
    

    


    <div class="grid grid-cols-1 md:grid-cols-4 gap-x-4 gap-y-6 justify-center mt-2 container-fluid">
        @foreach($rumah as $item)
        <div class="bg-white shadow-md rounded-md">
          <div class="relative">
              <img src="{{ asset('images/' .$item->img) }}" class="card-img-top" alt="{{ $item->img }}" style="height: 250px">
              <!-- Favorite icon -->
              <button class="absolute top-2 right-2 text-red-500 hover:text-red-700" style="font-size: 20px;" onclick="addToFavorites({{ $item->id }})">
                  <i class="fas fa-heart"></i>
              </button>
          </div>
          <div class="p-4 text-center">
              <h5 class="text-lg font-bold">{{ $item->nama_rumah}}</h5>
              <p class="text-gray-600">{{ $item->informasi }}</p>
              <p class="text-xl font-bold mt-2">Harga: Rp.{{ number_format($item->harga, 2) }}</p>
              <div class="mt-4">
                  <a href="{{ route('rumah1',$item->id) }}" class="rounded-md btn btn-success w-100">Lihat Detail</a>
              </div>
          </div>
      </div>
      
        @endforeach
    </div>


    @endsection


    @section('addScript')
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <script>
      // Function to handle adding item to cart
      function addToFavorites(productId) {
          // alert(productId)
          // Get CSRF token value from the meta tag
          var csrfToken = $('meta[name="csrf-token"]').attr('content');
          
          // Send Ajax request to server
          $.ajax({
              url: '/add_favorite/' + productId, // Ganti dengan URL endpoint API yang sesuai
              type: 'POST',
              data: {_token: csrfToken}, // Sertakan token CSRF dalam data
              success: function(response) {
                  // Tampilkan notifikasi bahwa item telah ditambahkan ke keranjang
                  toastr.options.toastClass = 'bg-success'; 
                  toastr.success('Item berhasil ditambahkan ke daftar favorite!');
              },
              error: function(xhr, status, error) {
                  // Tampilkan pesan error jika terjadi kesalahan
                  toastr.options.toastClass = 'bg-danger'; 
                  toastr.error('Tidak dapat menambahkan item ke daftar favorite!');
              }
          });
      }
    </script>
    @endsection
    