@extends('layouts.admin_beranda')

@section('addStyle')

<link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.bootstrap4.css">

@endsection

@section('content')
<!-- Main Content -->

<div class="content">
        <div class="title" style="margin-top:36px">
            <h1 class="text-center">Tambah Data Ruko</h1>
            
        </div>
        <div class="row mt-5">
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div>
                            <i class="fas fa-table me-1"></i>
                            Data Ruko
                        </div>
    
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"
                            id="tambah_data_baru">
                            <i class="fas fa-plus"></i>
                            Tambah Data
                        </button>
    
                    </div>
    
    
    
                    <div class="card-body">

                        @if (Session::has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ Session::get('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                        </div>
                    @endif

                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Gambar Ruko</th>
                                    <th>Nama Ruko</th>
                                    <th>Harga</th>
                                    <th>Lokasi</th>
                                    <th>Jumlah Kamar</th>
                                    <th>Jumlah Kamar Mandi</th>
                                    <th>Jumlah Parkir</th>
                                    <th>Aksi</th>
    
    
                                </tr>
                            </thead>
    
                           <tbody>
                            @foreach ($ruko as $item)
                            <tr>
                                <td>
                                    <img src="{{ asset('/') }}images/{{ $item->img }}"
                                    alt="" width="200" height="200">
                                </td>
                                <td>{{ $item->nama_ruko }}</td>
                                <td>{{ $item->harga }}</td>
                                <td>{{ $item->lokasi }}</td>
                                <td>{{ $item->jumlah_kamar }}</td>
                                <td>{{ $item->jumlah_kamar_mandi }}</td>
                                <td>{{ $item->jumlah_parkir }}</td>

                                <td>
                                    <button class="btn btn-warning btn-sm mb-2 ubah-data" id="ubah-data"
                                    data-toggle="modal" data-target="#exampleModal"
                                    data-id="{{ $item->id }}"><i class="fas fa-pen"></i></button>

                                    <a href="{{ route('admin.destroy_ruko', $item->id) }}"
                                    class="btn btn-danger btn-sm mb-2"><i class="fas fa-trash"></i></a>
                                </td>

                            </tr>
                            @endforeach
                           
                           </tbody>
                        </table>
                    </div>
                </div>
            </div>
          
                
        </div>
    </div>


    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Ruko</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                </div>
                <div class="modal-body">



                    <form action="" method="POST" id="add_client" enctype="multipart/form-data">
                        @csrf

                        <div>
                            <img src="https://alppetro.co.id/dist/assets/images/default.jpg" alt="" id="preview_img"
                                width="100%" height="500">
                        </div>


                        <div class="mb-3">
                            <label for="img" class="form-label">Gambar Ruko</label>
                            <input type="file" class="form-control" id="img" name="img"
                                accept="image/jpeg, image/png, image/gif" required>

                        </div>

                        <div class="form-group">
                            <label for="nama_ruko">Nama Ruko:</label>
                            <input type="text" class="form-control" id="nama_ruko" name="nama_ruko" required>
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga:</label>
                            <input type="number" class="form-control" id="harga" name="harga" required>
                        </div>
                        <div class="form-group">
                            <label for="lokasi">Lokasi:</label>
                            <input type="text" class="form-control" id="lokasi" name="lokasi" required>
                        </div>
                        <div class="form-group">
                            <label for="jumlah_kamar">Jumlah Kamar:</label>
                            <input type="number" class="form-control" id="jumlah_kamar" name="jumlah_kamar" required>
                        </div>
                        <div class="form-group">
                            <label for="jumlah_kamar_mandi">Jumlah Kamar Mandi:</label>
                            <input type="number" class="form-control" id="jumlah_kamar_mandi" name="jumlah_kamar_mandi" required>
                        </div>
                        <div class="form-group">
                            <label for="jumlah_parkir">Jumlah Parkir:</label>
                            <input type="number" class="form-control" id="jumlah_parkir" name="jumlah_parkir" required> 
                        </div>

                        <div class="form-group">
                            <label for="jumlah_parkir">Deskripsi:</label>
                            <textarea name="informasi" id="informasi" class="form-control" cols="30" rows="10" required></textarea>
                        </div>


                        

                        <div id="tambahan_update">

                        </div>


                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary" form="add_client">Simpan</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('addScript')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>

<script src="https://cdn.datatables.net/2.0.7/js/dataTables.bootstrap4.js"></script>

<script>
    new DataTable('#example');
</script>

<script>
    $(document).ready(function() {
        $('#img').on('change', function() {
            var input = this;
            var maxFileSize = 5 * 1024 * 1024; // Batas maksimum adalah 5MB (dalam byte).

            if (input.files && input.files[0]) {
                var fileSize = input.files[0].size;

                if (fileSize > maxFileSize) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Ukuran gambar terlalu besar',
                        text: 'Maksimum 5MB diizinkan.',
                    });

                    // Reset input file
                    $(this).val('');
                } else {
                    var input = this;
                    var previewImg = $('#preview_img');

                    if (input.files && input.files[0]) {
                        var reader = new FileReader();

                        reader.onload = function(e) {
                            // Mengatur atribut src dari elemen img untuk menampilkan gambar yang dipilih
                            previewImg.attr('src', e.target.result);
                        };

                        // Membaca gambar yang dipilih sebagai URL data
                        reader.readAsDataURL(input.files[0]);
                    } else {
                        // Menghapus gambar yang ada di preview jika tidak ada gambar yang dipilih
                        previewImg.attr('src', '');
                    }
                }
            }

        });
    });
