<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\JudulController;
use App\Http\Controllers\utamaController;
use App\Http\Controllers\Admin\InformasiController;
use App\Http\Controllers\Admin\TentangKamiController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\KeranjangController;




//halaman utama
//Route::middleware('auth')->group(function () {
Route::get('/', [utamaController::class, 'index']);
Route::get('/', [UtamaController::class, 'index'])->name('index');
Route::get('/products', [UtamaController::class, 'showAllProducts'])->name('products.index');
//});
Route::middleware('auth')->group(function () {
    Route::post('/tambah-ke-keranjang/{productId}', [KeranjangController::class, 'tambahkanKeKeranjang'])->name('keranjang.tambah');
    Route::get('/keranjang', [KeranjangController::class, 'index'])->name('keranjang');
    Route::put('/keranjang/{id}', [KeranjangController::class, 'update'])->name('keranjang.update');
    Route::delete('/keranjang/{id}', [KeranjangController::class, 'hapus'])->name('keranjang.hapus');
});



//route untuk judull
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', function () {
        return redirect()->route('admin.judul.index');
    })->name('admin.dashboard');

    Route::get('judul', [JudulController::class, 'index'])->name('admin.judul.index');
    Route::get('judul/create', [JudulController::class, 'create'])->name('admin.judul.create');
    Route::post('judul', [JudulController::class, 'store'])->name('admin.judul.store');
    Route::get('judul/{judul}', [JudulController::class, 'show'])->name('admin.judul.show');
    Route::get('judul/{judul}/edit', [JudulController::class, 'edit'])->name('admin.judul.edit');
    Route::put('judul/{judul}', [JudulController::class, 'update'])->name('admin.judul.update');
    Route::delete('judul/{judul}', [JudulController::class, 'destroy'])->name('admin.judul.destroy');
});

//route untuk informasi
Route::prefix('admin')->middleware('admin')->group(function () {
    Route::get('/informasi', [InformasiController::class, 'index'])->name('admin.informasi.index');
    Route::get('/informasi/create', [InformasiController::class, 'create'])->name('admin.informasi.create');
    Route::post('/informasi', [InformasiController::class, 'store'])->name('admin.informasi.store');
    Route::get('/informasi/{informasi}/edit', [InformasiController::class, 'edit'])->name('admin.informasi.edit');
    Route::put('/informasi/{informasi}', [InformasiController::class, 'update'])->name('admin.informasi.update');
    Route::delete('/informasi/{informasi}', [InformasiController::class, 'destroy'])->name('admin.informasi.destroy');
});

// untuk mengakses tentang kami di halaman admin 
Route::group(['middleware' => 'admin'], function () {
    Route::get('tentangkami', [TentangKamiController::class, 'index'])->name('tentangkami.index');
    Route::get('tentangkami/create', [TentangKamiController::class, 'create'])->name('tentangkami.create');
    Route::post('tentangkami', [TentangKamiController::class, 'store'])->name('tentangkami.store');
    Route::get('tentangkami/{tentangkami}/edit', [TentangKamiController::class, 'edit'])->name('tentangkami.edit');
    Route::put('tentangkami/{tentangkami}', [TentangKamiController::class, 'update'])->name('tentangkami.update');
    Route::delete('tentangkami/{tentangkami}', [TentangKamiController::class, 'destroy'])->name('tentangkami.destroy');
});

// route untuk mengakses product dihalaman admin 
Route::group(['middleware' => 'admin'], function () {
    Route::get('/admin/products', [ProductController::class, 'index'])->name('admin.products.index');
    Route::get('/admin/products/create', [ProductController::class, 'create'])->name('admin.products.create');
    Route::post('/admin/products', [ProductController::class, 'store'])->name('admin.products.store');
    Route::get('/admin/products/{product}/edit', [ProductController::class, 'edit'])->name('admin.products.edit');
    Route::put('/admin/products/{product}', [ProductController::class, 'update'])->name('admin.products.update');
    Route::delete('/admin/products/{product}', [ProductController::class, 'destroy'])->name('admin.products.destroy');
});


//ketika user mengakses admin maka di arahkan ke index
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


//route untuk login register dan sejenisnya
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


//untuk mengakses halaman admin
route::get('admin/dashboard',[HomeController::class,'index'])->
    middleware(['auth','admin']);
    Route::get('admin/dashboard', [HomeController::class,'index'])->name('admin.dashboard')->middleware(['auth', 'admin']);



