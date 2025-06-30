@extends('layouts.dashboard')

@section('title', 'Manajemen Customer')

@section('extra-css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Manajemen Customer</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Daftar Customer</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="customerTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Tanggal Daftar</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="6" class="text-center">Belum ada data customer</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('extra-js')
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#customerTable").DataTable({
                paging: true,
                lengthChange: false,
                searching: true,
                ordering: true,
                info: true,
                autoWidth: false,
                responsive: true
            });
        });
    </script>
@endsection
