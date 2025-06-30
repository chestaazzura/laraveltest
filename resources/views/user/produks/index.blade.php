@extends('layouts.app')

@section('title', 'Produk - Baby Care Shop')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <!-- Search & Filter Section -->
        <div class="bg-white rounded-lg shadow-md p-6 mb-8">
            <h1 class="text-3xl font-bold text-gray-800 mb-6">Produk Baby Care</h1>

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
        </div>

        <!-- Product Grid -->
        @if ($produks->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @foreach ($produks as $produk)
                    <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-300">
                        <div class="aspect-w-1 aspect-h-1">
                            <img src="{{ $produk->image_url ? asset('storage/' . $produk->image_url) : asset('storage/img/BabyCare.png') }}" alt="{{ $produk->nama_produk }}" class="w-full h-48 object-cover">
                        </div>
                        <div class="p-4">
                            <h3 class="text-lg font-semibold text-gray-800 mb-2">{{ $produk->nama_produk }}</h3>
                            <p class="text-sm text-gray-500 mb-2">{{ $produk->kategori->nama_kategori }}</p>
                            <div class="flex justify-between items-center mb-4">
                                <span class="text-xl font-bold text-blue-600">Rp {{ number_format($produk->harga, 0, ',', '.') }}</span>
                                <span class="text-sm text-gray-500">Stok: {{ $produk->stock }}</span>
                            </div>
                            <a href="{{ route('user.produks.show', $produk) }}" class="block w-full text-center bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition duration-300">
                                Lihat Detail
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
