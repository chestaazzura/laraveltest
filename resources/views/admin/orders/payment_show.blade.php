@extends('layouts.dashboard')

@section('title', 'Detail Pembayaran')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Detail Pembayaran</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Informasi Pembayaran</h3>
                </div>
                <div class="card-body">
                    <dl class="row">
                        <dt class="col-sm-3">ID Pembayaran</dt>
                        <dd class="col-sm-9">{{ $pembayaran->id_pembayaran }}</dd>
                        <dt class="col-sm-3">Order ID</dt>
                        <dd class="col-sm-9">
                            @if ($pembayaran->order)
                                <a href="{{ route('admin.orders.show', $pembayaran->order) }}">{{ $pembayaran->order->id_order }}</a>
                            @else
                                -
                            @endif
                        </dd>
                        <dt class="col-sm-3">Customer</dt>
                        <dd class="col-sm-9">{{ $pembayaran->order->pelanggan->nama ?? '-' }}</dd>
                        <dt class="col-sm-3">Jumlah</dt>
                        <dd class="col-sm-9">Rp{{ number_format($pembayaran->order->total_price ?? 0, 0, ',', '.') }}</dd>
                        <dt class="col-sm-3">Metode</dt>
                        <dd class="col-sm-9">{{ $pembayaran->payment_method }}</dd>
                        <dt class="col-sm-3">Status</dt>
                        <dd class="col-sm-9">
                            <form method="POST" action="{{ route('admin.payments.updateStatus', $pembayaran) }}" class="form-inline d-inline">
                                @csrf
                                @method('PATCH')
                                <select name="payment_status" class="form-control form-control-sm d-inline w-auto">
                                    <option value="pending" {{ $pembayaran->payment_status == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="berhasil" {{ $pembayaran->payment_status == 'berhasil' ? 'selected' : '' }}>Berhasil</option>
                                    <option value="gagal" {{ $pembayaran->payment_status == 'gagal' ? 'selected' : '' }}>Gagal</option>
                                </select>
                                <button type="submit" class="btn btn-sm btn-primary ml-2">Update</button>
                            </form>
                        </dd>
                        <dt class="col-sm-3">Tanggal</dt>
                        <dd class="col-sm-9">{{ $pembayaran->payment_date ?? $pembayaran->created_at }}</dd>
                    </dl>
                </div>
            </div>
        </div>
    </section>
@endsection
