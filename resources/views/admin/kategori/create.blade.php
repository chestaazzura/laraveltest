@extends('layouts.dashboard')

@section('title', 'Tambah Kategori')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 align-items-center">
                <div class="col-sm-6">
                    <h1 class="m-0"><i class="fas fa-tags"></i> Tambah Kategori Baru</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h3 class="card-title"><i class="fas fa-plus-circle"></i> Form Tambah Kategori</h3>
                </div>
                <div class="card-body">
                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    <form action="{{ route('admin.kategori.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nama_kategori"><i class="fas fa-id-badge"></i> Nama Kategori</label>
                            <input type="text" name="nama_kategori" class="form-control @error('nama_kategori') is-invalid @enderror" value="{{ old('nama_kategori') }}" required>
                            @error('nama_kategori')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mt-3">
                            <label for="deskripsi"><i class="fas fa-align-left"></i> Deskripsi (opsional)</label>
                            <textarea name="deskripsi" rows="3" class="form-control">{{ old('deskripsi') }}</textarea>
                        </div>

                        <div class="form-group mt-3">
                            <label for="image"><i class="fas fa-image"></i> Upload Gambar (opsional)</label>
                            <input type="file" name="image" class="form-control-file @error('image') is-invalid @enderror" accept="image/*">
                            @error('image')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-save"></i> Simpan
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
