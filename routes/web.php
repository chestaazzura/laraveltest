<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\Dashboard;

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/dashboard', [Dashboard::class, 'index'])->name('dashboard.index');

Route::prefix('kategori')->group(function () {
    Route::get('/', [KategoriController::class, 'index'])->name('kategori.index');
    Route::get('/create', [KategoriController::class, 'create'])->name('kategori.create');
    Route::post('/', [KategoriController::class, 'store'])->name('kategori.store');
    Route::get('/{kategori}', [KategoriController::class, 'show'])->name('kategori.show');
    Route::get('/{kategori}/edit', [KategoriController::class, 'edit'])->name('kategori.edit');
    Route::put('/{kategori}', [KategoriController::class, 'update'])->name('kategori.update');
    Route::delete('/{kategori}', [KategoriController::class, 'destroy'])->name('kategori.destroy');
});
Route::prefix('produks')->group(function () {
        Route::get('/', [ProdukController::class, 'index'])->name('produks.index');
        Route::get('/create', [ProdukController::class, 'create'])->name('produks.create');
        Route::post('/store', [ProdukController::class, 'store'])->name('produks.store');
        Route::get('/{produk}', [ProdukController::class, 'show'])->name('produks.show');
        Route::get('/{produk}/edit', [ProdukController::class, 'edit'])->name('produks.edit');
        Route::put('/{produk}', [ProdukController::class, 'update'])->name('produks.update');
        Route::delete('/{produk}', [ProdukController::class, 'destroy'])->name('produks.destroy');
});

Route::prefix('admin')->group(function () {
    Route::get('login-admin')->name('login-admin');
    Route::get('/dashboard', [Dashboard::class, 'index'])->name('dashboard.index');
    Route::get('/', [HomeController::class, 'index'])->name('home.index');
});
Route::prefix('pengguna')->group(function () {
    Route::get('login-pengguna')->name('login-pengguna');
    
});


Route::get('/alatmakan', function () {
    return view('alatmakan');
});

Route::get('/alatmandi', function () {
    return view('alatmandi');
});

Route::get('/mainan', function () {
    return view('mainan');
});