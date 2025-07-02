<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $kategoris = Kategori::all();
        $produks = Produk::with('kategori')->latest()->take(8)->get();

        return view('home', compact('kategoris', 'produks'));
    }
}
