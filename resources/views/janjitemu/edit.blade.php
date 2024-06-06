@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Edit Janji Temu</h2>
    <form action="{{ route('janjitemu.update', $janjiTemu->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" id="nama" class="form-control" value="{{ $janjiTemu->nama }}" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $janjiTemu->email }}" required>
        </div>
        <div class="mb-3">
            <label for="telepon" class="form-label">Telepon</label>
            <input type="text" name="telepon" id="telepon" class="form-control" value="{{ $janjiTemu->telepon }}" required>
        </div>
        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal</label>
            <input type="date" name="tanggal" id="tanggal" class="form-control" value="{{ $janjiTemu->tanggal }}" required>
        </div>
        <div class="mb-3">
            <label for="jam" class="form-label">Jam</label>
            <input type="time" name="jam" id="jam" class="form-control" value="{{ $janjiTemu->jam }}" required>
        </div>
        <div class="mb-3">
            <label for="pesan" class="form-label">Pesan</label>
            <textarea name="pesan" id="pesan" class="form-control" required>{{ $janjiTemu->pesan }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
