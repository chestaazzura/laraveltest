<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\ProdukController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\User\ProdukController as UserProdukController;
use App\Http\Controllers\User\HomeController as UserHomeController;

// Authentication Routes
require __DIR__ . '/auth.php';

// User Routes (Public)
Route::get('/', [UserHomeController::class, 'index'])->name('home');

Route::prefix('user')->name('user.')->group(function () {
    Route::get('/produks', [UserProdukController::class, 'index'])->name('produks.index');
    Route::get('/produks/{produk}', [UserProdukController::class, 'show'])->name('produks.show');
    Route::get('/produks/category/{kategori}', [UserProdukController::class, 'byCategory'])->name('produks.category');
});

// Admin Routes (Protected)
Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Kategori Management
    Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
    Route::get('/kategori/create', [KategoriController::class, 'create'])->name('kategori.create');
    Route::post('/kategori', [KategoriController::class, 'store'])->name('kategori.store');
    Route::get('/kategori/{kategori}', [KategoriController::class, 'show'])->name('kategori.show');
    Route::get('/kategori/{kategori}/edit', [KategoriController::class, 'edit'])->name('kategori.edit');
    Route::put('/kategori/{kategori}', [KategoriController::class, 'update'])->name('kategori.update');
    Route::delete('/kategori/{kategori}', [KategoriController::class, 'destroy'])->name('kategori.destroy');

    // Produk Management
    Route::get('/produks', [ProdukController::class, 'index'])->name('produks.index');
    Route::get('/produks/create', [ProdukController::class, 'create'])->name('produks.create');
    Route::post('/produks', [ProdukController::class, 'store'])->name('produks.store');
    Route::get('/produks/{produk}', [ProdukController::class, 'show'])->name('produks.show');
    Route::get('/produks/{produk}/edit', [ProdukController::class, 'edit'])->name('produks.edit');
    Route::put('/produks/{produk}', [ProdukController::class, 'update'])->name('produks.update');
    Route::delete('/produks/{produk}', [ProdukController::class, 'destroy'])->name('produks.destroy');

    // Customer Management
    Route::get('/customers', function () {
        return view('admin.customers.index');
    })->name('customers.index');

    // Order Management  
    Route::get('/orders', function () {
        return view('admin.orders.index');
    })->name('orders.index');

    Route::get('/orders/payments', function () {
        return view('admin.orders.payments');
    })->name('orders.payments');

    // Reports
    Route::get('/reports', function () {
        return view('admin.reports.index');
    })->name('reports.index');

    // Profile Management
    Route::get('/profile', function () {
        return view('admin.profile.show');
    })->name('profile.show');
    Route::put('/profile', function () {
        // Profile update logic will be added later
        return redirect()->route('admin.profile.show')->with('success', 'Profile updated successfully');
    })->name('profile.update');
});
