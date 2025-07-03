@extends('layouts.app')

@section('title', 'Home - Baby Care Shop')

{{-- <style>
    body {
        background: linear-gradient(to bottom, #00B4D8, #A2D2FF);
    }

    .product-card {
        background-color: #0077B6;
        color: white;
    }

    .product-card h4 {
        color: white;
    }
</style> --}}


@section('content')
    <!-- Hero -->
    <section class=" p-6 text-center">
        <div class="max-w-4xl mx-auto">
            <img src="{{ asset('img/banner.png') }}" alt="Baby Care Banner" class="mx-auto mb-4 rounded-2xl shadow-lg" />
        </div>
    </section>
    <!-- Shop by category -->
    <section class="py-6 px-4 ">
        <div class="max-w-6xl mx-auto">
            <h3 class="text-center text-xl font-semibold mb-6">Shop by category</h3>
            <div class="grid grid-cols-3 sm:grid-cols-6 gap-4 max-w-4xl mx-auto">
                @foreach ($kategoris as $kategori)
                    <a href="{{ route('user.produks.category', $kategori) }}" class="bg-white rounded-xl p-4 flex flex-col items-center hover:shadow-lg transition-shadow cursor-pointer group">
                        <img src="{{ $kategori->image_url ? asset('storage/' . $kategori->image_url) : asset('storage/img/BabyCare.png') }}" alt="{{ $kategori->nama_kategori }}" class="w-20 h-20 object-cover rounded transition-transform duration-300 group-hover:scale-110" />
                        <span class="text-sm text-center mt-2">{{ $kategori->nama_kategori }}</span>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Featured Products -->
    <section class="py-6 px-4 ">
        <div class="max-w-6xl mx-auto">
            <h3 class="text-center text-xl font-semibold mb-6">Best Seller</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach ($produks as $produk)
                    <div class="product-card rounded-2xl overflow-hidden shadow-md hover:shadow-xl transition-shadow duration-300 flex flex-col">
                        <div class="overflow-hidden">
                            <a href="{{ route('user.produks.show', $produk) }}">
                                <img src="{{ $produk->image_url ? asset('storage/' . $produk->image_url) : asset('img/auth_banner.png') }}" alt="{{ $produk->nama_produk }}" class="w-full h-40 object-cover transition-transform duration-300 hover:scale-105" />
                            </a>
                        </div>
                        <div class="p-4 flex flex-col flex-grow">
                            <h4 class="text-gray-800 text-base font-semibold mb-1 text-center">{{ $produk->nama_produk }}</h4>
                            <p class="text-white font-bold text-lg text-center">Rp {{ number_format($produk->harga, 0, ',', '.') }}</p>
                            <a href="{{ route('user.produks.show', $produk) }}" class="mt-auto bg-whites  text-white text-sm font-medium px-4 py-2 rounded-lg text-center hover:bg-pink-600 transition-colors">
                                <i class="fas fa-eye mr-1"></i> Lihat Detail
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="text-center mt-8">
                <a href="{{ route('user.produks.index') }}" class="bg-white text-[#0077B6] px-6 py-3 rounded-lg hover:bg-[] transition-colors">
                    Lihat Semua Produk
                </a>
            </div>
        </div>
    </section>


    <!-- Promo Section -->
    <section class="py-12 px-4 ">
        <div class="max-w-6xl mx-auto">
            <h3 class="text-center text-2xl font-bold mb-8 text-gray-800">Promo Spesial</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-gradient-to-r from-pink-400 to-pink-600 rounded-2xl p-6 text-white shadow-md">
                    <h4 class="text-xl font-bold mb-2">Diskon 20%</h4>
                    <p class="mb-4">Untuk pembelian produk pakaian bayi</p>
                    <button class="bg-white text-pink-600 px-4 py-2 rounded font-medium hover:bg-gray-100 transition-colors">
                        Lihat Detail
                    </button>
                </div>
                <div class="bg-gradient-to-r from-green-400 to-green-600 rounded-2xl p-6 text-white shadow-md">
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
