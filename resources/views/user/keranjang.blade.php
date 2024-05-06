<!-- resources/views/user/keranjang.blade.php -->
@extends('layouts.app')

@section('content')
<section class="h-100 h-custom" style="background-color: #eee;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col">
        <div class="card">
          <div class="card-body p-4">

            <div class="row">

              <div class="col-lg-12">
                <h5 class="mb-3"><a href="#!" class="text-body"><i
                      class="fas fa-long-arrow-alt-left me-2"></i>Continue shopping</a></h5>
                <hr>

                <div class="d-flex justify-content-between align-items-center mb-4">
                  <div>
                    <p class="mb-1">Shopping cart</p>
                    <p class="mb-0">You have 4 items in your cart</p>
                  </div>
                </div>
                
                    <div class="card mb-3">
                    <div class="card-body">
                        @forelse($keranjang as $item)
                        <div class="d-flex justify-content-between">
                        <div class="d-flex flex-row align-items-center">
                            
                            <div>
                            <img
                                src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-shopping-carts/img1.webp"
                                class="img-fluid rounded-3" alt="Shopping item" style="width: 65px;">
                            </div>
                            <div class="ms-3">
                            <h5>{{ $item->nama_produk }}</h5>
                            <p class="small mb-0">{{ $item->deskripsi }}</p>
                            </div>
                        </div>
                        <div class="d-flex flex-row align-items-center">
                            <div style="width: 50px;">
                            <h5 class="fw-normal mb-0"></h5>
                            </div>
                            <div style="width: 80px;">
                            <h5 class="mb-0">Rp {{ number_format($item->harga, 0, ',', '.') }}</h5>
                            <form action="{{ route('keranjang.destroy', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-link text-danger" style="background-color:rgb(251, 225, 225)"><i class="fas fa-trash-alt"></i></button>
                            </form>
                        </div>
                    </div>
                    </div>           
                        
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center">Keranjang kosong</td>
                                </tr>
                    @endforelse                    


                    <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-info btn-block btn-lg">
                      <div class="d-flex justify-content-between">
                        <a href="/checkout">
                            <span>Checkout <i class="fas fa-long-arrow-alt-right ms-2"></i></span>
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
    </div>
  </div>
</section>


<!-- JavaScript to show item count notification -->
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
</script>
@endsection
