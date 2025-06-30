<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PembelianController;

Route::get('/', function () {
    return view('auth.login');
})->middleware('guest')->name('login');

Route::middleware(['auth'])->group(function () {

    Route::middleware(['admin'])->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('user', UserController::class);
        Route::get('export-excel', [DashboardController::class, 'exportExcel'])->name('export.excel');
        Route::get('export-pdf', [DashboardController::class, 'exportPdf'])->name('export.pdf');
    });

    Route::middleware(['petugas'])->group(function () {
        Route::prefix('cart')->name('cart.')->group(function () {
            Route::get('/', [CartController::class, 'index'])->name('index');
            Route::post('/add', [CartController::class, 'add'])->name('add');
            Route::post('/update', [CartController::class, 'update'])->name('update');
            Route::post('/remove', [CartController::class, 'remove'])->name('remove');
        });

        Route::prefix('checkout')->name('checkout.')->group(function () {
            Route::get('', [CheckoutController::class, 'index'])->name('index');
            Route::post('', [CheckoutController::class, 'store'])->name('store');
            Route::get('/success', function () {
                return view('checkout.success');
            })->name('success');
        });

        Route::resource('pembelian', PembelianController::class);
        Route::get('/cek-member', [CheckoutController::class, 'cekMember'])->name('cek-member');
    });


    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('destroy');
    });

    Route::get('/checkout/success/{id}', [CheckoutController::class, 'show'])->name('checkout.success');
    Route::get('search', [ProdukController::class, 'search'])->name('produk.search');
    Route::resource('produk', ProdukController::class);
    Route::resource('stok', StokController::class);
});

// Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/user', [UserController::class, 'index'])->name('user.index');
// Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
// Route::post('/user', [UserController::class, 'store'])->name('user.store');
// Route::get('/user/edit', [UserController::class, 'edit'])->name('user.edit');
// Route::get('/user/show', [UserController::class, 'show'])->name('user.show');
// Route::put('/user/update', [UserController::class, 'update'])->name('user.update');


// Route::get('produk/{produk}/edit', [ProdukController::class, 'edit'])->name('produk.edit');
// Route::get('produk', [ProdukController::class, 'index'])->name('produk');
// Route::get('produk/create', [ProdukController::class, 'create'])->name('produk.create');
// Route::get('produk/{produk}', [ProdukController::class, 'show'])->name('produk.show');
// Route::put('produk/{produk}', [ProdukController::class, 'update'])->name('produk.update');
// Route::post('produk', [ProdukController::class, 'store'])->name('produk.store');
// Route::delete('produk/{produk}', [ProdukController::class, 'destroy'])->name('produk.destroy');
// Route::get('search', [ProdukController::class, 'search'])->name('produk.search');

// Route::get('/stok', [StokController::class, 'index'])->name('stok');
// Route::get('/stok/{stok}/edit', [StokController::class, 'edit'])->name('stok.edit');
// Route::put('/stok/{stok}', [StokController::class, 'update'])->name('stok.update');

// Route::get('/pembelian', [PembelianController::class, 'index'])->name('pembelian');

// Route::prefix('cart')->name('cart.')->group(function () {
//     Route::get('/', [CartController::class, 'index'])->name('index');
//     Route::post('/add', [CartController::class, 'add'])->name('add');
//     Route::post('/update', [CartController::class, 'update'])->name('update');
//     Route::post('/remove', [CartController::class, 'remove'])->name('remove');
// });

// Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
// Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
// // Route::get('/checkout/success/{id}', function() {
// //     return view('checkout.success')->name('checkout.success');
// // });
// Route::get('/checkout/success/{id}', [CheckoutController::class, 'show'])->name('checkout.success');

// Route::get('/cek-member', [CheckoutController::class, 'cekMember']);

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// Route::get('/checkout/success', [CheckoutController::class, 'show'])->name('checkout.success');

require __DIR__ . '/auth.php';
