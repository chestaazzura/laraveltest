@extends('layouts.app')

@section('title', 'Produk - Baby Care Shop')

<style>
    body {
        background: linear-gradient(to bottom, #00B4D8, #A2D2FF);
    }
</style>

@section('content')
    <div class="container mx-auto px-4 py-8">
        <!-- Search & Filter Section -->
        {{-- <div class="bg-white rounded-lg shadow-md p-6 mb-8">
            <form method="GET" action="{{ route('user.produks.index') }}" class="flex flex-col md:flex-row gap-4">
                <div class="flex-1">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari produk..." class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>
                <div class="md:w-48">
                    <select name="kategori" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <option value="">Semua Kategori</option>
                        @foreach ($kategoris as $kategori)
                            <option value="{{ $kategori->id }}" {{ request('kategori') == $kategori->id ? 'selected' : '' }}>
                                {{ $kategori->nama_kategori }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-300">
                    <i class="fas fa-search mr-2"></i>Cari
                </button>
            </form>
        </div> --}}

        <!-- Product Grid -->
        @if ($produks->count() > 0)
            <div class=" grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
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

            <!-- Pagination -->
            <div class="mt-8">
                {{ $produks->appends(request()->query())->links() }}
            </div>
        @else
            <div class="text-center py-12">
                <div class="max-w-md mx-auto">
                    <i class="fas fa-search text-6xl text-gray-300 mb-4"></i>
                    <h3 class="text-xl font-semibold text-gray-600 mb-2">Produk tidak ditemukan</h3>
                    <p class="text-gray-500">Coba ubah kata kunci pencarian atau filter kategori.</p>
                    <a href="{{ route('user.produks.index') }}" class="inline-block mt-4 px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-300">
                        Lihat Semua Produk
                    </a>
                </div>
            </div>
        @endif
    </div>
@endsection
