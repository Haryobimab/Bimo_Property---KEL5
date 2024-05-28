<head>
    <!-- Other head content -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        .input-group .form-control {
            border-radius: 0;
        }

        .input-group .form-control::placeholder {
            font-style: italic;
        }

        .input-group .input-group-text {
            background-color: transparent;
            border: none;
        }

        .input-group .btn-outline-secondary {
            border-radius: 0;
        }

        .input-group-append .btn {
            border-top-left-radius: 0;
            border-bottom-left-radius: 0;
        }

        .input-group .input-group-prepend {
            display: flex;
        }

        .input-group-prepend .input-group-text {
            background-color: #fff;
            border-right: 0;
            border-radius: 0;
        }

       
    </style>
</head>
@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <p class="text-center" style="color:green">| C A R I  A G E N |</p>
        <h1 class="text-center" style="font-size:28px; margin-bottom:24px">Temukan mitra properti yang sempurna untuk mewujudkan impian Anda</h1>
        <div class="col-md-8">
            <form method="GET" action="{{ route('agen.cariagen') }}">
                <div class="input-group mb-3">
                    <input type="text" name="search" class="form-control" placeholder="Search agents" value="{{ $search }}" >
                    <select name="region" class="form-control">
                        <option value="">All Region</option>
                        <option value="Jakarta" {{ $region == 'Jakarta' ? 'selected' : '' }}>Jakarta</option>
                        <option value="Bandung" {{ $region == 'Bandung' ? 'selected' : '' }}>Bandung</option>
                        <option value="Yogyakarta" {{ $region == 'Yogyakarta' ? 'selected' : '' }}>Yogyakarta</option>
                        <!-- Add more regions as needed -->
                    </select>
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-outline-secondary">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row mt-4">
        @foreach($agens as $agen)
            <div class="col-md-4">
                <div class="card mb-4" style="background-color:#FAFEF5; border:none">
                    <div class="card-body">
                        <img src="{{ asset('IMG/Agen/' .  $agen->foto_agen) }}" alt="foto agen" style="width:480px; height:320px;  object-fit: cover; margin-bottom:20px">
                        <h5 class="card-title" style="font-size:24px">{{ $agen->nama_agen }}</h5>
                        <p class="card-text" style="font-size:16px; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis; margin-bottom:12px; color:#8C8F93">{{ $agen->deskripsi_agen }}</p>
                        <p class="card-text" style="font-size:16px; margin-bottom:20px">{{ $agen->alamat }}</p>
                        <div class="rating" style="background-color:#E3FBCC; max-width:25%; padding:8px; margin:12px; border-radius:12px; display: flex; flex-direction: row;">
                            <i class="fas fa-star" style="margin-right:20px; color:green"></i>
                            <p class="card-text text-center" style=" color:green"> {{ $agen->rating }}</p>
                        </div>
                        <a href="{{ route('agen.detailagen', $agen->id) }}" class="btn btn-primary" style="background-color:green">Lihat Detail Agen</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
