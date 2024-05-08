<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ asset('css/ulasan.css') }}">

  {{-- CKEditor CDN --}}
  <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<center>

  <body>
    @extends('layouts.app')
    @section('content')
      <main>
        <section class="ulasan-pengguna ">
          <h1>Ulasan Pengguna</h1>
          <p>Dengan fitur ini, pengguna dapat berbagi pengalaman, pandangan, dan penilaian mereka terhadap suatu produk,
            layanan, atau pengalaman</p>
        </section>
      </main>
      <form action="{{ route('ulasan.store') }}" method="POST">
      <!-- <form action="daftar_ulasan/store" method="POST"> -->
        @csrf
        <div class="row">
          <div class="col-xl-8 col-lg-8 col-sm-12 col-12 m-auto">
            @if (Session::has('success'))
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">×</button>
                {{ Session::get('success') }}
              </div>
            @elseif(Session::has('failed'))
              <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">×</button>
                {{ Session::get('failed') }}
              </div>
            @endif
            <div class="card shadow">
              <div class="card-header">
                <h4 class="card-title">Isi Ulasanmu dibawah sini</h4>
              </div>
              <div class="card-body">
                <style>
                  .form-group label {
                    text-align: left;
                    display: block;
                    /* Membuat label menjadi blok agar rata kiri */
                  }
                </style>
                <div class="form-group">
                  <label>Judul</label>
                  <input type="text" class="form-control" name="title" placeholder="Enter the Title">
                </div>
                <div class="form-group">
                  <label>Konten</label>
                  <textarea class="form-control" id="body" placeholder="Enter the Description" name="body"></textarea>
                </div>
                <div class="card-footer" style="text-align: right;">
                  <a href="{{ route('ulasan.create') }}" class="btn btn-success" id="cancelBtn">Cancel</a>
                  <button type="submit" class="btn btn-success" id="saveBtn">Save</button>
                </div>
              </div>
            </div>
          </div>
        </div>
        </div>
      </form>
      </div>

      <script>
        ClassicEditor
          .create(document.querySelector('#body'))
          .catch(error => {
            console.error(error);
          });
      </script>

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>

      <script>
        // Menambahkan event listener pada tombol Cancel
        document.getElementById("cancelBtn").addEventListener("click", function(event) {
          event.preventDefault(); // Menghentikan aksi default dari link

          // Menampilkan SweetAlert
          Swal.fire({
            title: 'Konfirmasi',
            text: 'Apakah kamu yakin ingin membatalkan?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, batalkan',
            cancelButtonText: 'Tidak'
          }).then((result) => {
            if (result.isConfirmed) {
              // Jika pengguna mengklik "Ya, batalkan", arahkan ke halaman beranda
              window.location.href = "{{ route('ulasan.create') }}";
            }
          });
        });
      </script>

      <script>
        // Menambahkan event listener pada tombol Save
        document.getElementById("saveBtn").addEventListener("click", function(event) {
          event.preventDefault(); // Menghentikan aksi default dari tombol submit

          // Menampilkan SweetAlert konfirmasi
          Swal.fire({
            title: 'Konfirmasi',
            text: 'Apakah kamu yakin ingin menyimpan ulasan?',
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, simpan',
            cancelButtonText: 'Tidak, batalkan'
          }).then((result) => {
            if (result.isConfirmed) {
              // Menampilkan SweetAlert notifikasi setelah pengguna mengklik "Ya, simpan"
              setTimeout(function() {
                Swal.fire({
                  position: "center",
                  icon: "success",
                  title: "Ulasan berhasil disimpan",
                  showConfirmButton: false,
                  timer: 30000
                });
              }, 1000);
              // Jika pengguna mengklik "Ya, simpan", tunggu sebentar dan arahkan ke halaman daftar ulasan
              //   setTimeout(function() {
              // window.location.href = "{{-- route('daftar_ulasan') --}}";
              //   }, 3000);

              // Jika pengguna mengklik "Ya, simpan", submit form
              setTimeout(function() {
                document.querySelector("form").submit();
              }, 5000);
            }
          });
        });

        //masih belum selesai
      </script>

    </body>
  </center>

  </html>
@endsection