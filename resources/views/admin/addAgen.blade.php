@extends('layouts.admin_beranda')
@section('content')
<style>
    .form-group {
        max-width: 80%;
    }
    .form-control {
        border-color: #D2D6DB; /* Atur border bawah default */
        transition: border-bottom-color 0.3s; /* Efek transisi untuk perubahan warna border */
    }
    .form-control:focus {
        border-color: green; /* Ubah warna border menjadi hijau saat input diberi fokus */
    }
</style>
<div class="container mt-5" style="margin-left:320px">
    <h1>Tambah Agen Baru</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.storeAgen') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="nama_agen">Nama Agen</label>
            <input type="text" class="form-control" id="nama_agen" name="nama_agen" required>
        </div>
        <div class="form-group">
            <label for="deskripsi_agen">Deskripsi Agen</label>
            <textarea class="form-control" id="deskripsi_agen" name="deskripsi_agen" rows="2" required></textarea>
        </div>
        <div class="form-group">
            <label for="foto_agen">Foto Agen</label>
            <input type="file" class="form-control" id="foto_agen" name="foto_agen" required>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" required>
        </div>
        <div class="row">
            
            <div class="col-md-3">
                <div class="form-group">
                    <label for="no_telp">No Telp</label>
                    <input type="text" class="form-control" id="no_telp" name="no_telp" required>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="no_telp">Rating</label>
                    <input type="number" class="form-control" id="rating" name="rating" step="0.1" min="0" max="5" required>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary" style="background-color:green">Tambah Agen</button>
    </form>
</div>

<script>
    // Munculkan pop-up saat tombol tambah agen ditekan
    document.getElementById('addAgenForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Hindari pengiriman form
        alert('Penambahan agen berhasil!'); // Tampilkan pop-up
        this.submit(); // Kirim form setelah menampilkan pop-up
    });
</script>
@endsection
