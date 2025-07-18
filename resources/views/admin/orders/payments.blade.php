@extends('layouts.dashboard')

@section('title', 'Manajemen Pembayaran')

@section('extra-css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Manajemen Pembayaran</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Daftar Pembayaran</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="paymentTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>ID Pembayaran</th>
                                    <th>Order ID</th>
                                    <th>Customer</th>
                                    <th>Jumlah</th>
                                    <th>Metode</th>
                                    <th>Status</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($payments as $payment)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $payment->id_pembayaran }}</td>
                                        <td>{{ $payment->order->id_order ?? '-' }}</td>
                                        <td>{{ $payment->order->pelanggan->nama ?? '-' }}</td>
                                        <td>Rp{{ number_format($payment->order->total_price ?? 0, 0, ',', '.') }}</td>
                                        <td>{{ ucfirst($payment->payment_method) }}</td>
                                        <td>{{ ucfirst($payment->payment_status) }}</td>
                                        <td>{{ $payment->created_at }}</td>
                                        <td>
                                            @if ($payment->order)
                                                <a href="{{ route('admin.payments.show', $payment->order) }}" class="btn btn-sm btn-info">Detail</a>
                                            @else
                                                <span class="text-muted">-</span>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="9" class="text-center">Belum ada data pembayaran</td>
                                    </tr>
                                @endforelse
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
            $("#paymentTable").DataTable({
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
