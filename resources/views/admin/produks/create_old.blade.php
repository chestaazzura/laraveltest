<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin || Tambah Produk</title>
    <link rel="icon" type="image/png" href="{{ asset('image/icondapur.jpg') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300;400;600&display=swap" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    @include('include.navbarSistem')
    @include('include.sidebar')

    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Tambah Produk Baru</h1>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-plus-circle"></i> Form Tambah Produk</h3>
                    </div>
                    <div class="card-body">
                        @if(session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif

                        <form action="{{ route('admin.produks.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="nama_produk">Nama Produk</label>
                                <input type="text" name="nama_produk" class="form-control @error('nama_produk') is-invalid @enderror" value="{{ old('nama_produk') }}" required>
                                @error('nama_produk')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            <div class="form-group">
                                <label for="id_kategori">Kategori</label>
                                <select name="id_kategori" class="form-control @error('id_kategori') is-invalid @enderror" required>
                                    <option value="">-- Pilih Kategori --</option>
                                    @foreach($kategoris as $kategori)
                                        <option value="{{ $kategori->id }}" {{ old('id_kategori') == $kategori->id ? 'selected' : '' }}>{{ $kategori->nama_kategori }}</option>
                                    @endforeach
                                </select>
                                @error('id_kategori')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" rows="3">{{ old('deskripsi') }}</textarea>
                                @error('deskripsi')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            <div class="form-group">
                                <label for="image_url">Gambar Produk</label>
                                <input type="file" name="image_url" id="image_url" class="form-control-file @error('image_url') is-invalid @enderror" accept="image/*">
                                @error('image_url')<div class="text-danger">{{ $message }}</div>@enderror
                            </div>

                            <div class="text-center mb-3">
                                <div style="width: 300px; height: 300px; border: 2px dashed #ccc; margin: auto;">
                                    <img id="preview" src="https://via.placeholder.com/300x300?text=Preview" class="img-fluid rounded" style="max-width: 100%; max-height: 100%; object-fit: contain;">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="harga">Harga</label>
                                <input type="number" name="harga" class="form-control @error('harga') is-invalid @enderror" value="{{ old('harga') }}" required>
                                @error('harga')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            <div class="form-group">
                                <label for="stock">Stok</label>
                                <input type="number" name="stock" class="form-control @error('stock') is-invalid @enderror" value="{{ old('stock') }}" required>
                                @error('stock')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                                <a href="{{ route('admin.produks.index') }}" class="btn btn-secondary">Batal</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </section>
    </div>

    @include('include.footerSistem')
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
<script>
    // Preview gambar langsung saat file dipilih
    document.getElementById('image_url').addEventListener('change', function (e) {
        const [file] = e.target.files;
        if (file) {
            document.getElementById('preview').src = URL.createObjectURL(file);
        }
    });
</script>
</body>
</html>
