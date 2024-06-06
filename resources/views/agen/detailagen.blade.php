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
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('agen.cariagen') }}">Cari Agen</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{ $agen->nama_agen }}</li>
  </ol>
</nav>
<div class="container mt-5" style="margin-bottom:80px">
    <div style="display: flex; flex-direction: row-reverse; align-items: center; margin-bottom: 24px;">
        <div class="col-md-4">
            <img src="{{ asset('IMG/Agen/' .  $agen->foto_agen) }}" alt="foto agen" style="width:500px; height:400px; border-radius: 20px; object-fit: cover;">
        </div>
        <div class="col-md-6" style="margin-left: 24px; margin-right:200px">
            <div class="title" style="background-color: #E3FBCC; display: flex; align-items: center; padding:16px; border-radius:20px; margin-bottom:24px; max-width:25%">
                <i class="fas fa-home text-center" aria-hidden="true" style="margin-right: 10px; color:green"></i>
                <h5 class="text-center" style="margin: 0; color:green; ">A G E N T</h5>
            </div>
            <div class="biodata-agen" style="margin-bottom:24px">
                <h1 class="card-title" style="font-size:52px; margin-bottom:16px">{{ $agen->nama_agen }}</h1> 
                <h4 style="margin-bottom:24px; color:#8C8F93">{{ $agen->alamat }}</h4>
                <p style="margin-bottom:24px; color:#8C8F93">{{ $agen->deskripsi_agen }}</p>
                
                <div style="display: flex; flex-direction: row; gap: 12px; align-items: center;">
                    <div style="margin-right:80px">
                        <div style="display: flex; align-items: center;margin-bottom:20px">
                            <i class="fas fa-envelope" aria-hidden="true" style="margin-right: 5px; color:green"></i>
                            <p>{{ $agen->email }}</p>
                        </div>
                        <div style="display: flex; align-items: center;">
                            <i class="fas fa-phone" aria-hidden="true" style="margin-right: 5px; color:green"></i>
                            <p >{{ $agen->no_telp }}</p>
                        </div> 
                    </div>
                    <div class="button">
                        <a href="{{ route('janji-temu.index', ['id' => $agen->id]) }}" class="btn btn-primary" style="background-color:green">Buat Janji Temu</a>
                    </div>
                </div>
                </div>
                </div>
            </div>
            <!-- <div style="display: grid; grid-template-columns: repeat(3, 5fr); grid-gap: 60px; max-width:50%">
                <div style="text-align: center;">
                    <p style="font-size:36px">{{ $agen->property_sales }}</p>
                    <h3 style="font-size:16px; color:green">Property Sales</h3>
                </div>
                <div style="text-align: center;">
                    <p style="font-size:36px">{{ $agen->customer_satisfaction }}</p>
                    <h3 style="font-size:16px; color:green">Customer Satisfaction</h3>
                </div>
                <div style="text-align: center;">
                    <p style="font-size:36px">{{ $agen->property_transaction }}</p>
                    <h3 style="font-size:16px; color:green">Property Transaction</h3>
                </div>
            </div> -->
        </div>

    </div>
    
</div>
@endsection

