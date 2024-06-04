<!-- Content -->

<!-- Bootstrap JS and dependencies (Popper.js) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>

@extends('layouts.admin_beranda')
@section('content')

<div class="content">
    <div class="title" style="margin-top:36px; display: flex; justify-content: space-between; align-items: center;">
        <h1 style="font-size:36px">Furniture</h1>
    </div>

    <div class="row mt-5">
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div>
                        <i class="fas fa-table me-1"></i>
                        Data Furniture
                    </div>

                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" id="tambah_data_baru">
                        <i class="fas fa-plus"></i>
                        Tambah Data
                    </button>

                </div>

                <table class="table table-bordered">
                    <tr>
                        <th>Gambar</th>
                        <th>Nama Furniture</th>
                        <th>Harga</th>
                        <th>Deskripsi</th>
                        <th width="280px">Action</th>
                    </tr>
                    @foreach ($furnitures as $item)
                    <tr>
                        <td><img src="{{ asset('images/' . $item->img) }}" class="img-fluid" alt="{{ $item->img }}" style="max-height: 250px; object-fit: cover;"></td>
                        <td>{{ $item->nama_furniture }}</td>
                        <td>{{ $item->harga }}</td>
                        <td>{{ $item->deskripsi }}</td>
                        <td>
                            <form action="{{ route('furnitures.destroy', $item->id) }}" method="POST">
                                <button type="button" class="btn btn-info btn-edit" data-id={{ $item->id }} data-img={{ $item->img }} data-nama_furniture={{ $item->nama_furniture }} data-harga={{ $item->harga }} data-deskripsi={{ $item->deskripsi }} data-bs-toggle="modal" data-bs-target="#editModal">
                                    Edit
                                </button>

                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>

            <!-- Modal untuk mengedit data furniture -->
            <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel">Edit Data Furniture</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="editForm" action="#" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="edit_img" class="form-label">Gambar</label>
                                    <input type="file" class="form-control" id="edit_img" name="img">
                                </div>
                                <div class="mb-3">
                                    <label for="edit_nama_furniture" class="form-label">Nama Furniture</label>
                                    <input type="text" class="form-control" id="edit_nama_furniture" name="nama_furniture">
                                </div>
                                <div class="mb-3">
                                    <label for="edit_harga" class="form-label">Harga</label>
                                    <input type="number" class="form-control" id="edit_harga" name="harga">
                                </div>
                                <div class="mb-3">
                                    <label for="edit_deskripsi" class="form-label">Deskripsi</label>
                                    <input type="text" class="form-control" id="edit_deskripsi" name="deskripsi">
                                </div>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal untuk tambah  data Furniture -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Data Furniture</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h3>Create New Furniture</h3>
                            <form action="{{ route('furnitures.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <strong>Gambar:</strong>
                                    <input type="file" name="img" class="form-control" placeholder="img">
                                </div>
                                <div class="form-group">
                                    <strong>Nama Furniture :</strong>
                                    <input type="text" name="nama_furniture" class="form-control" placeholder="Nama Furniture">
                                </div>
                                <div class="form-group">
                                    <strong>Harga :</strong>
                                    <input type="number" name="harga" class="form-control" placeholder="Harga">
                                </div>
                                <div class="form-group">
                                    <strong>Deskripsi:</strong>
                                    <input type="text" name="deskripsi" class="form-control" placeholder="Deskripsi">
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>

                <script>
                    $(document).on('click', '.btn-edit', function() {
                        var id = $(this).data('id');
                        var img = $(this).data('img');
                        var nama_furniture = $(this).data('nama_furniture');
                        var harga = $(this).data('harga');
                        var deskripsi = $(this).data('deskripsi');

                        $('#editForm').attr('action', '/furnitures/' + id); // Set action form dengan URL update yang sesuai
                        $('#edit_img').val('');
                        $('#edit_nama_furniture').val(nama_furniture); // Set nilai input nama dengan nilai nama yang sesuai
                        $('#edit_harga').val(harga); // Set nilai input harga dengan nilai harga yang sesuai
                        $('#edit_deskripsi').val(deskripsi); // Set nilai input deskripsi dengan nilai deskripsi yang sesuai

                        $('#editModal').modal('show'); // Menampilkan modal
                    });
                </script>

@endsection
