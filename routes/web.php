<?php
use App\Http\Controllers\daftar_ulasan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UlasanController;

Route::get('/', function () {
    return view('Auth.Login');
})->middleware('guest');

//Login
// Show login form
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('Auth.login');
// Handle login form submission
Route::post('/login', [LoginController::class, 'login']);


//Register
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('Auth.register');
Route::post('/register', [RegisterController::class, 'register']);

//Rute Auth
Route::view('/beranda', 'beranda')->name('beranda')->middleware('auth');

//Rute Fitur Ulasan
Route::get('/ulasan', [UlasanController::class, 'create'])->name('ulasan.create');
Route::post('/ulasan', [UlasanController::class, 'store'])->name('ulasan.store');
Route::get('/ulasan', [UlasanController::class, 'store'])->name('ulasan.store');

//Route Ulasan ke Beranda dan Beranda ke Ulasan
Route::get('/beranda', function(){
    return view('beranda');
})->name('guest');

Route::get('/ulasan', function(){
    return view('Ulasan.ulasan');
})->name('ulasan');

// Route untuk menampilkan halaman daftar ulasan (masih belum fix)
Route::get('/daftar_ulasan', [daftar_ulasan::class, 'index'])->name('daftar_ulasan');
Route::get('/daftar_ulasan/list', [daftar_ulasan::class, 'list'])->name('daftar_ulasan_list');
Route::post('/daftar_ulasan/store', [daftar_ulasan::class, 'store'])->name('daftar_ulasan.store');