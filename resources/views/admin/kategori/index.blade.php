@extends('layouts.dashboard')

@section('title', 'Manajemen Kategori')

@section('extra-css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Manajemen Kategori</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">Daftar Kategori</h3>
                    <a href="{{ route('admin.kategori.create') }}" class="btn btn-primary btn-sm ml-auto">
                        <i class="fas fa-plus"></i> Tambah Kategori
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="categoryTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Kategori</th>
                                    <th>Deskripsi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kategoris as $index => $kategori)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $kategori->nama_kategori }}</td>
                                        <td>{{ $kategori->deskripsi ?? '-' }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('admin.kategori.edit', $kategori->id) }}" class="btn btn-info btn-sm">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                            <button class="btn btn-danger btn-sm delete-kategori-btn" data-toggle="modal" data-target="#deleteKategoriModal" data-kategori-id="{{ $kategori->id }}">
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
        </div>
    </section>

    <!-- Modal Konfirmasi Hapus -->
    <div class="modal fade" id="deleteKategoriModal" tabindex="-1" aria-labelledby="deleteKategoriModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title"><i class="fas fa-exclamation-triangle"></i> Konfirmasi Hapus</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus kategori ini? Tindakan ini tidak dapat dibatalkan.
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

    @include('services.ToastModal')
@endsection

@section('extra-js')
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#categoryTable").DataTable({
                paging: true,
                lengthChange: false,
                searching: true,
                ordering: true,
                info: true,
                autoWidth: false,
                responsive: true
            });

            $('.delete-kategori-btn').click(function() {
                let kategoriId = $(this).data('kategori-id');
                let deleteUrl = "{{ route('admin.kategori.destroy', ':id') }}".replace(':id', kategoriId);
                $('#deleteForm').attr('action', deleteUrl);
            });

            @if (session('success') || session('error'))
                $('#toastNotification').toast({
                    delay: 3000,
                    autohide: true
                }).toast('show');
            @endif
        });
    </script>
@endsection
