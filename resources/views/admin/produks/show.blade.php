@extends('layouts.dashboard')

@section('title', 'Detail Produk')
@section('page-title', 'Detail Produk')

@push('styles')
    <style>
        .produk-img {
            width: 100%;
            max-width: 180px;
            height: auto;
            object-fit: cover;
            border: 3px solid #dee2e6;
            border-radius: 10px;
        }

        .table th {
            background-color: #f8f9fa;
        }

        @media (max-width: 768px) {
            .card {
                margin: 0 10px;
            }
        }
    </style>
@endpush

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Detail Produk</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid d-flex justify-content-center">
            <div class="card shadow-lg w-100" style="max-width: 800px;">
                <div class="card-header bg-primary">
                    <h3 class="card-title mb-0 text-white"><i class="fas fa-box"></i> Informasi Produk</h3>
                </div>
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-12 col-md-4 text-center mb-3">
                            <img src="{{ $produk->image_url ? asset('storage/' . $produk->image_url) : asset('image/default-food.png') }}" class="produk-img img-fluid rounded" alt="Foto Produk">
                        </div>
                        <div class="col-12 col-md-8">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <tr>
                                        <th>ID Produk</th>
                                        <td>{{ $produk->id }}</td>
                                    </tr>
                                    <tr>
                                        <th>Nama Produk</th>
                                        <td>{{ $produk->nama_produk }}</td>
                                    </tr>
                                    <tr>
                                        <th>Kategori</th>
                                        <td>{{ $produk->kategori->nama_kategori ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Harga</th>
                                        <td>Rp {{ number_format($produk->harga, 0, ',', '.') }}</td>
                                    </tr>
                                    <tr>
                                        <th>Stok</th>
                                        <td>{{ $produk->stock }}</td>
                                    </tr>
                                    <tr>
                                        <th>Dibuat pada</th>
                                        <td>{{ $produk->created_at->translatedFormat('d F Y H:i') }}</td>
                                    </tr>
                                    <tr>
                                        <th>Terakhir diubah</th>
                                        <td>{{ $produk->updated_at->translatedFormat('d F Y H:i') }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <a href="{{ route('admin.produks.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
