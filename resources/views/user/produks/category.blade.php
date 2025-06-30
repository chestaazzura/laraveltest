@extends('layouts.app')

@section('title', $kategori->nama_kategori . ' - Baby Care Shop')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <!-- Breadcrumb -->
        <nav class="mb-8">
            <ol class="flex items-center space-x-2 text-sm text-gray-500">
                <li><a href="{{ route('home') }}" class="hover:text-blue-600">Home</a></li>
                <li><i class="fas fa-chevron-right text-xs"></i></li>
                <li><a href="{{ route('user.produks.index') }}" class="hover:text-blue-600">Produk</a></li>
                <li><i class="fas fa-chevron-right text-xs"></i></li>
                <li class="text-gray-800">{{ $kategori->nama_kategori }}</li>
            </ol>
        </nav>

        <!-- Category Header -->
        <div class="bg-white rounded-lg shadow-md p-6 mb-8">
            <div class="flex items-center space-x-4">
                <div class="w-16 h-16 bg-blue-100 rounded-lg flex items-center justify-center">
                    <img src="{{ $kategori->image_url ? asset('storage/' . $kategori->image_url) : asset('storage/img/BabyCare.png') }}" alt="{{ $kategori->nama_kategori }}" class="w-12 h-12 object-cover rounded">
                </div>
                <div>
                    <h1 class="text-3xl font-bold text-gray-800">{{ $kategori->nama_kategori }}</h1>
                    <p class="text-gray-600">{{ $produks->total() }} produk tersedia</p>
                </div>
            </div>
        </div>

        <!-- Category Navigation -->
        <div class="bg-white rounded-lg shadow-md p-6 mb-8">
            <h2 class="text-lg font-semibold text-gray-800 mb-4">Kategori Lainnya</h2>
            <div class="flex flex-wrap gap-2">
                <a href="{{ route('user.produks.index') }}" class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition duration-300">
                    Semua Produk
                </a>
                @foreach ($kategoris as $kat)
                    <a href="{{ route('user.produks.category', $kat) }}" class="px-4 py-2 rounded-lg transition duration-300 {{ $kat->id == $kategori->id ? 'bg-blue-600 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                        {{ $kat->nama_kategori }}
                    </a>
                @endforeach
            </div>
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
                {{ $produks->links() }}
            </div>
        @else
            <div class="text-center py-12">
                <div class="max-w-md mx-auto">
                    <i class="fas fa-box-open text-6xl text-gray-300 mb-4"></i>
                    <h3 class="text-xl font-semibold text-gray-600 mb-2">Belum ada produk</h3>
                    <p class="text-gray-500">Produk untuk kategori {{ $kategori->nama_kategori }} belum tersedia.</p>
                    <a href="{{ route('user.produks.index') }}" class="inline-block mt-4 px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-300">
                        Lihat Produk Lainnya
                    </a>
                </div>
            </div>
        @endif
    </div>
@endsection
