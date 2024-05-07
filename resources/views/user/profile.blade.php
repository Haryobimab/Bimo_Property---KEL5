
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ asset('css/ulasan.css') }}">
  <link rel="stylesheet" href="{{ 'css/profile.css' }}">
  {{-- CKEditor CDN --}}
  <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
@extends('layouts.app')
@section('content')
            <div class='container-fluid'>
                <div class='row'>
                    <div style="margin-bottom:60px"class='col-md-12'>
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid mx-auto img-circle text-center" style="border-radius: 48px;"
                                        src="{{ asset('photo/' . auth()->user()->photo) }}" alt="User profile picture">
                                </div>
                                
                                
                                <h3 class="profile-username text-center" style="margin-top: 16px;">{{auth()->user()->name}} </h3>
                                <p class="email text-center" style="margin-top: 4px;">{{auth()->user()->email}}</p>
                                
                                <form action="/profile" method = "post" class="form-horizontal" enctype="multipart/form-data" >
                                    @csrf
                                    <div class="card-body">
                                        
                                        <div style="margin-top:20px" class="form-group row mt-2" >
                                            <label for="name" class="col-sm-2 col-form-label">Ubah Nama</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="name" class="form-control" id="name" >
                                                </div>
                                        </div>
                                        <div style="margin-top:20px" class="form-group row mt-20">
                                            <label for="email" class="col-sm-2 col-form-label">Ubah Email</label>
                                                <div class="col-sm-10">
                                                    <input type="email" name="email" class="form-control" id="email">
                                                </div>
                                        </div>
                                        
                                        <div style="margin-top:20px"class="form-group row">
                                            <label for="photo" class="col-sm-2 col-form-label">Ubah Photo</label>
                                                <div class="col-sm-10">
                                                    <input type="file" name="photo" class="form-control" id="photo" >
                                                </div>
                                        </div>
                                        <p style="color:#98A2B3; font: size 16px; margin-left:208px; margin-top:4px; width:10%; border-radius:12px">Format  :png</p>
                                    </div>

                                    <button style="background-color: #4BA30D; color: white;"id="update-profile-btn" type="submit" class="btn btn-info">Update Profile</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    

    
@endsection
    