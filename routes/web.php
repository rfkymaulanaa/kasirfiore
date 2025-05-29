<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StokController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('produk/{produk}/edit', [ProdukController::class, 'edit'])->name('produk.edit');
Route::get('produk', [ProdukController::class, 'index'])->name('produk');
Route::get('produk/create', [ProdukController::class, 'create'])->name('produk.create');
Route::get('produk/{produk}', [ProdukController::class, 'show'])->name('produk.show');
Route::put('produk/{produk}', [ProdukController::class, 'update'])->name('produk.update');
Route::post('produk', [ProdukController::class, 'store'])->name('produk.store');
Route::delete('produk/{produk}', [ProdukController::class, 'destroy'])->name('produk.destroy');
Route::get('search', [ProdukController::class, 'search'])->name('produk.search');

Route::get('/stok', [StokController::class, 'index'])->name('stok');
Route::get('/stok/{stok}/edit', [StokController::class, 'edit'])->name('stok.edit');
Route::put('/stok/{stok}', [StokController::class, 'update'])->name('stok.update');


Route::get('/pembelian', [PembelianController::class, 'index'])->name('pembelian');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
