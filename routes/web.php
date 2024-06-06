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
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\BelirukoController;
use App\Http\Controllers\AgenController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\JualController;
use App\Http\Controllers\RentalRumahController;


use App\Http\Controllers\CommentController;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\JanjiTemuController;
use App\Http\Controllers\RentalRumahController;

use App\Http\Controllers\BeliRumahController;






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



Route::get('/profile', [ProfileController::class, 'profileView']);
Route::post('/profile', [ProfileController::class, 'updateProfile']);








Route::get('/admin/rumah', [AdminController::class, 'rumah'])->name('admin.rumah');
Route::get('/admin/beli_rumah', [AdminController::class, 'rumah'])->name('admin.beli_rumah');
Route::post('/admin/rumah', [AdminController::class, 'add_rumah'])->name('admin.rumah');



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
Route::view('/', 'beranda')->name('beranda')->middleware('auth');


//Rute Fitur Ulasan
Route::get('/ulasan', [UlasanController::class, 'index'])->name('ulasan.index');
Route::get('/ulasan/create', [UlasanController::class, 'create'])->name('ulasan.create');
Route::post('/ulasan', [UlasanController::class, 'store'])->name('ulasan.store');

//Rute dashboard
Route::group(['prefix' => 'admin'], function () {

    

    Route::get('/admin/dashboard', [AdminController::class, 'show'])->name('admin.dashboard');
    Route::get('/admin/profile', [AdminController::class, 'profile'])->name('admin.profile');
    Route::get('/admin/tambahagen', [AdminController::class, 'addAgen'])->name('admin.addAgen');
    Route::post('/admin/tambahagen', [AdminController::class, 'storeAgen'])->name('admin.storeAgen');
});




// ------- keranjang --------
Route::get('/keranjang', [KeranjangController::class, 'show'])->name('user.keranjang');
Route::get('/checkout', [KeranjangController::class, 'checkout'])->name('user.checkout');
Route::post('/checkout', [KeranjangController::class, 'processCheckout'])->name('user.checkout');
Route::delete('/keranjang/{id}', [KeranjangController::class, 'destroy'])->name('keranjang.destroy');
Route::post('add_cart/{id}', [KeranjangController::class, 'add_cart'])->name('add_cart');

// add fav
Route::get('/favorite', [FavoriteController::class, 'show'])->name('favorite');
Route::delete('/favorite/{id}', [FavoriteController::class, 'destroy'])->name('favorite.destroy');
Route::post('add_favorite/{id}', [FavoriteController::class, 'add_favorite'])->name('add_favorite');





// ROUTE ADMIN ruko
Route::get('/beli', [BelirukoController::class, 'index'])->name('beli.index');
Route::prefix('admin')->middleware('cek_login:admin')->group(function () {

    

 
    Route::get('ruko', [AdminController::class, 'ruko'])->name('admin.ruko');
    Route::post('ruko', [AdminController::class, 'add_ruko'])->name('admin.ruko');
    Route::get('get_ruko_by_id/{id}', [AdminController::class, 'get_ruko_by_id'])->name('admin.get_ruko_by_id');

    Route::get('get_rumah_by_id/{id}', [AdminController::class, 'get_rumah_by_id'])->name('admin.get_rumah_by_id');

Route::post('update_rumah/{id}', [AdminController::class, 'update_rumah'])->name('admin.update_rumah');

    Route::post('update_ruko/{id}', [AdminController::class, 'update_ruko'])->name('admin.update_ruko');

    Route::get('destroy_ruko/{id}', [AdminController::class, 'destroy_ruko'])->name('admin.destroy_ruko');

    Route::get('profile', [AdminController::class, 'profile'])->name('admin.profile');
});


//route fitu beli ruko 
Route::get('/beli', [BelirukoController::class, 'index'])->name('beli.index');
Route::get('ruko/{id}', [BelirukoController::class, 'show'])->name('ruko');



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



//Rute Agen
Route::get('/cariagen', [AgenController::class, 'index'])->name('agen.cariagen');
Route::get('/agen/{id}', [AgenController::class, 'show'])->name('agen.detailagen');

