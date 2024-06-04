@extends('layouts.app')
@section('content')
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Award</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container" style="background-color:#F3FEE7; padding:32px; margin-top:32px; max-width:2800px">
        <div class="row">
            <div class="col-md-8 text-container">
                <div class="title" style="display: flex; justify-content: space-between;">
                    @if ($topAward)
                        <h2 style="font-size: 25px; font-weight:bold;">Selamat Kepada Agen {{ $topAward->nama_agen }}</h2>
                    @endif
                </div>
                @if ($topAward)
                    <p style="margin-top: 10px;">
                        {{ $topAward->nama_agen }} telah menjadi agen terpopuler dan paling terpercaya berkat dedikasi serta komitmen tinggi dalam memberikan pelayanan yang berkualitas dan solusi properti yang tepat untuk setiap klien. Dengan reputasi yang solid dan jejak rekam yang mengesankan, {{ $topAward->nama_agen }} telah memenangkan kepercayaan pelanggan.
                    </p>
                @endif
                <div class="biodata">
                    <!-- Biodata content here -->
                </div>
            </div>
            <div class="col-md-4 img-container" >
                <img src="IMG/otri.jpg" alt="Agen Terpopuler" style="width:200px" >
            </div>
        </div>
    </div>
    
        <div class="row justify-content-center" style="margin-top: 24px;">
            <div class="col-md-8">
                <div class="card" style="border: none;">
                    <div class="card-body">
                        <h1 class="text-center" style="margin-top: 10px;">Leaderboard</h1>
                        <table class="table mx-auto">
                            <thead>
                            <tr>
                                <th scope="col" class="text-center">Peringkat</th>
                                <th scope="col" class="text-center">Nama Agen</th>
                                <th scope="col" class="text-center">Lokasi Agen</th>
                                <th scope="col" class="text-center">Terjual</th>
                                <th scope="col" class="text-center">Poin</th>
                                <th scope="col" class="text-center">Rating</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($awards as $item)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td> <!-- Menambahkan nomor otomatis -->
                                    <td class="text-center">{{ $item->nama_agen }}</td>
                                    <td class="text-center">{{ $item->lokasi }}</td>
                                    <td class="text-center">{{ $item->terjual }} Properti</td>
                                    <td class="text-center"><i  class="fas fa-star" style="color: green; margin-right: 5px;"></i> {{ $item->poin }}</td>
                                    <td class="text-center">
                                        <p style="background-color: #FEF0C7; color: #DC6803; border-radius: 12px; display: inline-block; padding: 5px 10px;">
                                            {{ $item->rating }}
                                        </p>
                                    </td>
                                </tr>
                            @endforeach
                            <!-- Tambahkan baris data agen sesuai kebutuhan -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>
    </html>
    
    @endsection