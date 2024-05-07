
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

</style>
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
                <div class="xl:col-span-8">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-7">
                                <div class="card">
                                    <div class="card-body">
                                        <h6 class="mb-4 text-20">Ringkasan Belanja</h6>
                                        <div class="overflow-x-auto">
                                            <table class="w-full">
                                                <tbody>
                                                    @forelse($keranjang as $item) 
                                                    <tr>
                                                        <td class="px-3.5 py-4 border-b border-dashed first:pl-0 last:pr-0 border-slate-200 dark:border-zink-500">
                                                            <div class="flex items-center gap-3">
                                                                <div class="flex items-center justify-center rounded-md size-12 bg-slate-100 shrink-0">
                                                                    <img src="{{ URL::to('assets/images/img-08.png') }}" alt="" class="h-8">
                                                                </div>
                                                                <div class="grow">
                                                                    <h6 class="mb-1 text-15"><a href="apps-ecommerce-product-overview.html" class="transition-all duration-300 ease-linear hover:text-custom-500">{{ $item->nama_produk }}</a></h6>
                                                                    <p class="text-slate-500 dark:text-zink-200">Rp {{ number_format($item->harga, 0, ',', '.') }}</p>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="px-3.5 py-4 border-b border-dashed first:pl-0 last:pr-0 border-slate-200 dark:border-zink-500 ltr:text-right rtl:text-left">Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                                                    </tr>
                                                    @empty
                                                    <!-- If cart is empty -->
                                                    <tr>
                                                        <td colspan="6" class="text-center">Keranjang kosong</td>
                                                    </tr>
                                                    @endforelse
                                                    <tr>
                                                        <td class="px-3.5 pt-4 pb-3 first:pl-0 last:pr-0 text-slate-500 dark:text-zink-200">
                                                            Sub Total
                                                        </td>
                                                        <td class="px-3.5 pt-4 pb-3 first:pl-0 last:pr-0 ltr:text-right rtl:text-left">Rp {{ number_format($subtotal, 0, ',', '.') }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="px-3.5 py-3 first:pl-0 last:pr-0 text-slate-500 dark:text-zink-200">
                                                            Estimated Tax (10%)
                                                        </td>
                                                        <td class="px-3.5 py-3 first:pl-0 last:pr-0 ltr:text-right rtl:text-left">Rp {{ number_format($tax, 0, ',', '.') }}</td>
                                                    </tr>
                                                    <tr class="font-semibold">
                                                        <td class="px-3.5 pt-3 first:pl-0 last:pr-0 text-slate-500 dark:text-zink-200">
                                                            Total Amount (Rp)
                                                        </td>
                                                        <td class="px-3.5 pt-3 first:pl-0 last:pr-0 ltr:text-right rtl:text-left">Rp {{ number_format($total, 0, ',', '.') }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="mt-4">
                                            <button type="button" class="w-full text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20"><span class="align-middle">Place Order</span> <i data-lucide="move-right" class="inline-block align-middle size-4 ltr:ml-1 rtl:mr-1 rtl:rotate-180"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="card">
                                    <div class="card-body">
                                        <h6 class="mb-4 text-15">Pengiriman</h6>
                                        <div class="grid grid-cols-1 gap-5 xl:grid-cols-2">
                                            <div class="flex items-center">
                                                <input id="deliveryOption1" class="border rounded-full appearance-none cursor-pointer size-4 bg-slate-100 border-slate-200 dark:bg-zink-600 dark:border-zink-500 checked:bg-purple-500 checked:border-purple-500 dark:checked:bg-purple-500 dark:checked:border-purple-500 checked:disabled:bg-purple-400 checked:disabled:border-purple-400 peer" type="radio" name="deliveryChoose" value="express-delivery" checked="">
                                                <label for="deliveryOption1" class="flex flex-col gap-4 p-5" style="margin-right: 16px;">
                                                    @if($keranjang->isNotEmpty())
                                                    <span class="grow">
                                                        <span class="block mb-1 font-semibold text-15">Pengiriman Express</span>
                                                        <span class="text-slate-500 dark:text-zink-200">
                                                            Estimasi Pengiriman: {{ \Carbon\Carbon::parse($keranjang->first()->created_at)->addDay()->translatedFormat('j F, Y') }}
                                                        </span>
                                                    </span>
                                                    @else
                                                        <p>Keranjang kosong</p>
                                                    @endif
                                                    <span class="shrink-0">
                                                        <span class="block text-lg font-semibold">Rp30.000</span>
                                                    </span>
                                                </label>
                                            </div>
                                            <div class="flex items-center">
                                                <input id="deliveryOption2" class="border rounded-full appearance-none cursor-pointer size-4 bg-slate-100 border-slate-200 dark:bg-zink-600 dark:border-zink-500 checked:bg-purple-500 checked:border-purple-500 dark:checked:bg-purple-500 dark:checked:border-purple-500 checked:disabled:bg-purple-400 checked:disabled:border-purple-400 peer" type="radio" name="deliveryChoose" value="express-delivery">
                                                <label for="deliveryOption2" class="flex flex-col gap-4 p-5 " style="margin-right: 16px;">
                                                    @if($keranjang->isNotEmpty())
                                                    <span class="grow">
                                                        <span class="block mb-1 font-semibold text-15" >Pengiriman Normal</span>
                                                        <span class="text-slate-500 dark:text-zink-200">
                                                            Estimasi Pengiriman: {{ \Carbon\Carbon::parse($keranjang->first()->created_at)->addDay(3)->translatedFormat('j F, Y') }}
                                                        </span>
                                                    </span>
                                                    @else
                                                        <p>Keranjang kosong</p>
                                                    @endif
                                                    <span class="shrink-0">
                                                        <span class="block text-lg font-semibold">Rp20.000</span>
                                                    </span>
                                                </label>
                                            </div>
                                            <div class="flex items-center">
                                                <input id="deliveryOption3" class="border rounded-full appearance-none cursor-pointer size-4 bg-slate-100 border-slate-200 dark:bg-zink-600 dark:border-zink-500 checked:bg-purple-500 checked:border-purple-500 dark:checked:bg-purple-500 dark:checked:border-purple-500 checked:disabled:bg-purple-400 checked:disabled:border-purple-400 peer" type="radio" name="deliveryChoose" value="express-delivery">
                                                <label for="deliveryOption3" class="flex flex-col gap-4 p-5 " style="margin-right: 16px;">
                                                    @if($keranjang->isNotEmpty())
                                                    <span class="grow">
                                                        <span class="block mb-1 font-semibold text-15">Pengiriman Hemat</span>
                                                        <span class="text-slate-500 dark:text-zink-200">
                                                            Estimasi Pengiriman: {{ \Carbon\Carbon::parse($keranjang->first()->created_at)->addDay(4)->translatedFormat('j F, Y') }}
                                                        </span>
                                                    </span>
                                                    @else
                                                        <p>Keranjang kosong</p>
                                                    @endif
                                                    <span class="shrink-0">
                                                        <span class="block text-lg font-semibold">Rp15.000</span>
                                                    </span>
                                                </label>
                                            </div>
                                        </div>                                       
                                    </div>
                                    
                                </div><!--end card-->
                                <div class="alert alert-success" role="alert" style="margin-top:24px">
                                    <h4 class="alert-heading">Well done!</h4>
                                    <p>Selamat sebentar lagi Anda akan memiliki produk idaman Anda</p>
                                    <hr>
                                    <p class="mb-0">Segera lakukan pembayaran agar tidak kehabisan stok</p>
                                </div>
                                <button type="button"  class="btn btn-primary" style="background-color:green; font-color:white">
                                                <div class="d-flex justify-content-between text-center">
                                                    <a href="/checkout">
                                                        Checkout
                                                    </a>
                                                </div>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                </div><!--end col-->
                
                
            </div><!--end grid-->

        </div>
        <!-- container-fluid -->
    </div>

@endsection

