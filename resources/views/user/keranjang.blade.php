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

    .custom-checkbox {
        width:20px; /* Menyesuaikan skala checkbox */
        height:20px; /* Memberi ruang antara checkbox dan teks */
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
  <script>
    import Swal from 'sweetalert2';
  </script>
  
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
                    <div class="container" style="margin-top:20px">
                        <div class="row">
                            <div class="col-md-8">
                                <form action="">
                                    @forelse($keranjang as $item)
                                    <div class="card products" id="product1" style="margin-bottom:24px; border:none;">
                                        <div class="card-body">
                                            <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">
                                                <div class="flex  gap-6" style="position: relative;">
                                                    
                                                    <div>
                                                        <img src="{{ ('IMG/' . $item->foto_produk) }}" alt="Gambar Produk" class="object-cover rounded" style="width:100px; height:100px">
                                                    </div>
                                                    <div >
                                                        <h5 class="mb-1 text-16"><a href="apps-ecommerce-product-overview.html">{{ $item->barang->nama_barang}}</a></h5>
                                                        <p class="mb-1 text-slate-500 dark:text-zink-200" style="font-size:12px;">{{ $item->barang->deskripsi }}</p>
                                                        <h6 class="mt-auto text-16 ltr:lg:text-right rtl:lg:text-left"><span class="products-line-price" >Rp {{ number_format($item->barang->harga, 0, ',', '.') }}</span></h6>
                                                    </div>
                                                    <div style="position: absolute; bottom: 0; right: 0;">
                                                        <button onclick="deleteItem({{ $item->id }})" class="btn btn-link text-danger" style="background-color:rgb(251, 225, 225)">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </div> 
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
                                    
                                </form>
                            </div>
                            <div class="col-md-4" >
                                <div class="card" style="position: sticky; top: 20px; border:none;">
                                        <div class="card-body" style="color:#05603A">
                                            <h6 class="mb-4 text-20">Ringkasan Belanja</h6>
                                            <div class="overflow-x-auto">
                                                <table class="w-full">
                                                    <tbody style="padding-top: 8px; padding-bottom: 8px;">
                                                   
                                                        <tr class="font-semibold" style="color:#05603A">
                                                            <td class="px-3.5 pt-3 first:pl-0 last:pr-0 text-slate-500 dark:text-zink-200" >
                                                                <p id="summary">
                                                                    Total Amount (Rp) 
                                                                </p>
                                                            </td>
                                                            <td class="px-3.5 pt-3 first:pl-0 last:pr-0 ltr:text-right rtl:text-left">Rp {{ number_format($totalAmount, 0, ',', '.') }}</td>
                                                        </tr>
                                                    
                                                    </tbody>
                                                </table>
                                            </div>
                                            <button type="button"  class="btn btn-primary" style="background-color:green; font-color:white; width:180px">
                                                <div class="d-flex justify-content-between">
                                                    <a href="/checkout" style="text-align:center">
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


    <script>
    document.addEventListener("DOMContentLoaded", function() {
        // Hitung jumlah item dalam keranjang
        var itemCount = {{ count($keranjang) }};
        
        // Select element ikon keranjang
        var cartIcon = document.querySelector(".fa-shopping-cart");
        
        // Buat elemen untuk menampilkan notifikasi jumlah item
        var itemCountBadge = document.createElement("span");
        itemCountBadge.classList.add("badge", "bg-danger", "rounded-pill");
        itemCountBadge.textContent = itemCount;
        
        // Tambahkan notifikasi ke ikon keranjang
        cartIcon.appendChild(itemCountBadge);
    });

    // Function to update summary based on selected items
    function updateSummary() {
        // Select summary element
        var summaryElement = document.getElementById('summary');
        // Select all checked checkboxes
        var checkedCheckboxes = document.querySelectorAll('input[name="selected_items[]"]:checked');
        // Get total amount
        var totalAmount = 0;
        checkedCheckboxes.forEach(function(checkbox) {
            // Get the price of the checked item
            var price = parseFloat(checkbox.dataset.price);
            // Add to total amount
            totalAmount += price;
        });
        // Update summary text
        summaryElement.textContent = 'Total Amount Rp ' + totalAmount.toLocaleString('id-ID');
    }

    // Add event listener to checkboxes
    var checkboxes = document.querySelectorAll('input[name="selected_items[]"]');
    checkboxes.forEach(function(checkbox) {
        checkbox.addEventListener('change', function() {
            // Update summary when checkbox status changes
            updateSummary();
        });
    });

    // Update summary when page loads
    document.addEventListener('DOMContentLoaded', function() {
        updateSummary();
    });

    function deleteItem(itemId) {
        if (confirm('Apakah Anda yakin ingin menghapus item ini?')) {
            fetch(`/keranjang/${itemId}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json'
                }
            })
            .then(response => {
                if (response.ok) {
                    document.getElementById('product' + itemId).remove();
                    toastr.success('Item telah dihapus dari keranjang.');
                } else {
                    toastr.error('Terjadi kesalahan saat menghapus item dari keranjang.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                toastr.error('Terjadi kesalahan saat menghapus item dari keranjang.');
            });
        }
    }

    </script>
<!-- JavaScript to show item count notification -->
@endsection


