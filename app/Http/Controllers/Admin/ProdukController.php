<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    public function index()
    {
        $produks = Produk::with('kategori')->paginate(12);
        return view('admin.produks.index', compact('produks'));
    }

    public function create()
    {
        $kategoris = Kategori::all();
        return view('admin.produks.create', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_kategori' => 'required',
            'nama_produk' => 'required',
            'harga' => 'required|numeric',
            'stock' => 'required|integer',
            'image_url' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only(['id_kategori', 'nama_produk', 'harga', 'stock']);

        if ($request->hasFile('image_url')) {
            $file = $request->file('image_url');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/uploads/produk', $filename);
            $data['image_url'] = 'uploads/produk/' . $filename;
        }
        $lastProduk = Produk::orderByDesc('id')->first();
        $nextNumber = $lastProduk ? ((int)substr($lastProduk->kode_produk, 3)) + 1 : 1;
        $data['kode_produk'] = 'PRD' . str_pad($nextNumber, 3, '0', STR_PAD_LEFT);
        Produk::create($data);

        return redirect()->route('admin.produks.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function show(Produk $produk)
    {
        return view('admin.produks.show', compact('produk'));
    }

    public function edit(Produk $produk)
    {
        $kategoris = Kategori::all();
        return view('admin.produks.edit', compact('produk', 'kategoris'));
    }

    public function update(Request $request, Produk $produk)
    {
        $request->validate([
            'id_kategori' => 'required',
            'nama_produk' => 'required',
            'harga' => 'required|numeric',
            'stock' => 'required|integer',
            'image_url' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $data = $request->only(['id_kategori', 'nama_produk', 'harga', 'stock']);

        // Cek jika user upload gambar baru
        if ($request->hasFile('image_url')) {
            // Hapus gambar lama
            if ($produk->image_url && Storage::exists('public/uploads/produk/' . $produk->image_url)) {
                Storage::delete('public/uploads/produk/' . $produk->image_url);
            }

            // Simpan gambar baru
            $file = $request->file('image_url');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/uploads/produk', $filename);
            $data['image_url'] = 'uploads/produk/' . $filename;
        }

        $produk->update($data);

        return redirect()->route('admin.produks.index')->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy(Produk $produk)
    {
        // Hapus gambar jika ada
        if ($produk->image_url && Storage::exists('public/uploads/produk/' . $produk->image_url)) {
            Storage::delete('public/uploads/produk/' . $produk->image_url);
        }

        $produk->delete();

        return redirect()->route('admin.produks.index')->with('success', 'Produk berhasil dihapus.');
    }
}
