@extends('layouts.dashboard')

@section('title', 'Ubah Produk')
@section('page-title', 'Ubah Produk')

@push('styles')
    <style>
        .produk-img {
            max-width: 180px;
            height: auto;
            object-fit: cover;
            border: 2px dashed #ced4da;
            border-radius: 10px;
        }
    </style>
@endpush

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 align-items-center">
                <div class="col-sm-6">
                    <h1 class="m-0"><i class="fas fa-edit"></i> Ubah Produk</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="card shadow">
                <div class="card-header bg-warning text-dark">
                    <h3 class="card-title"><i class="fas fa-pencil-alt"></i> Form Ubah Produk</h3>
                </div>
                <div class="card-body">
                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                    <form action="{{ route('admin.produks.update', $produk->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama_produk"><i class="fas fa-tag"></i> Nama Produk</label>
                                    <input type="text" class="form-control @error('nama_produk') is-invalid @enderror" name="nama_produk" value="{{ old('nama_produk', $produk->nama_produk) }}" required>
                                    @error('nama_produk')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="id_kategori"><i class="fas fa-list"></i> Kategori</label>
                                    <select name="id_kategori" class="form-control @error('id_kategori') is-invalid @enderror" required>
                                        <option value="">-- Pilih Kategori --</option>
                                        @foreach ($kategoris as $kategori)
                                            <option value="{{ $kategori->id }}" {{ old('id_kategori', $produk->id_kategori) == $kategori->id ? 'selected' : '' }}>
                                                {{ $kategori->nama_kategori }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('id_kategori')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="harga"><i class="fas fa-money-bill-wave"></i> Harga</label>
                                    <input type="number" name="harga" class="form-control @error('harga') is-invalid @enderror" value="{{ old('harga', $produk->harga) }}" required>
                                    @error('harga')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="stock"><i class="fas fa-boxes"></i> Stok</label>
                                    <input type="number" name="stock" class="form-control @error('stock') is-invalid @enderror" value="{{ old('stock', $produk->stock) }}" required>
                                    @error('stock')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group text-center">
                                    <label for="image_url"><i class="fas fa-image"></i> Gambar Produk</label>
                                    <input type="file" name="image_url" id="image_url" class="form-control-file @error('image_url') is-invalid @enderror" accept="image/*">
                                    @error('image_url')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="mt-3">
                                        <img id="preview" src="{{ $produk->image_url ? asset('storage/' . $produk->image_url) : asset('image/default-food.png') }}" class="produk-img" alt="Gambar Produk">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4 text-right">
                            <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan Perubahan</button>
                            <a href="{{ route('admin.produks.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        document.getElementById('image_url').addEventListener('change', function(e) {
            const [file] = e.target.files;
            if (file) {
                document.getElementById('preview').src = URL.createObjectURL(file);
            }
        });
    </script>
@endpush