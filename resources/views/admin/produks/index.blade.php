@extends('layouts.dashboard')

@section('title', 'Manajemen Produk')
@section('page-title', 'Manajemen Produk')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Produk</li>
@endsection

@push('styles')
    <style>
        .table-img {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 5px;
        }
    </style>
@endpush

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title">Daftar Produk</h3>
            <a href="{{ route('admin.produks.create') }}" class="btn btn-primary btn-sm ml-auto">
                <i class="fas fa-plus"></i> Tambah Produk
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="produkTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Gambar</th>
                            <th>Nama Produk</th>
                            <th>Kategori</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produks as $index => $produk)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>
                                    @if ($produk->image_url)
                                        <img src="{{ asset('storage/uploads/produk/' . $produk->image_url) }}" alt="{{ $produk->nama_produk }}" class="table-img">
                                    @else
                                        <img src="{{ asset('img/BabyCare.png') }}" alt="Default" class="table-img">
                                    @endif
                                </td>
                                <td>{{ $produk->nama_produk }}</td>
                                <td>{{ $produk->kategori->nama_kategori ?? 'Tidak ada kategori' }}</td>
                                <td>Rp {{ number_format($produk->harga, 0, ',', '.') }}</td>
                                <td>{{ $produk->stock }}</td>
                                <td class="text-center">
                                    <a href="{{ route('admin.produks.show', $produk->id) }}" class="btn btn-info btn-sm">
                                        <i class="fas fa-eye"></i> Detail
                                    </a>
                                    <a href="{{ route('admin.produks.edit', $produk->id) }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <button class="btn btn-danger btn-sm delete-produk-btn" data-toggle="modal" data-target="#deleteProdukModal" data-produk-id="{{ $produk->id }}">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>

    <!-- Modal Hapus Produk -->
    <div class="modal fade" id="deleteProdukModal" tabindex="-1" aria-labelledby="deleteProdukModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title"><i class="fas fa-exclamation-triangle"></i> Konfirmasi Hapus</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Tutup">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus produk ini? Tindakan ini tidak dapat dibatalkan.
                </div>
                <form id="deleteForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $("#produkTable").DataTable({
                responsive: true,
                lengthChange: false,
                autoWidth: false,
            });

            $('.delete-produk-btn').click(function() {
                let produkId = $(this).data('produk-id');
                let deleteUrl = "{{ url('admin/produks') }}/" + produkId;
                $('#deleteForm').attr('action', deleteUrl);
            });
        });
    </script>
@endpush
