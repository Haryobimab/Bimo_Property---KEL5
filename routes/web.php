<?php


use App\Http\Controllers\Auth\SocialiteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\daftar_ulasan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UlasanController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;


Route::get('/', function () {
    return view('Auth.Login');
})->middleware('guest');



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





Route::get('login', [AuthController::class,'index'])->name('login');
Route::get('register', [AuthController::class,'register'])->name('register');
Route::post('proses_login', [AuthController::class,'proses_login'])->name('proses_login');
Route::get('logout', [AuthController::class,'logout'])->name('logout');

Route::post('proses_register',[AuthController::class,'proses_register'])->name('proses_register');

// kita atur juga untuk middleware menggunakan group pada routing
// didalamnya terdapat group untuk mengecek kondisi login
// jika user yang login merupakan admin maka akan diarahkan ke AdminController
// jika user yang login merupakan user biasa maka akan diarahkan ke UserController
Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['cek_login:admin']], function () {
        Route::resource('admin', AdminController::class);
    });
    Route::group(['middleware' => ['cek_login:user']], function () {
        Route::resource('user', UserController::class);
    });
});

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

