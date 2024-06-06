<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<style>
    h1{
        font-size:52px;
    }
    h5{
        font-size:20px;
    }

    
</style>
@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div class="title" style="background-color: #E3FBCC; display: flex; align-items: center; padding:16px; border-radius:20px; margin-bottom:24px; max-width:25%">
        <i class="fas fa-home text-center" aria-hidden="true" style="margin-right: 10px; color:green"></i>
        <h5 class="text-center" style="margin: 0; color:green; ">Daftar Janji Temu</h5>
    </div>
    <a href="{{ route('janji-temu.create', ['id' => $agen->id] ) }}" class="btn btn-primary" style="background-color: green; font">Buat Janji Temu</a>
    </div>
        
    <div class="table-responsive">
        <table class="table table-hover table-bordered">
            <thead class="table-success">
                <tr>
                    <th>Nama Properti</th>
                    <th>Tanggal Janji Temu</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($janjitemu as $item)
                    <tr>
                        <td>{{ $item->property->nama ?? 'N/A' }}</td>
                        <td>{{ $item->tanggal }} {{ $item->jam }}</td>
                        <td>{{ $item->status }}</td>
                        <td>
                            <form action="{{ route('janji-temu.complete', $item->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-outline-success">Sudah Bertemu</button>
                            </form>
                            <form action="{{ route('janji-temu.cancel', $item->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-outline-danger">Cancel</button>
                            </form>
                            <a href="{{ route('janji-temu.rescheduleForm', $item->id) }}" class="btn btn-outline-warning">Reschedule</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $janjitemu->links() }}
    </div>
</div>
@endsection
