<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
         $produks = Produk::with('kategori')->paginate(12);
   
        return view('produk', compact('produks'));
    }

    public function create()
    {
        $kategoris = Kategori::all();
        return view('produk.create', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_produk' => 'required|unique:produks',
            'id_kategori' => 'required',
            'nama_produk' => 'required',
            'harga' => 'required|numeric',
            'stock' => 'required|integer',
        ]);

        Produk::create($request->all());

        return redirect()->route('produks.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function show(Produk $produk)
    {
        return view('produk.show', compact('produk'));
    }

    public function edit(Produk $produk)
    {
        $kategoris = Kategori::all();
        return view('produk.edit', compact('produk', 'kategoris'));
    }

    public function update(Request $request, Produk $produk)
    {
        $request->validate([
            'id_produk' => 'required|unique:produks,id_produk,' . $produk->id,
            'id_kategori' => 'required',
            'nama_produk' => 'required',
            'harga' => 'required|numeric',
            'stock' => 'required|integer',
        ]);

        $produk->update($request->all());

        return redirect()->route('produks.index')->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy(Produk $produk)
    {
        $produk->delete();
        return redirect()->route('produks.index')->with('success', 'Produk berhasil dihapus.');
    }
}
