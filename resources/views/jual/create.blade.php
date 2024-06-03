@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="title" style="background-color: #E3FBCC; display: flex; align-items: center; padding:16px; border-radius:20px; margin-bottom:24px; max-width:25%">
        <i class="fas fa-home text-center" aria-hidden="true" style="margin-right: 10px; color:green"></i>
        <h5 class="text-center" style="margin: 0; color:green; ">TAMBAH PROPERTY BARU</h5>
    </div>
    <form action="{{ route('jual.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="judul">Judul</label>
            <input type="text" class="form-control" id="judul" name="judul" required>
        </div>
        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required></textarea>
        </div>
        <div class="form-group">
            <label for="lokasi">Lokasi</label>
            <input type="text" class="form-control" id="lokasi" name="lokasi" required>
        </div>
        <div class="form-group">
            <label for="harga">Harga</label>
            <input type="text" class="form-control" id="harga" name="harga" required>
        </div>
        <div class="form-group">
            <label for="kamar_tidur">Jumlah Kamar Tidur</label>
            <input type="number" class="form-control" id="kamar_tidur" name="kamar_tidur" required>
        </div>
        <div class="form-group">
            <label for="kamar_mandi">Jumlah Kamar Mandi</label>
            <input type="number" class="form-control" id="kamar_mandi" name="kamar_mandi" required>
        </div>
        <div class="form-group">
            <label for="garasi">Jumlah Garasi</label>
            <input type="number" class="form-control" id="garasi" name="garasi" required>
        </div>
        <div class="form-group">
            <label for="images">Gambar</label>
            <input type="file" class="form-control" id="images" name="images[]" multiple required>
        </div>
        <button type="submit" class="btn btn-primary" style="background-color: #4BA30D;">Simpan</button>
    </form>
</div>
@endsection
