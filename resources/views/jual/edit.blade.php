@extends('layouts.layout')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Edit Properti</h2>

    <form action="{{ route('jual.update', $jual->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="judul">Judul</label>
            <input type="text" name="judul" class="form-control" id="judul" value="{{ $jual->judul }}" required>
        </div>

        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea name="deskripsi" class="form-control" id="deskripsi" rows="4" required>{{ $jual->deskripsi }}</textarea>
        </div>

        <div class="form-group">
            <label for="lokasi">Lokasi</label>
            <input type="text" name="lokasi" class="form-control" id="lokasi" value="{{ $jual->lokasi }}" required>
        </div>

        <div class="form-group">
            <label for="harga">Harga</label>
            <input type="number" name="harga" class="form-control" id="harga" value="{{ $jual->harga }}" required>
        </div>

        <div class="form-group">
            <label for="kamar_tidur">Jumlah Kamar Tidur</label>
            <input type="number" name="kamar_tidur" class="form-control" id="kamar_tidur" value="{{ $jual->kamar_tidur }}" required>
        </div>

        <div class="form-group">
            <label for="kamar_mandi">Jumlah Kamar Mandi</label>
            <input type="number" name="kamar_mandi" class="form-control" id="kamar_mandi" value="{{ $jual->kamar_mandi }}" required>
        </div>

        <div class="form-group">
            <label for="garasi">Jumlah Garasi</label>
            <input type="number" name="garasi" class="form-control" id="garasi" value="{{ $jual->garasi }}" required>
        </div>

        <div class="form-group">
            <label for="images">Gambar</label>
            <input type="file" name="images[]" class="form-control-file" id="images" multiple>
        </div>

        <div class="form-group">
            <label>Gambar Saat Ini</label>
            <div class="row">
                @foreach($jual->images as $image)
                <div class="col-md-3 mb-2">
                    <img src="{{ asset('images/' . $image->image_path) }}" class="img-fluid">
                </div>
                @endforeach
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
