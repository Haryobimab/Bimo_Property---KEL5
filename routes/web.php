<?php

use App\Http\Controllers\Auth\SocialiteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;


Route::get('/', function () {
    return view('login');
});

// Show login form
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

// Handle login form submission
Route::post('/login', [LoginController::class, 'login']);
// Route::get('/auth/redirect', [SocialiteController::class, 'redirect']);

// Route::get('/auth/google/callback', [SocialiteController::class, 'callback']);

Route::get('/user/register', [RegisterController::class, 'register']);
Route::post('/user/create', [RegisterController::class, 'create']);

Route::get('/beranda', function () {
    return view('beranda');
});


Route::get('/profile', [UserController::class, 'profile']);
// Route::get('/profile', [UserController::class, 'update_profile']);


Route::get('/admin/profile', function () {
    return view('admin/profileAdmin');
});