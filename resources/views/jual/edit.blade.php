<!-- resources/views/jual/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Edit Properti</h1>
    <form action="{{ route('jual.update', $jual->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama_properti">Nama Properti</label>
            <input type="text" name="nama_properti" class="form-control" id="nama_properti" value="{{ $jual->nama_properti }}" required>
        </div>
        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea name="deskripsi" class="form-control" id="deskripsi" required>{{ $jual->deskripsi }}</textarea>
        </div>
        <div class="form-group">
            <label for="lokasi">Lokasi</label>
            <input type="text" name="lokasi" class="form-control" id="lokasi" value="{{ $jual->lokasi }}" required>
        </div>
        <div class="form-group">
            <label for="harga">Harga</label>
            <input type="text" name="harga" class="form-control" id="harga" value="{{ $jual->harga }}" required>
        </div>
        <div class="form-group">
            <label for="images">Foto Properti</label>
            <input type="file" name="images[]" class="form-control" id="images" multiple>
        </div>
        <button type="submit" class="btn btn-primary" style="background-color: #4BA30D;">Perbarui</button>
    </form>
@endsection
