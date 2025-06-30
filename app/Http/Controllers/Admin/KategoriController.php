<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KategoriController extends Controller
{
    public function index()
    {
        $kategoris = Kategori::all();
        return view('admin.kategori.index', compact('kategoris'));
    }

    public function create()
    {
        return view('admin.kategori.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'image_url' => 'nullable|string',
        ]);

        $data = $request->only('nama_kategori', 'deskripsi', 'image_url');

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('uploads/kategori', 'public');
            $data['image_url'] = $imagePath;
        }

        Kategori::create($data);

        return redirect()->route('admin.kategori.index')
            ->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function show(Kategori $kategori)
    {
        return view('admin.kategori.show', compact('kategori'));
    }

    public function edit(Kategori $kategori)
    {
        return view('admin.kategori.edit', compact('kategori'));
    }

    public function update(Request $request, Kategori $kategori)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'image_url' => 'nullable|string',
        ]);

        $data = $request->only('nama_kategori', 'deskripsi', 'image_url');

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($kategori->image_url && Storage::disk('public')->exists($kategori->image_url)) {
                Storage::disk('public')->delete($kategori->image_url);
            }

            $imagePath = $request->file('image')->store('uploads/kategori', 'public');
            $data['image_url'] = $imagePath;
        }

        $kategori->update($data);

        return redirect()->route('admin.kategori.index')
            ->with('success', 'Kategori berhasil diperbarui.');
    }

    public function destroy(Kategori $kategori)
    {
        // Delete image if exists
        if ($kategori->image_url && Storage::disk('public')->exists($kategori->image_url)) {
            Storage::disk('public')->delete($kategori->image_url);
        }

        $kategori->delete();

        return redirect()->route('admin.kategori.index')
            ->with('success', 'Kategori berhasil dihapus.');
    }
}
