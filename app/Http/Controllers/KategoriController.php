<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    public function index()
    {
        $kategoris = Kategori::all();
        return view('kategori.index', compact('kategoris'));
    }

    public function create()
    {
        return view('kategori.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_kategori'    => 'required|unique:kategoris,id_kategori',
            'nama_kategori'  => 'required',
            // validasi tambahan jika perlu
        ]);

        Kategori::create($request->only([
            'id_kategori', 'nama_kategori', 'deskripsi', 'image_url'
        ]));

        return redirect()->route('kategori.index')->with('success','Kategori berhasil dibuat.');
    }

    public function show(Kategori $kategori)
    {
        return view('kategori.show', compact('kategori'));
    }

    public function edit(Kategori $kategori)
    {
        return view('kategori.edit', compact('kategori'));
    }

    public function update(Request $request, Kategori $kategori)
    {
        $request->validate([
            'id_kategori'    => 'required|unique:kategoris,id_kategori,'.$kategori->id,
            'nama_kategori'  => 'required',
        ]);

        $kategori->update($request->only([
            'id_kategori', 'nama_kategori', 'deskripsi', 'image_url'
        ]));

        return redirect()->route('kategori.index')->with('success','Kategori berhasil diperbarui.');
    }

    public function destroy(Kategori $kategori)
    {
        $kategori->delete();
        return redirect()->route('kategori.index')->with('success','Kategori berhasil dihapus.');
    }
}
