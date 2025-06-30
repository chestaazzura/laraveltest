<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    // Tampilkan semua kategori
    public function index()
    {
        $kategoris = Kategori::all();
        return view('kategori.index', compact('kategoris'));
    }

    // Form tambah kategori
    public function create()
    {
        return view('kategori.create');
    }

    // Simpan kategori baru
    public function store(Request $request)
    {
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('kategori', 'public');
            $data['image_url'] = $imagePath;
        }

        Kategori::createKategori($request->only('nama_kategori', 'deskripsi', 'image_url'));

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil ditambahkan.');
    }

    // Form edit kategori
    public function edit($id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('kategori.edit', compact('kategori'));
    }

    // Update kategori
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'image_url' => 'nullable|string',
        ]);

        $kategori = Kategori::findOrFail($id);
        $kategori->updateKategori($request->only('nama_kategori', 'deskripsi', 'image_url'));

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diperbarui.');
    }

    // Hapus kategori
    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->deleteKategori();

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus.');
    }

    // Optional: Toggle status (misalnya aktif/nonaktif)
    public function toggleStatus($id)
    {
        try {
            $kategori = Kategori::findOrFail($id);
            $kategori->status = $kategori->status === 'aktif' ? 'nonaktif' : 'aktif';
            $kategori->save();

            return response()->json([
                'success' => true,
                'message' => 'Status kategori berhasil diperbarui.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal memperbarui status.'
            ], 500);
        }
    }
}
