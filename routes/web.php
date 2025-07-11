<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\ProdukController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\User\ProdukController as UserProdukController;
use App\Http\Controllers\User\HomeController as UserHomeController;
use Faker\Provider\Payment;

// Authentication Routes
require __DIR__ . '/auth.php';

// User Routes (Public)
Route::get('/', [UserHomeController::class, 'index'])->name('home');

Route::prefix('user')->name('user.')->group(function () {
    Route::get('/produks', [UserProdukController::class, 'index'])->name('produks.index');
    Route::get('/produks/{produk}', [UserProdukController::class, 'show'])->name('produks.show');
    Route::get('/produks/category/{kategori}', [UserProdukController::class, 'byCategory'])->name('produks.category');
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile', [AuthController::class, 'profile'])->name('profile');
    Route::get('/orders', [AuthController::class, 'orderHistory'])->name('orders');
});

Route::post('/cart/add/{produk}', [CartController::class, 'add'])->name('cart.add');
Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::patch('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');
Route::post('/checkout/buynow/{produk}', [CartController::class, 'buyNow'])->name('checkout.buynow');
Route::post('/checkout/process', [CartController::class, 'processCheckout'])->name('checkout.process');
// Admin Routes (Protected)
Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // Order Management  
    // Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    // Route::get('/orders/payments', [OrderController::class, 'payments'])->name('orders.payments');
    Route::get('/orders', [\App\Http\Controllers\Admin\OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/payments', [\App\Http\Controllers\Admin\OrderController::class, 'payments'])->name('orders.payments');
    Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');
    Route::get('/payments/{pembayaran}', [PaymentController::class, 'show'])->name('payments.show');
    Route::patch('/orders/{order}/status', [OrderController::class, 'updateStatus'])->name('orders.updateStatus');
    Route::patch('/payments/{pembayaran}/status', [PaymentController::class, 'updateStatus'])->name('payments.updateStatus');
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

    Route::get('/customers', [\App\Http\Controllers\Admin\CustomerController::class, 'index'])->name('customers.index');
    // Reports
    // Route::get('/reports', [\App\Http\Controllers\Admin\ReportController::class, 'index'])->name('reports.index');

    // Profile Management
    Route::get('/profile', function () {
        return view('admin.profile.show');
    })->name('profile.show');
    Route::put('/profile', function () {
        // Profile update logic will be added later
        return redirect()->route('admin.profile.show')->with('success', 'Profile updated successfully');
    })->name('profile.update');
    // Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');
    // Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
    // Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    // Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
});
