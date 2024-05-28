<!-- Content -->
    
    <!-- Bootstrap JS and dependencies (Popper.js) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>


@extends('layouts.admin_beranda')
@section('content')
    
    <<div class="content">
        <div class="title" style="margin-top:36px; display: flex; ">
            <h1 class="" style="font-size:36px">Award </h1>

        <div class="row">
            <div class="col-md-6">
            </div>
            <div class="content">
                <div class="title" style="margin-top:36px">
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


                <table class="table table-bordered">
                    <tr>
                       
                        <th>Nama Agen</th>
                        <th>Lokasi</th>
                        <th>Terjual</th>
                        <th>Poin</th>
                        <th>Rating</th>
                        <th width="280px">Action</th>
                    </tr>
                    @foreach ($awards as $award)
                    <tr>
                        
                        <td>{{ $award->nama_agen }}</td>
                        <td>{{ $award->lokasi }}</td>
                        <td>{{ $award->terjual }}</td>
                        <td>{{ $award->poin }}</td>
                        <td>{{ $award->rating }}</td>
                        <td>
                            <form action="{{ route('awards.destroy', $award->id) }}" method="POST">
                                <button type="button" class="btn btn-info btn-edit" 
                                    data-id="{{ $award->id }}" 
                                    data-nama="{{ $award->nama_agen }}" 
                                    data-lokasi="{{ $award->lokasi }}" 
                                    data-terjual="{{ $award->terjual }}"
                                    data-poin="{{ $award->poin }}"
                                    data-rating="{{ $award->rating }}" 
                                    data-bs-toggle="modal" data-bs-target="#editModal">
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

             
            <!-- Modal untuk mengedit data penghargaan -->
                <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                    <div class="modal-dialog"> 
                    <div class="modal-content"> 
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Edit Data Penghargaan</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editForm" action="#" method="POST">
                        @csrf
                            @method('PUT')
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Agen</label>
                            <input type="text" class="form-control" id="nama" name="nama_agen">
                        </div>
                        <div class="mb-3">
                            <label for="lokasi" class="form-label">Lokasi</label>
                            <input type="text" class="form-control" id="lokasi" name="lokasi">
                        </div>
                        <div class="mb-3">
                            <label for="terjual" class="form-label">Terjual</label>
                            <input type="number" class="form-control" id="terjual" name="terjual">
                        </div>
                        <div class="mb-3">
                            <label for="poin" class="form-label">Poin</label>
                            <input type="number" class="form-control" id="poin" name="poin">
                        </div>
                        <div class="mb-3">
                            <label for="rating" class="form-label">Rating</label>
                            <input type="text" class="form-control" id="rating" name="rating">
                        </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                    </div>
                    </div>
                    </div>
                </div>

            <!-- Modal untuk tambah  data award -->
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
                            <h3>Create New Award</h3>
                            <form action="{{ route('awards.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <strong>Nama Agen:</strong>
                                    <input type="text" name="nama_agen" class="form-control" placeholder="Nama Agen">
                                </div>
                                <div class="form-group">
                                    <strong>Lokasi:</strong>
                                    <input type="text" name="lokasi" class="form-control" placeholder="Lokasi">
                                </div>
                                <div class="form-group">
                                    <strong>Terjual:</strong>
                                    <input type="number" name="terjual" class="form-control" placeholder="Terjual">
                                </div>
                                <div class="form-group">
                                    <strong>Poin:</strong>
                                    <input type="number" name="poin" class="form-control" placeholder="Poin">
                                </div>
                                <div class="form-group">
                                    <strong>Rating:</strong>
                                    <input type="text" name="rating" class="form-control" placeholder="Isi 1-5">
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
               
                    </div>
                    </div>
                 </div>
                 
    <script>
        $(document).on('click', '.btn-edit', function () {
            var id = $(this).data('id');
            var nama_agen = $(this).data('nama');
            var lokasi = $(this).data('lokasi');
            var terjual = $(this).data('terjual');
            var poin = $(this).data('poin');
            var rating = $(this).data('rating');
    
            $('#editForm').attr('action', '/awards/' + id); // Set action form dengan URL update yang sesuai
            $('#nama').val(nama_agen); // Set nilai input nama dengan nilai nama yang sesuai
            $('#lokasi').val(lokasi); // Set nilai input lokasi dengan nilai lokasi yang sesuai
            $('#terjual').val(terjual); // Set nilai input terjual  dengan nilai terjual yang sesuai
            $('#poin').val(poin); // Set nilai input poin dengan nilai poin yang sesuai
            $('#rating').val(rating); // Set nilai input rating dengan nilai rating yang sesuai
    
            $('#editModal').modal('show'); // Menampilkan modal
        });
    </script>

    </html>
@endsection