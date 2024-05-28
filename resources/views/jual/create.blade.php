@extends('layouts.layout')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Tambah Properti Baru</h2>

    <form action="{{ route('jual.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="judul">Judul</label>
            <input type="text" name="judul" class="form-control" id="judul" required>
        </div>
        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea name="deskripsi" class="form-control" id="deskripsi" rows="4" required></textarea>
        </div>
        <div class="form-group">
            <label for="lokasi">Lokasi</label>
            <input type="text" name="lokasi" class="form-control" id="lokasi" required>
        </div>
        <div class="form-group">
            <label for="harga">Harga</label>
            <input type="number" name="harga" class="form-control" id="harga" required>
        </div>
        <div class="form-group">
            <label for="kamar_tidur">Jumlah Kamar Tidur</label>
            <input type="number" name="kamar_tidur" class="form-control" id="kamar_tidur" required>
        </div>
        <div class="form-group">
            <label for="kamar_mandi">Jumlah Kamar Mandi</label>
            <input type="number" name="kamar_mandi" class="form-control" id="kamar_mandi" required>
        </div>
        <div class="form-group">
            <label for="garasi">Jumlah Garasi</label>
            <input type="number" name="garasi" class="form-control" id="garasi" required>
        </div>
        <div class="form-group">
            <label for="images">Gambar</label>
            <input type="file" name="images[]" class="form-control-file" id="images" multiple required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
