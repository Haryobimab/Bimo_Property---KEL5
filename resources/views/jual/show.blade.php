<!-- resources/views/jual/show.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>{{ $jual->nama_properti }}</h1>
    <p>{{ $jual->deskripsi }}</p>
    <p>Lokasi: {{ $jual->lokasi }}</p>
    <p>Harga: {{ $jual->harga }}</p>
    <div>
        <h3>Foto Properti:</h3>
        @foreach($jual->images as $image)
            <img src="{{ Storage::url($image->image_path) }}" width="200" height="200" alt="{{ $jual->nama_properti }}">
        @endforeach
    </div>
    <div>
        <h3>Komentar:</h3>
        <form action="{{ route('comments.store', $jual->id) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="comment">Komentar:</label>
                <textarea name="comment" class="form-control" id="comment" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary" style="background-color: #4BA30D;">Tambahkan Komentar</button>
        </form>
        <div class="mt-3">
            @foreach($jual->comments as $comment)
                <div class="card mt-2">
                    <div class="card-body">
                        <p>{{ $comment->comment }}</p>
                        <small>Ditulis oleh: {{ $comment->user->name }} pada {{ $comment->created_at }}</small>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