</script>




<script>
    $(document).ready(function() {
        $(".ubah-data").click(function(e) {
            e.preventDefault();

            const dataId = $(this).data("id");

            $.ajax({
                url: "/admin/get_ruko_by_id/" + dataId, // Ganti dengan URL yang sesuai
                type: "GET",
                success: function(response) {
                    // Response adalah data JSON yang dikirim oleh server
                    if (response.ruko) {

                        $("#img").removeAttr("required");
                        $("#exampleModalLabel").text("Edit Data Ruko");
                        $("#add_client").attr("action", "/admin/update_ruko/" + dataId);

                        var img =
                                "{{ asset('/') }}images/" +
                                response.ruko.img;

                        $("#preview_img").attr('src', img);

                        // alert(response.ruko.nama_ruko)
                            // Isi nilai untuk input nama_ruko
                        $("#nama_ruko").val(response.ruko.nama_ruko);

                        // Isi nilai untuk input harga
                        $("#harga").val(response.ruko.harga);

                        // Isi nilai untuk input lokasi
                        $("#lokasi").val(response.ruko.lokasi);

                        // Isi nilai untuk input jumlah_kamar
                        $("#jumlah_kamar").val(response.ruko.jumlah_kamar);

                        // Isi nilai untuk input jumlah_kamar_mandi
                        $("#jumlah_kamar_mandi").val(response.ruko.jumlah_kamar_mandi);

                        // Isi nilai untuk input jumlah_parkir
                        $("#jumlah_parkir").val(response.ruko.jumlah_parkir);

                        // Isi nilai untuk textarea informasi
                        $("#informasi").val(response.ruko.informasi);

                        var input_old_img =
                                `<input type="hidden" name='old_img' value="` +
                                response.ruko.img + `"/>` // Menyalin elemen input
                            $("#tambahan_update").empty().append(input_old_img);

                    } else {
                        alert('Ruko not found');
                    }
                },
                error: function() {
                    alert('Failed to fetch client data');
                }
            });
        });
    });
</script>


<script>
    $(document).ready(function() {
                $("#tambah_data_baru").click(function() {
                        // Mengosongkan isi formulir dengan ID form_add_client
                        $("#preview_img").attr('src', "https://alppetro.co.id/dist/assets/images/default.jpg");
                        $("#add_client input[type=text]").val("");
                        $("#add_client select").val("");
                        $("#add_client textarea").val("");


                        $("


                            #tambahan_update ").empty()

                            $("#exampleModalLabel").text("Tambah Data Client"); $("#add_client").attr("action",
                                "/admin/client");
                        });
                });
</script>

@endsection