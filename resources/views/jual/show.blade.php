@extends('layouts.app')
@section('content')
<div class="container mt-5">
    <div class="title" style="background-color: #E3FBCC; display: flex; align-items: center; padding:16px; border-radius:20px; margin-bottom:24px; max-width:25%">
        <i class="fas fa-home text-center" aria-hidden="true" style="margin-right: 10px; color:green"></i>
        <h5 class="text-center" style="margin: 0; color:green; ">{{ $jual->judul }}</h5>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    @foreach($jual->images as $image)
                    <div class="carousel-item @if ($loop->first) active @endif">
                        <img class="d-block w-100" src="{{ asset('images/' . $image->image_path) }}" alt="Gambar Properti">
                    </div>
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <div class="col-md-4">
            <ul class="list-group mb-4">
                <li class="list-group-item"><strong>Lokasi:</strong> {{ $jual->lokasi }}</li>
                <li class="list-group-item"><strong>Deskripsi:</strong> {{ $jual->deskripsi }}</li>
                <li class="list-group-item"><strong>Harga:</strong> Rp{{ number_format($jual->harga, 0, ',', '.') }}</li>
                <li class="list-group-item"><strong>Kamar Tidur:</strong> {{ $jual->kamar_tidur }}</li>
                <li class="list-group-item"><strong>Kamar Mandi:</strong> {{ $jual->kamar_mandi }}</li>
                <li class="list-group-item"><strong>Garasi:</strong> {{ $jual->garasi }}</li>
            </ul>

            <div class="accordion" id="faqAccordion">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h2 class="mb-0">
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                FAQ 1
                            </button>
                        </h2>
                    </div>

                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#faqAccordion">
                        <div class="card-body">
                            Jawaban untuk FAQ 1.
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingTwo">
                        <h2 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                FAQ 2
                            </button>
                        </h2>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#faqAccordion">
                        <div class="card-body">
                            Jawaban untuk FAQ 2.
                        </div>
                    </div>
                </div>
                <!-- Tambahkan FAQ lainnya di sini -->
            </div>
        </div>
    </div>
</div>
@endsection
