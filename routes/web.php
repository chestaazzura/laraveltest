<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProdukController;

Route::get('/', [HomeController::class, 'index'])->name('home');


// Kategori Routes
Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
Route::get('/kategori/create', [KategoriController::class, 'create'])->name('kategori.create');
Route::post('/kategori', [KategoriController::class, 'store'])->name('kategori.store');
Route::get('/kategori/{kategori}', [KategoriController::class, 'show'])->name('kategori.show');
Route::get('/kategori/{kategori}/edit', [KategoriController::class, 'edit'])->name('kategori.edit');
Route::put('/kategori/{kategori}', [KategoriController::class, 'update'])->name('kategori.update');
Route::delete('/kategori/{kategori}', [KategoriController::class, 'destroy'])->name('kategori.destroy');

// Produk Routes
Route::get('/produks', [ProdukController::class, 'index'])->name('produks.index');
Route::get('/produks/create', [ProdukController::class, 'create'])->name('produks.create');
Route::post('/produks', [ProdukController::class, 'store'])->name('produks.store');
Route::get('/produks/{produk}', [ProdukController::class, 'show'])->name('produks.show');
Route::get('/produks/{produk}/edit', [ProdukController::class, 'edit'])->name('produks.edit');
Route::put('/produks/{produk}', [ProdukController::class, 'update'])->name('produks.update');
Route::delete('/produks/{produk}', [ProdukController::class, 'destroy'])->name('produks.destroy');


Route::get('/alatmakan', function () {
    return view('alatmakan');
});

Route::get('/alatmandi', function () {
    return view('alatmandi');
});

Route::get('/mainan', function () {
    return view('mainan');
});