<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ asset('css/ulasan.css') }}">
  <link rel="stylesheet" href="{{ 'css/profile.css' }}">
  {{-- CKEditor CDN --}}
  <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Profile') }}</div>
    
                <div class="card-body">
                    <form method="POST" href="/profile" enctype="multipart/form-data">
                        @csrf
    
                        @if (session('success'))
                            <div class="alert alert-success" role="alert" class="text-danger">
                                {{ session('success') }}
                            </div>
                        @endif
  
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="name" class="form-label">Photo: </label>
                                <input id="photo" type="file" class="form-control @error('photo') is-invalid @enderror" name="photo" value="{{ old('photo') }}"  autocomplete="photo">
  
                                @error('photo')
                                    <span role="alert" class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
  
                            <div class="mb-3 col-md-6">
                                <img src="{{ ('photo/' . auth()->user()->photo) }}" style="width:80px;margin-top: 10px;">
                            </div>
  
                        </div>
  
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="name" class="form-label">Name: </label>
                                <input class="form-control" type="text" id="name" name="name" value="{{ auth()->user()->name }}" autofocus="" >
                                @error('name')
                                    <span role="alert" class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
   
                            <div class="mb-3 col-md-6">
                                <label for="email" class="form-label">Email: </label>
                                <input class="form-control" type="text" id="email" name="email" value="{{ auth()->user()->email }}" autofocus="" >
                                @error('email')
                                    <span role="alert" class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
   
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="password" class="form-label">Password: </label>
                                <input class="form-control" type="password" id="password" name="password" autofocus="" >
                                @error('password')
                                    <span role="alert" class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
   
                            <div class="mb-3 col-md-6">
                                <label for="confirm_password" class="form-label">Confirm Password: </label>
                                <input class="form-control" type="password" id="confirm_password" name="confirm_password" autofocus="" >
                                @error('confirm_password')
                                    <span role="alert" class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
   
    
                        <div class="row mb-0">
                            <div class="col-md-12 offset-md-5">
                                <button type="submit" class="btn btn-primary" style="background-color:green; color:white">
                                    {{ __('Update Profile') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script>
    document.getElementById('update-profile-btn').addEventListener('click', function() {
        Swal.fire({
            icon: 'success',
            title: 'Profile Updated!',
            text: 'Your profile has been successfully updated.',
            showConfirmButton: false,
            timer: 2000 // Durasi notifikasi dalam milidetik
        });
    });
</script>
    
