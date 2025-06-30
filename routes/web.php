<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\KategoriController as AdminKategoriController;
use App\Http\Controllers\Admin\ProdukController as AdminProdukController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\User\ProdukController as UserProdukController;
use App\Http\Controllers\User\HomeController as UserHomeController;

// Authentication Routes
require __DIR__ . '/auth.php';

// User Routes (Public)
Route::get('/', [UserHomeController::class, 'index'])->name('home.index');

Route::prefix('user')->name('user.')->group(function () {
    Route::get('/products', [UserProdukController::class, 'index'])->name('produks.index');
    Route::get('/products/{produk}', [UserProdukController::class, 'show'])->name('produks.show');
    Route::get('/category/{kategori}', [UserProdukController::class, 'byCategory'])->name('produks.category');
});

// Admin Routes (Protected)
Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Kategori Management
    Route::prefix('kategori')->name('kategori.')->group(function () {
        Route::get('/', [AdminKategoriController::class, 'index'])->name('index');
        Route::get('/create', [AdminKategoriController::class, 'create'])->name('create');
        Route::post('/', [AdminKategoriController::class, 'store'])->name('store');
        Route::get('/{kategori}', [AdminKategoriController::class, 'show'])->name('show');
        Route::get('/{kategori}/edit', [AdminKategoriController::class, 'edit'])->name('edit');
        Route::put('/{kategori}', [AdminKategoriController::class, 'update'])->name('update');
        Route::delete('/{kategori}', [AdminKategoriController::class, 'destroy'])->name('destroy');
    });

    // Produk Management
    Route::prefix('produks')->name('produks.')->group(function () {
        Route::get('/', [AdminProdukController::class, 'index'])->name('index');
        Route::get('/create', [AdminProdukController::class, 'create'])->name('create');
        Route::post('/store', [AdminProdukController::class, 'store'])->name('store');
        Route::get('/{produk}', [AdminProdukController::class, 'show'])->name('show');
        Route::get('/{produk}/edit', [AdminProdukController::class, 'edit'])->name('edit');
        Route::put('/{produk}', [AdminProdukController::class, 'update'])->name('update');
        Route::delete('/{produk}', [AdminProdukController::class, 'destroy'])->name('destroy');
    });
});

// Legacy routes for backward compatibility (redirect to new structure)
Route::get('/alatmakan', function () {
    return view('user.alatmakan');
});

Route::get('/alatmandi', function () {
    return view('user.alatmandi');
});

Route::get('/mainan', function () {
    return view('user.mainan');
});
