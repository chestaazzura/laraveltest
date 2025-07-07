{{-- filepath: resources/views/user/checkout.blade.php --}}
@extends('layouts.app')

@section('title', 'Checkout - Baby Care Shop')

@section('content')
    @php $grandTotal = 0; @endphp
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold mb-6">Checkout</h1>
        @if ($buyNow)
            <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                <h2 class="text-lg font-semibold mb-2">Produk yang Dibeli Sekarang</h2>
                <div class="flex items-center">
                    <img src="{{ asset('storage/' . $buyNow['image_url']) }}" alt="{{ $buyNow['nama_produk'] }}" class="w-20 h-20 object-cover rounded mr-4">
                    <div>
                        <div class="font-semibold">{{ $buyNow['nama_produk'] }}</div>
                        <div>Qty: {{ $buyNow['qty'] }}</div>
                        <div class="text-blue-600 font-bold">Rp {{ number_format($buyNow['harga'], 0, ',', '.') }}</div>
                        <div class="text-gray-700 mt-2">Subtotal: <span class="font-bold">Rp {{ number_format($buyNow['qty'] * $buyNow['harga'], 0, ',', '.') }}</span></div>
                    </div>
                </div>
            </div>
            @php $grandTotal = $buyNow['qty'] * $buyNow['harga']; @endphp
        @elseif(count($cartItems) > 0)
            <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                <h2 class="text-lg font-semibold mb-2">Keranjang Anda</h2>
                @foreach ($cartItems as $item)
                    @php
                        $qty = $item['qty'] ?? 1;
                        $harga = $item['harga'] ?? 0;
                        $subtotal = $qty * $harga;
                        $grandTotal += $subtotal;
                    @endphp
                    <div class="flex items-center mb-4 border-b pb-2">
                        <img src="{{ asset('storage/' . $item['image_url']) }}" alt="{{ $item['nama_produk'] }}" class="w-14 h-14 object-cover rounded mr-3">
                        <div class="flex-1">
                            <div class="font-semibold">{{ $item['nama_produk'] }}</div>
                            <div>Qty: {{ $qty }}</div>
                            <div class="text-blue-600 font-bold">Rp {{ number_format($harga, 0, ',', '.') }}</div>
                            <div class="text-gray-700">Subtotal: <span class="font-bold">Rp {{ number_format($subtotal, 0, ',', '.') }}</span></div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="bg-white rounded-lg shadow-md p-6 text-center text-gray-500">
                Tidak ada produk untuk checkout.
            </div>
        @endif

        @if ($grandTotal > 0)
            <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                <div class="flex justify-between items-center mb-4">
                    <span class="font-semibold text-gray-700 text-lg">Total Pembayaran:</span>
                    <span class="font-bold text-blue-600 text-2xl">Rp {{ number_format($grandTotal, 0, ',', '.') }}</span>
                </div>
                @if ($errors->any())
                    <div class="mb-4 text-red-600">
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('checkout.process') }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block text-gray-700 font-semibold mb-1">Nama Penerima</label>
                        <input type="text" name="nama_penerima" class="w-full border rounded px-3 py-2" required>
                    </div>
                    <div>
                        <label class="block text-gray-700 font-semibold mb-1">Alamat Pengiriman</label>
                        <textarea name="alamat" class="w-full border rounded px-3 py-2" rows="3" required></textarea>
                    </div>
                    <div>
                        <label class="block text-gray-700 font-semibold mb-1">No. HP</label>
                        <input type="text" name="no_hp" class="w-full border rounded px-3 py-2" required>
                    </div>
                    <div>
                        <label class="block text-gray-700 font-semibold mb-1">Metode Pembayaran</label>
                        <select name="metode_pembayaran" class="w-full border rounded px-3 py-2" required>
                            <option value="">-- Pilih --</option>
                            <option value="cod">Bayar di Tempat (COD)</option>
                            <option value="transfer">Transfer Bank</option>
                            <option value="ewallet">E-Wallet</option>
                        </select>
                    </div>
                    <button type="submit" class="w-full bg-green-600 text-white py-3 rounded-lg hover:bg-green-700 transition duration-300 font-bold text-lg">
                        Proses Pesanan
                    </button>
                </form>
            </div>
        @endif
    </div>
@endsection
