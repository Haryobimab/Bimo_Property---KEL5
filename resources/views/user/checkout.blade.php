
    <!-- resources/views/user/pembayaran.blade.php -->
<style>
        .grid-cols-1 {
            display: grid;
            grid-template-columns: repeat(1, minmax(0, 1fr));
            grid-gap: 1rem;
        }

        @media (min-width: 768px) {
            .grid-cols-2 {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        .card {
            border:none;
        }

        .container.mt-4 {
        background-color: #F4F4F5;
        padding-top:40px;
        padding-bottom:40px;
        padding-left:100px;
        padding-right:100px;
        max-width:100% /* Warna hijau muda */
        }

</style>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
@extends('layouts.app')

@section('content')
 <!-- Page-content -->
 <div class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4 group-data-[navbar=bordered]:pt-[calc(theme('spacing.header')_*_1.3)] group-data-[navbar=hidden]:pt-0 group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl group-data-[layout=horizontal]:px-0 group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:ltr:md:ml-auto group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:rtl:md:mr-auto group-data-[layout=horizontal]:md:pt-[calc(theme('spacing.header')_*_1.6)] group-data-[layout=horizontal]:px-3 group-data-[layout=horizontal]:group-data-[navbar=hidden]:pt-[calc(theme('spacing.header')_*_0.9)]">
        <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/beranda">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="/keranjang">Keranjang</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                </ol>
            </nav>
            <div class="konten">
                <div class="alert alert-success" role="alert" style="background-color: #FAFEF5; margin-top:24px">
                    <h4 class="alert-heading" style="color:#3B7C0F">Well done!</h4>
                    <p style="color:#3B7C0F">Selamat sebentar lagi Anda akan memiliki produk idaman Anda</p> 
                </div>
                               
                <div class="">
                    <div class="container" style="margin-top:24px; margin-bottom:24px">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="card" style="border:none;">
                                        <div class="card-body">
                                            <form action="{{ route('user.checkout') }}" method="POST">
                                                <div class="mb-3 row">
                                                    <label for="staticEmail" class="col-sm-2 col-form-label">Nama</label>
                                                    <div class="col-sm-10">
                                                    <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{ auth()->user()->name }}">
                                                    </div>
                                                </div>

                                                <!-- Form input email -->
                                                <div class="mb-3 row">
                                                    <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                                                    <div class="col-sm-10">
                                                    <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{ auth()->user()->email }}">
                                                    </div>
                                                </div>

                                                <!-- Form input alamat -->
                                                <div class="mb-3 row">
                                                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                                    <div class="col-sm-10">
                                                        <textarea id="alamat" name="alamat" class="border rounded-md py-1 px-3 bg-slate-100 border-slate-200 dark:bg-zink-600 dark:border-zink-500 text-slate-500 dark:text-zink-200" style="width: 100%;"></textarea>
                                                    </div>
                                                </div>

                                                <!-- Form input nomor handphone -->
                                                <div class="mb-3 row">
                                                    <label for="nomor_hp" class="col-sm-2 col-form-label">Nomor Handphone</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" id="nomor_hp" name="nomor_hp" class="border rounded-md py-1 px-3 bg-slate-100 border-slate-200 dark:bg-zink-600 dark:border-zink-500 text-slate-500 dark:text-zink-200" style="width: 100%;">
                                                    </div>
                                                </div>
                                            </form>
                                            <div class="flex items-center gap-2">
                                                
                                                <label for="deliveryChoose" class="mr-2">Pilih jenis pengiriman:</label>
                                                <select class="form-select" aria-label="Default select example" id="deliveryChoose" name="deliveryChoose" >
                                                    <option value="express-delivery">
                                                        @if($keranjang->isNotEmpty())
                                                            Pengiriman Express - Estimasi Pengiriman: {{ \Carbon\Carbon::parse($keranjang->first()->created_at)->addDay()->translatedFormat('j F, Y') }} - Rp30.000
                                                        @else
                                                            Keranjang kosong
                                                        @endif
                                                    </option>
                                                    <option value="normal-delivery">
                                                        @if($keranjang->isNotEmpty())
                                                            Pengiriman Normal - Estimasi Pengiriman: {{ \Carbon\Carbon::parse($keranjang->first()->created_at)->addDay(3)->translatedFormat('j F, Y') }} - Rp20.000
                                                        @else
                                                            Keranjang kosong
                                                        @endif
                                                    </option>
                                                    <option value="hemat-delivery">
                                                        @if($keranjang->isNotEmpty())
                                                            Pengiriman Hemat - Estimasi Pengiriman: {{ \Carbon\Carbon::parse($keranjang->first()->created_at)->addDay(4)->translatedFormat('j F, Y') }} - Rp15.000
                                                        @else
                                                            Keranjang kosong
                                                        @endif
                                                    </option>
                                                </select>
                                            </div>                                       
                                        </div>
                                    </div><!--end card-->
                                </div>
                            <div class="col-md-4">
                            <div class="card" style="border:none;">
                                    <div class="card-body">
                                        <h6 class="mb-4 text-20">Ringkasan Belanja</h6>
                                        <div class="overflow-x-auto">
                                            <table class="w-full">
                                                <tbody>
                                                @php
                                                    $subtotal = $subtotal ?? 0; // Jika nilai subtotal tidak tersedia, atur ke 0 sebagai default
                                                @endphp
                                                    <tr>
                                                        <td class="px-3.5 pt-4 pb-3 first:pl-0 last:pr-0 text-slate-500 dark:text-zink-200">
                                                            Sub Total
                                                        </td>
                                                        <td class="px-3.5 pt-4 pb-3 first:pl-0 last:pr-0 ltr:text-right rtl:text-left">Rp {{ number_format($subtotal, 0, ',', '.') }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="px-3.5 py-3 first:pl-0 last:pr-0 text-slate-500 dark:text-zink-200">
                                                            Pajak (10%)
                                                        </td>
                                                        <td class="px-3.5 py-3 first:pl-0 last:pr-0 ltr:text-right rtl:text-left">Rp {{ number_format($tax, 0, ',', '.') }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="px-3.5 pt-4 pb-3 first:pl-0 last:pr-0 text-slate-500 dark:text-zink-200">
                                                            Biaya Pengiriman
                                                        </td>
                                                        <td class="px-3.5 pt-4 pb-3 first:pl-0 last:pr-0 ltr:text-right rtl:text-left"><span id="biayaPengiriman" class="block text-lg font-semibold">Rp   20.000</span></td>
                                                    </tr>
                                                    <tr class="font-semibold">
                                                        <td class="px-3.5 pt-3 first:pl-0 last:pr-0 text-slate-500 dark:text-zink-200">
                                                            <h5>Total Amount (Rp)
                                                        </td>
                                                        <td id="totalAmount" class="px-3.5 pt-3 first:pl-0 last:pr-0 ltr:text-right rtl:text-left">Rp {{ number_format($total, 0, ',', '.') }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <button type="button"  class="btn btn-primary" style="background-color:green; font-color:white">
                                                                    <div class="d-flex justify-content-between text-center">
                                                                        <a href="/checkout">
                                                                            Bayar sekarang
                                                                        </a>
                                                                    </div>
                                            </button>
                                        </div>
                                        
                                    </div>
                                </div>
                                
                                
                                
                            </div>
                        </div>
                    </div>
                </div>

                </div><!--end col-->
                
                
            </div><!--end grid-->

        </div>
        <!-- container-fluid -->
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
        const subtotal = {{ $subtotal }}; // Menggunakan nilai subtotal dari controller

        const updateTotalAmount = () => {
            // ... kode lain untuk perhitungan total amount
        };

        // Inisialisasi total amount
        updateTotalAmount();
        
        document.addEventListener('DOMContentLoaded', function() {
        const deliveryChoose = document.getElementById('deliveryChoose');
        const biayaPengiriman = document.getElementById('biayaPengiriman');
        const subtotal = {{ $subtotal }};
        const tax = {{ $tax }};

        const updateTotalAmount = () => {
            let biayaPengirimanValue = 0;
            if (biayaPengiriman.textContent.trim()) {
                const biayaPengirimanText = biayaPengiriman.textContent.trim().substring(3).replace('.', ''); // Menghilangkan 'Rp ' dan tanda titik dari teks biaya pengiriman
                biayaPengirimanValue = parseFloat(biayaPengirimanText.replace(',', '')); // Menghilangkan koma sebagai pemisah ribuan
            }
            const total = subtotal + tax + biayaPengirimanValue;
            const formattedTotal = 'Rp ' + total.toFixed(0).replace(/\d(?=(\d{3})+$)/g, '$&,'); // Format total amount
            document.getElementById('totalAmount').textContent = formattedTotal;
        };

        // Event listener untuk dropdown
        deliveryChoose.addEventListener('change', function() {
            // Atur biaya pengiriman berdasarkan opsi yang dipilih
            switch (this.value) {
                case 'express-delivery':
                    biayaPengiriman.textContent = 'Rp {{ number_format(30000, 0, ',', '') }}';
                    break;
                case 'normal-delivery':
                    biayaPengiriman.textContent = 'Rp {{ number_format(20000, 0, ',', '') }}';
                    break;
                case 'hemat-delivery':
                    biayaPengiriman.textContent = 'Rp {{ number_format(15000, 0, ',', '') }}';
                    break;
                default:
                    biayaPengiriman.textContent = ''; // Default jika tidak ada opsi yang dipilih
                    break;
            }

            // Perbarui total amount
            updateTotalAmount();
        });

        // Inisialisasi total amount
        updateTotalAmount();


    }); 
    </script>

@endsection

