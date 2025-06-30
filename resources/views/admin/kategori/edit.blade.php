@extends('layouts.dashboard')

@section('title', 'Ubah Kategori')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 align-items-center">
                <div class="col-sm-6">
                    <h1 class="m-0"><i class="fas fa-edit"></i> Ubah Kategori</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="card shadow">
                <div class="card-header bg-warning text-dark">
                    <h3 class="card-title"><i class="fas fa-pencil-alt"></i> Form Ubah Kategori</h3>
                </div>
                <div class="card-body">
                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    <form action="{{ route('admin.kategori.update', $kategori->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="nama_kategori"><i class="fas fa-id-badge"></i> Nama Kategori</label>
                            <input type="text" name="nama_kategori" class="form-control @error('nama_kategori') is-invalid @enderror" value="{{ old('nama_kategori', $kategori->nama_kategori) }}" required>
                            @error('nama_kategori')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mt-3">
                            <label for="deskripsi"><i class="fas fa-align-left"></i> Deskripsi (opsional)</label>
                            <textarea name="deskripsi" rows="3" class="form-control">{{ old('deskripsi', $kategori->deskripsi) }}</textarea>
                        </div>

                        <div class="form-group mt-3">
                            <label for="image_url"><i class="fas fa-image"></i> URL Gambar (opsional)</label>
                            <input type="text" name="image_url" class="form-control" value="{{ old('image_url', $kategori->image_url) }}">
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-save"></i> Simpan Perubahan
                            </button>
                            <a href="{{ route('admin.kategori.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
