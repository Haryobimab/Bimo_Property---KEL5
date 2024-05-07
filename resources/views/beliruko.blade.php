<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>beli Ruko</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

@extends('layouts.app')
@section('content')

<body>
    <div class="container mt-5">
        <h2 class="mb-4">Penjualan Ruko</h2>
        <div class="row">
            @foreach($belirukos as $ruko)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ asset($ruko->gambar) }}" class="card-img-top" alt="{{ $ruko->Gambar }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $ruko->Namaruko}}</h5>
                        <p class="card-text">{{ $ruko->informasi }}</p>
                        <p class="card-text">Harga: Rp.{{ number_format($ruko->harga, 2) }}</p>
                        <a href="#" class="btn btn-primary">Beli</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</body>
</html>
@endsection
    