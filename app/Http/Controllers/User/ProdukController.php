<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index(Request $request)
    {
        $query = Produk::with('kategori');

        // Filter berdasarkan pencarian
        if ($request->has('search')) {
            $query->where('nama_produk', 'like', '%' . $request->search . '%');
        }

        // Filter berdasarkan kategori
        if ($request->has('kategori')) {
            $query->where('id_kategori', $request->kategori);
        }

        $produks = $query->paginate(12);
        $kategoris = Kategori::all();

        return view('user.produks.index', compact('produks', 'kategoris'));
    }

    public function show(Produk $produk)
    {
        $relatedProducts = Produk::where('id_kategori', $produk->id_kategori)
            ->where('id', '!=', $produk->id)
            ->take(4)
            ->get();

        return view('user.produks.show', compact('produk', 'relatedProducts'));
    }

    public function byCategory(Kategori $kategori)
    {
        $produks = Produk::where('id_kategori', $kategori->id)
            ->with('kategori')
            ->paginate(12);

        $kategoris = Kategori::all();

        return view('user.produks.category', compact('produks', 'kategori', 'kategoris'));
    }
}
