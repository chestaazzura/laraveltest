@extends('layouts.dashboard')

@section('title', 'Detail Kategori')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Detail Kategori</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Informasi Kategori</h3>
                    <a href="{{ route('admin.kategori.index') }}" class="btn btn-secondary btn-sm float-right"><i class="fas fa-arrow-left"></i> Kembali</a>
                </div>
                <div class="card-body row">
                    <div class="col-md-4 text-center mb-3">
                        @if ($kategori->image_url)
                            <img src="{{ asset('storage/' . $kategori->image_url) }}" alt="{{ $kategori->nama_kategori }}" class="img-fluid rounded shadow" style="max-height:220px; object-fit:cover;">
                        @else
                            <span class="text-muted">Tidak ada gambar</span>
                        @endif
                    </div>
                    <div class="col-md-8">
                        <table class="table table-borderless">
                            <tr>
                                <th style="width: 150px;">Nama Kategori</th>
                                <td>: {{ $kategori->nama_kategori }}</td>
                            </tr>
                            <tr>
                                <th>Deskripsi</th>
                                <td>: {{ $kategori->deskripsi ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th>Dibuat</th>
                                <td>: {{ $kategori->created_at ? $kategori->created_at->format('d M Y H:i') : '-' }}</td>
                            </tr>
                            <tr>
                                <th>Diupdate</th>
                                <td>: {{ $kategori->updated_at ? $kategori->updated_at->format('d M Y H:i') : '-' }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
