<!-- resources/views/jual/index.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Daftar Properti</h1>
    <a href="{{ route('jual.create') }}" class="btn btn-primary" style="background-color: #4BA30D;">Tambah Properti</a>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>Nama Properti</th>
                <th>Lokasi</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($juals as $jual)
            <tr>
                <td>{{ $jual->nama_properti }}</td>
                <td>{{ $jual->lokasi }}</td>
                <td>{{ $jual->harga }}</td>
                <td>
                    <a href="{{ route('jual.edit', $jual->id) }}" class="btn btn-primary" style="background-color: #4BA30D;">Edit</a>
                    <form action="{{ route('jual.destroy', $jual->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
