<?php


use App\Http\Controllers\Auth\SocialiteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UlasanController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;

use App\Http\Controllers\ProfileController;

use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\BelirukoController;
use App\Http\Controllers\AgenController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\JualController;



Route::get('/', function () {
    return view('Auth.Login');
})->middleware('guest');


// Auth::routes();
// Authentication Routes...
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
Route::get('/ulasan', [UlasanController::class, 'index'])->name('ulasan.index');
Route::get('/ulasan/create', [UlasanController::class, 'create'])->name('ulasan.create');
Route::post('/ulasan', [UlasanController::class, 'store'])->name('ulasan.store');

//Rute dashboard
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/admin/dashboard', [AdminController::class, 'show'])->name('admin.dashboard');
    Route::get('/admin/profile', [AdminController::class, 'profile'])->name('admin.profile');
    Route::get('/admin/tambahagen', [AdminController::class, 'agen'])->name('admin.addAgen');
});




// ------- keranjang --------
Route::get('/keranjang', [KeranjangController::class, 'show'])->name('user.keranjang');
Route::get('/checkout', [KeranjangController::class, 'checkout'])->name('user.checkout');
Route::post('/checkout', [KeranjangController::class, 'processCheckout'])->name('user.checkout');
Route::delete('/keranjang/{id}', [KeranjangController::class, 'destroy'])->name('keranjang.destroy');
Route::post('add_cart/{id}', [KeranjangController::class, 'add_cart'])->name('add_cart');


// Route::get('/berita', function () {
//     return view('berita');
// });
Route::get('/berita', [BeritaController::class, "index"])->name('berita.index');
Route::put('/posts/{id}', [BeritaController::class, 'update'])->name('posts.update');
Route::delete('/posts/{id}', [BeritaController::class, 'destroy'])->name('posts.destroy');
Route::post('/berita', [BeritaController::class, 'store'])->name('berita.store');


//route fitu beli ruko 
Route::get('/beli', [BelirukoController::class, 'index'])->name('beli.index');


//route agen
Route::get('/cariagen', [AgenController::class, 'show']);
//tambah agen

//Rute Fitur Beli Bahan bagunan
Route::get('/materials/belibahanbangunan', [ProductController::class, 'index'])->name('belibahanbangunan.index');
Route::get('/materials/halaman2', [ProductController::class, 'show'])->name('hal2.index');
Route::get('/materials/halaman3', [ProductController::class, 'show2'])->name('hal3.index');

//Rute views detail Produk
Route::get('/materials/ProductDetail/semen', [ProductController::class, 'show3'])->name('semen1.index');
Route::get('/materials/ProductDetail/Besibeton', [ProductController::class, 'show4'])->name('besi.index');
Route::get('/materials/ProductDetail/WP', [ProductController::class, 'show5'])->name('wp.index');
Route::get('/materials/ProductDetail/Cat', [ProductController::class, 'show6'])->name('cat.index');
Route::get('/materials/ProductDetail/genteng', [ProductController::class, 'show7'])->name('genteng.index');
Route::get('/materials/ProductDetail/lantai', [ProductController::class, 'show8'])->name('lantai.index');
Route::get('/materials/ProductDetail/pipa', [ProductController::class, 'show10'])->name('pipa.index');
Route::get('/materials/ProductDetail/bajari', [ProductController::class, 'show9'])->name('bajari.index');
