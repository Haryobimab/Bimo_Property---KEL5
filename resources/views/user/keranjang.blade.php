<!-- resources/views/user/keranjang.blade.php -->
<!-- App favicon -->
<link rel="shortcut icon" href="{{ URL::to('assets/images/favicon.ico') }}">
    <!-- Layout config Js -->
    <script src="{{ URL::to('assets/js/layout.js') }}"></script>
    <!-- StarCode CSS -->
    <link rel="stylesheet" href="{{ URL::to('assets/css/starcode2.css') }}">
    <!-- message toastr -->
	<link rel="stylesheet" href="{{ URL::to('assets/css/toastr.min.css') }}">
	<script src="{{ URL::to('assets/js/toastr_jquery.min.js') }}"></script>
	<script src="{{ URL::to('assets/js/toastr.min.js') }}"></script>
  <style>

    .card.products .card-body {
        padding: 20px;
    }

    .card.products .grid {
        display: grid;
        grid-template-columns: 1fr;
    }

    .card.products .flex {
        display: flex;
    }

    .card.products .flex.flex-col {
        flex-direction: column;
    }

    .card.products .flex.justify-end {
        justify-content: flex-end;
    }

    .card.products h5,
    .card.products p {
        margin: 0;
    }

    .card.products h5 {
        font-size: 1.2rem;
        color: #333;
    }

    .card.products p {
        margin-bottom: 40px;
        font-size: 1rem;
        color: #666;
    }

    .card.products .btn {
        border: none;
        cursor: pointer;
    }

    .card.products .btn:focus {
        outline: none;
    }

    .card.products .btn.btn-link {
        color: inherit;
        background-color: transparent;
    }

    .card.products .btn.btn-link:hover {
        color: #dc3545;
    }

    .card.products .products-line-price {
        font-size: 1rem;
        color: #28a745; /* Warna hijau untuk harga */
    }


  </style>
@extends('layouts.app')

@section('content')
    <!-- Page-content -->
<div class="section">
    <div class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4 group-data-[navbar=bordered]:pt-[calc(theme('spacing.header')_*_1.3)] group-data-[navbar=hidden]:pt-0 group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl group-data-[layout=horizontal]:px-0 group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:ltr:md:ml-auto group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:rtl:md:mr-auto group-data-[layout=horizontal]:md:pt-[calc(theme('spacing.header')_*_1.6)] group-data-[layout=horizontal]:px-3 group-data-[layout=horizontal]:group-data-[navbar=hidden]:pt-[calc(theme('spacing.header')_*_0.9)]">
        <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/beranda">Beranda</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Keranjang</li>
                </ol>
            </nav>
            <div class="grid grid-cols-1 xl:grid-cols-2 gap-x-5">
                <div class="xl:col-span-9 md:col-span-1 products-list">
                    <div class="flex items-center gap-3 mb-5">
                        <h5 class="underline text-16 grow">Shopping Cart ({{ $countKeranjang }}) </h5>
                    </div>
                    <div class="container ">
                        <div class="row">
                            <div class="col-md-7">
                                @forelse($keranjang as $item)
                                <div class="card products" id="product1" style="margin-bottom:24px;">
                                    <div class="card-body">
                                        <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">
                                            <div class="flex items-center gap-4">
                                                <div>
                                                <img src="/IMG/rumah_1.jpg" alt="Gambar Produk" class="object-cover rounded" style="width:120px; height:120px">
                                                </div>
                                                <div >
                                                    <h5 class="mb-1 text-16"><a href="apps-ecommerce-product-overview.html">{{ $item->nama_produk }}</a></h5>
                                                    <p class="mb-2 text-slate-500 dark:text-zink-200">{{ $item->deskripsi }}</p>
                                                    <p class="mb-1 text-slate-500 dark:text-zink-200" style="margin-bottom:24px"> <a href="/belifurniture"> Tipe Produk: <span class="text-slate-800 dark:text-zink-50">{{ $item->tipe_produk }}</span></a></p>
                                                    <h6 class="mt-auto text-16 ltr:lg:text-right rtl:lg:text-left"><span class="products-line-price" >Rp {{ number_format($item->harga, 0, ',', '.') }}</span></h6>
                                                </div>
                                            </div>
                                            <div class="flex items-center justify-end gap-4">
                                            <form action="{{ route('keranjang.destroy', $item->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-link text-danger" style="background-color:rgb(251, 225, 225)"><i class="fas fa-trash-alt"></i></button>
                                                    </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @empty
                                <!-- If cart is empty -->
                                <tr>
                                    <td colspan="6" class="text-center">Keranjang kosong</td>
                                </tr>
                                @endforelse
                            </div>
                            <div class="col-md-5 ">
                                <div class="card ">
                                        <div class="card-body" style="color:#05603A">
                                            <h6 class="mb-4 text-20">Ringkasan Belanja</h6>
                                            <div class="overflow-x-auto">
                                                <table class="w-full">
                                                    <tbody>
                                                        @forelse($keranjang as $item) 
                                                        <tr>
                                                            <td class="px-3.5 py-4 border-b border-dashed first:pl-0 last:pr-0 border-slate-200 dark:border-zink-500">
                                                                <div class="flex items-center gap-3">
                                                                    <div class="flex items-center justify-center rounded-md size-12 bg-slate-100 shrink-0">
                                                                        <img src="{{ $item->foto_produk }}" alt="" class="h-8">
                                                                    </div>
                                                                    <div class="grow">
                                                                        <h6 class="mb-1 text-15" style="color:#05603A"><a href="apps-ecommerce-product-overview.html" class="transition-all duration-300 ease-linear hover:text-custom-500">{{ $item->nama_produk }}</a></h6>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="px-3.5 py-4 border-b border-dashed first:pl-0 last:pr-0 border-slate-200 dark:border-zink-500 ltr:text-right rtl:text-left" style="color:#05603A">
                                                                Rp {{ number_format($item->harga, 0, ',', '.') }}
                                                            </td>
                                                        </tr>
                                                        @empty
                                                        <!-- If cart is empty -->
                                                        <tr>
                                                            <td colspan="6" class="text-center">Keranjang kosong</td>
                                                        </tr>
                                                        @endforelse
                                                        <tr class="font-semibold" style="color:#05603A">
                                                            <td class="px-3.5 pt-3 first:pl-0 last:pr-0 text-slate-500 dark:text-zink-200">
                                                                Total Amount (Rp)
                                                            </td>
                                                            <td class="px-3.5 pt-3 first:pl-0 last:pr-0 ltr:text-right rtl:text-left">Rp {{ number_format($totalCart, 0, ',', '.') }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <button type="button"  class="btn btn-primary" style="background-color:green; font-color:white">
                                                <div class="d-flex justify-content-between">
                                                    <a href="/checkout">
                                                        Checkout
                                                    </a>
                                                </div>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                         <!-- Closing foreach loop -->
                        </div>
                    </div>
                </div>
                <!-- Remaining HTML structure -->
            </div>
        </div>
    </div>     
</div>
    <!-- End Page-content -->



<!-- JavaScript to show item count notification -->
@endsection


