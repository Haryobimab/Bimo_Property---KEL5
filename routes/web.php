<?php

use App\Http\Controllers\Auth\SocialiteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('login');
});

// Show login form
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

// Handle login form submission
Route::post('/login', [LoginController::class, 'login']);
Route::get('/auth/redirect', [SocialiteController::class, 'redirect']);

Route::get('/auth/google/callback', [SocialiteController::class, 'callback']);