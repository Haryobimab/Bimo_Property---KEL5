
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Beli Ruko</title>
  <link rel="stylesheet" href="styles.css">
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

@extends('layouts.app')
        @section('content')

      
    <div class="container mx-auto px-4 text-center mb-8">
        <h1 class="text-2xl font-bold">Beli Ruko</h1>
            <p class="text-gray-600">Telusuri beragam pilihan ruko yang sesuai dengan kebutuhan Anda</p>
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
    



    <div class="grid grid-cols-1 md:grid-cols-3 gap-x-8 gap-y-6 justify-center">
        @foreach($belirukos as $ruko)
        <div class="bg-white shadow-md rounded-md overflow-hidden m-2 max-w-xs">
            <img src="{{ asset('images/' .$ruko->img) }}" class="card-img-top" alt="{{ $ruko->img }}" style="height: 250px">
            <div class="p-4 text-center">
                <h5 class="text-lg font-bold">{{ $ruko->nama_ruko}}</h5>
                <p class="text-gray-600">{{ $ruko->informasi }}</p>
                <p class="text-xl font-bold mt-2">Harga: Rp.{{ number_format($ruko->harga, 2) }}</p>
                <div class="mt-4">
                    <a href="{{ route('ruko', $ruko->id)}}"
                        class="rounded-md btn btn-success w-100">Lihat
                        Detail</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endsection
    
    
