@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <!-- Left side: Form -->
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header bg-success text-white">
                    <h4>Buat Janji Temu</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('janji-temu.store') }}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="nama" class="form-label">Nama:</label>
                            <input type="text" name="nama" id="nama" class="form-control" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" name="email" id="email" class="form-control" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="telepon" class="form-label">Telepon:</label>
                            <input type="text" name="telepon" id="telepon" class="form-control" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="property" class="form-label">Pilihan Property:</label>
                            <select name="property" id="property" class="form-select" required>
                                <option value="property1">Rumah Podomoro</option>
                                <option value="property2">Rumah Pesona Bali</option>
                                <option value="property3">Rumah PBB</option>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="tanggal" class="form-label">Tanggal Janji Temu:</label>
                            <input type="date" name="tanggal" id="tanggal" class="form-control" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="jam" class="form-label">Jam Janji Temu:</label>
                            <input type="time" name="jam" id="jam" class="form-control" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="pesan" class="form-label">Pesan:</label>
                            <textarea name="pesan" id="pesan" class="form-control" required></textarea>
                        </div>

                        <input type="hidden" name="agen_id" value="{{ $agen->id }}">

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-success " style="background-color: green">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Right side: Agent's photo -->
        <div class="col-md-4 d-flex align-items-center">
            <img src="{{ asset('IMG/Agen/' . $agen->foto_agen) }}" class="img-fluid" alt="Agen Image" style="border-radius: 20px; object-fit: cover;">
        </div>
    </div>
</div>
@endsection
