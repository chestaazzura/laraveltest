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
                            <label for="image"><i class="fas fa-image"></i> Gambar Kategori (opsional)</label>
                            <input type="file" name="image" id="image" class="form-control-file" accept="image/*" onchange="previewImage(event)">
                            <div class="mt-2">
                                <span class="text-muted">Kosongkan jika tidak ingin mengubah gambar.</span>
                            </div>
                            <div class="mt-3">
                                <label>Preview:</label><br>
                                <img id="img-preview" src="{{ $kategori->image_url ? asset('storage/' . $kategori->image_url) : '' }}" alt="Preview" style="max-width: 180px; max-height: 180px; object-fit:cover; border-radius:6px; {{ $kategori->image_url ? '' : 'display:none;' }}">
                            </div>
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
@section('extra-js')
    <script>
        function previewImage(event) {
            const input = event.target;
            const preview = document.getElementById('img-preview');
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                }
                reader.readAsDataURL(input.files[0]);
            } else {
                preview.src = '';
                preview.style.display = 'none';
            }
        }
    </script>
@endsection
