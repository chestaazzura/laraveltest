@extends('layouts.app')

@section('title', 'Home - Baby Care Shop')

@section('content')
    <!-- Hero -->
    <section class="bg-gradient-to-b from-blue-400 to-blue-200 p-6 text-center">
        <div class="max-w-4xl mx-auto">
            <img src="{{ asset('img/banner.png') }}" alt="Baby Care Banner" class="mx-auto mb-4 rounded-lg" />
        </div>
    </section>

    <!-- Shop by category -->
    <section class="py-8 px-4">
        <div class="max-w-6xl mx-auto">
            <h3 class="text-center text-xl font-semibold mb-6">Shop by category</h3>
            <div class="grid grid-cols-3 sm:grid-cols-6 gap-4 max-w-4xl mx-auto">
                @foreach ($kategoris as $kategori)
                    <a href="{{ route('user.produks.category', $kategori) }}" class="bg-white rounded-xl p-4 flex flex-col items-center hover:shadow-lg transition-shadow cursor-pointer">
                        <img src="{{ $kategori->image_url ? asset('storage/' . $kategori->image_url) : asset('storage/img/BabyCare.png') }}" alt="{{ $kategori->nama_kategori }}" class="w-20 h-20 object-cover rounded" />
                        <span class="text-sm text-center mt-2">{{ $kategori->nama_kategori }}</span>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Featured Products -->
    <section class="py-8 px-4 bg-gray-100">
        <div class="max-w-6xl mx-auto">
            <h3 class="text-center text-xl font-semibold mb-6">Produk Pilihan</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach ($produks as $produk)
                    <div class="bg-white rounded-lg p-4 flex flex-col items-center hover:shadow-lg transition-shadow">
                        <img src="{{ $produk->image_url ? asset('storage/' . $produk->image_url) : asset('storage/img/BabyCare.png') }}" alt="{{ $produk->nama_produk }}" class="mb-4 rounded w-full h-40 object-cover" />
                        <h4 class="text-gray-800 mb-1 text-center font-medium">{{ $produk->nama_produk }}</h4>
                        <p class="text-blue-600 font-bold text-lg">Rp. {{ number_format($produk->harga, 0, ',', '.') }}</p>
                        <a href="{{ route('user.produks.show', $produk) }}" class="mt-3 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition-colors">
                            <i class="fas fa-eye mr-2"></i>Lihat Detail
                        </a>
                    </div>
                @endforeach
            </div>

            <div class="text-center mt-8">
                <a href="{{ route('user.produks.index') }}" class="bg-blue-500 text-white px-6 py-3 rounded-lg hover:bg-blue-600 transition-colors">
                    Lihat Semua Produk
                </a>
            </div>
        </div>
    </section>

    <!-- Promo Section -->
    <section class="py-8 px-4">
        <div class="max-w-6xl mx-auto">
            <h3 class="text-center text-xl font-semibold mb-6">Promo Spesial</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-gradient-to-r from-pink-400 to-pink-600 rounded-lg p-6 text-white">
                    <h4 class="text-xl font-bold mb-2">Diskon 20%</h4>
                    <p class="mb-4">Untuk pembelian produk pakaian bayi</p>
                    <button class="bg-white text-pink-600 px-4 py-2 rounded font-medium hover:bg-gray-100 transition-colors">
                        Lihat Detail
                    </button>
                </div>
                <div class="bg-gradient-to-r from-green-400 to-green-600 rounded-lg p-6 text-white">
                    <h4 class="text-xl font-bold mb-2">Gratis Ongkir</h4>
                    <p class="mb-4">Untuk pembelian minimal Rp. 500.000</p>
                    <button class="bg-white text-green-600 px-4 py-2 rounded font-medium hover:bg-gray-100 transition-colors">
                        Lihat Detail
                    </button>
                </div>
            </div>
        </div>
    </section>
@endsection