// FAQ Admin
Route::get('/admin/faq/faq', [FAQController::class, 'adminIndex'])->name('admin.faq.index');
// Route::get('/admin/faq/faq', [FAQController::class, 'index'])->name('admin.faq.index');
// Route::post('/admin/faq/faq/store', [FAQController::class, 'delete'])->name('faq.store');
Route::delete('/admin/faq/{id}', [FAQController::class, 'delete'])->name('faq.delete');
Route::get('/faq/{id}', [FAQController::class, 'show'])->name('faq.show');
Route::get('/faq/edit/{id}', [FAQController::class, 'edit'])->name('faq.edit');
Route::put('/faq/{id}', [FAQController::class, 'update'])->name('faq.update');
Route::match(['post', 'put'], '/faq', [FAQController::class, 'storeOrUpdate'])->name('faq.storeOrUpdate');
Route::post('/admin/faq/faq', [FAQController::class, 'store'])->name('faq.store');
Route::put('/faq/edit/{id}', [FAQController::class, 'edit'])->name('faq.edit');

// FAQ
// Route::get('/faq', [FAQController::class, "index"])->name('faq.index');
Route::get('/faq', [FAQController::class, 'userIndex'])->name('user.faq.index');

// Jual
Route::resource('jual', JualController::class);
Route::get('/juals', [JualController::class, 'index']);
Route::post('jual/{jual}/comments', [CommentController::class, 'store'])->name('comments.store');


// Route Rental Rumah
Route::get('profile', [AdminController::class, 'profile'])->name('admin.profile');

Route::get('rumah', [AdminController::class, 'rumah'])->name('admin.rumah');
Route::post('rumah', [AdminController::class, 'add_rumah'])->name('admin.rumah');
Route::get('get_rumah_by_id/{id}', [AdminController::class, 'get_rumah_by_id'])->name('admin.get_rumah_by_id');

Route::post('update_rumah/{id}', [AdminController::class, 'update_rumah'])->name('admin.update_rumah');

Route::get('destroy_rumah/{id}', [AdminController::class, 'destroy_rumah'])->name('admin.destroy_rumah');


//route fitur rental rumah
Route::get('/rental', [RentalRumahController::class, 'index'])->name('rental_rumah.index');
Route::get('/rumah/{id}', [RentalRumahController::class, 'show'])->name('rumah2');

//Route Beli Rumah
Route::get('/belirumah', [BeliRumahController::class, 'index'])->name('belirumah.index');
Route::get('/rumah/{id}', [BeliRumahController::class, 'show'])->name('rumah1');
Route::get('/admin/belirumah1', [BeliRumahController::class, 'rumah'])->name('admin.belirumah1');
Route::post('/admin/belirumah1', [BeliRumahController::class, 'add_rumah'])->name('admin.belirumah1');
Route::get('get_rumah_by_id/{id}', [BeliRumahController::class, 'get_rumah_by_id'])->name('admin.get_rumah_by_id');

    Route::post('update_rumah/{id}', [BeliRumahController::class, 'update_rumah'])->name('admin.update_rumah');
   
    Route::get('destroy_rumah/{id}', [BeliRumahController::class, 'destroy_rumah'])->name('admin.destroy_rumah');


//Route Janji Temu
Route::get('/list-janji-temu/{id}', [JanjiTemuController::class, 'index'])->name('janji-temu.index');
Route::get('/janji-temu/create/{id}', [JanjiTemuController::class, 'create'])->name('janji-temu.create');
Route::post('/janji-temu', [JanjiTemuController::class, 'store'])->name('janji-temu.store');

Route::get('/janji-temu/{janjiTemu}', [JanjiTemuController::class, 'show'])->name('janji-temu.show');
Route::get('/janji-temu/{janjiTemu}/edit', [JanjiTemuController::class, 'edit'])->name('janji-temu.edit');
Route::put('/janji-temu/{janjiTemu}', [JanjiTemuController::class, 'update'])->name('janji-temu.update');
Route::delete('/janji-temu/{janjiTemu}', [JanjiTemuController::class, 'destroy'])->name('janji-temu.destroy');

Route::post('/janji-temu/{id}/complete', [JanjiTemuController::class, 'complete'])->name('janji-temu.complete');
Route::post('/janji-temu/{id}/cancel', [JanjiTemuController::class, 'cancel'])->name('janji-temu.cancel');
Route::get('/janji-temu/{id}/reschedule', [JanjiTemuController::class, 'rescheduleForm'])->name('janji-temu.rescheduleForm');
Route::post('/janji-temu/{id}/reschedule', [JanjiTemuController::class, 'reschedule'])->name('janji-temu.reschedule');  



