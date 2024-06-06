{{-- page for reschedule --}}

@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Reschedule Janji Temu</h2>
    <form action="{{ route('janji-temu.reschedule', $janjiTemu->id) }}" method="POST">
        @csrf
        @method('POST   ')
        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal</label>
            <input type="date" name="tanggal" id="tanggal" class="form-control" value="{{ $janjiTemu->tanggal }}" required>
        </div>
        <div class="mb-3">
            <label for="jam" class="form-label">Jam</label>
            <input type="time" name="jam" id="jam" class="form-control" value="{{ $janjiTemu->jam }}" required>
        </div>
        <button type="submit" class="btn btn-outline-primary">Reschedule</button>
    </form>

    <form action="{{ route('janji-temu.cancel', $janjiTemu->id) }}" method="POST" style="display:inline;">
        @csrf
        <button type="submit" class="btn btn-outline-danger">Cancel</button>

    </form>
</div>
@endsection