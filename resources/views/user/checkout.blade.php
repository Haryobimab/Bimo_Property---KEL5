
    <!-- resources/views/user/pembayaran.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Pembayaran') }}</div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Nama Produk</th>
                                    <th scope="col">Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $totalPembayaran = 0;
                                @endphp
                                @forelse($keranjang as $item)
                                <tr>
                                    <td>{{ $item->nama_produk }}</td>
                                    <td>Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                                </tr>
                                @php
                                    $totalPembayaran += $item->harga;
                                @endphp
                                @empty
                                <tr>
                                    <td colspan="2" class="text-center">Keranjang kosong</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card-footer">
                    <div class="row">
                        <div class="col-md-6">
                            <h5>Total Pembayaran:</h5>
                        </div>
                        <div class="col-md-6 text-right">
                            <h5>Rp {{ number_format($totalPembayaran, 0, ',', '.') }}</h5>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <a href="#" class="btn btn-primary float-right">Bayar</a>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

