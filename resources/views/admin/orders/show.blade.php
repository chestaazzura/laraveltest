@extends('layouts.dashboard')

@section('title', 'Detail Order')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Detail Order</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Informasi Order</h3>
                </div>
                <div class="card-body">
                    <dl class="row">
                        <dt class="col-sm-3">ID Order</dt>
                        <dd class="col-sm-9">{{ $order->id_order }}</dd>
                        <dt class="col-sm-3">Customer</dt>
                        <dd class="col-sm-9">{{ $order->pelanggan->nama ?? '-' }}</dd>
                        <dt class="col-sm-3">Total</dt>
                        <dd class="col-sm-9">Rp{{ number_format($order->total_price, 0, ',', '.') }}</dd>
                        <dt class="col-sm-3">Status</dt>
                        <dd class="col-sm-9">
                            <form method="POST" action="{{ route('admin.orders.updateStatus', $order) }}" class="form-inline d-inline">
                                @csrf
                                @method('PATCH')
                                <select name="status" class="form-control form-control-sm d-inline w-auto">
                                    <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="dikirim" {{ $order->status == 'dikirim' ? 'selected' : '' }}>Dikirim</option>
                                    <option value="selesai" {{ $order->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                                    <option value="batal" {{ $order->status == 'batal' ? 'selected' : '' }}>Batal</option>
                                </select>
                                <button type="submit" class="btn btn-sm btn-primary ml-2">Update</button>
                            </form>
                        </dd>
                        <dt class="col-sm-3">Alamat Pengiriman</dt>
                        <dd class="col-sm-9">{{ $order->alamat_pengiriman }}</dd>
                        <dt class="col-sm-3">Tanggal Pesanan</dt>
                        <dd class="col-sm-9">{{ $order->tanggal_pesanan }}</dd>
                        <dt class="col-sm-3">Tanggal Dikirim</dt>
                        <dd class="col-sm-9">{{ $order->tanggal_dikirim ?? '-' }}</dd>
                        <dt class="col-sm-3">No Resi</dt>
                        <dd class="col-sm-9">{{ $order->no_resi ?? '-' }}</dd>
                    </dl>
                    <hr>
                    <h5>Item Pesanan</h5>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Produk</th>
                                <th>Qty</th>
                                <th>Harga</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order->items as $item)
                                <tr>
                                    <td>{{ $item->produk->nama_produk ?? '-' }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>Rp{{ number_format($item->harga, 0, ',', '.') }}</td>
                                    <td>Rp{{ number_format($item->harga * $item->quantity, 0, ',', '.') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <hr>
                </div>
            </div>
        </div>
    </section>
@endsection
