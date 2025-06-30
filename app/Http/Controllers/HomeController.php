<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Produk;

class HomeController extends Controller
{
    public function index()
    {
       
        $categories = Kategori::all();
        $products = Produk::with('kategori')->get();
        // dd($products); tambah ini
        return view('home', compact('categories', 'products'));

    }
}
