@extends('layouts.app')

@section('title', $kategori->nama_kategori . ' - Baby Care Shop')

@push('styles')
    <style>
        .product-card {
            background-color: #0077B6;
            color: white;
        }

        .product-card h4 {
            color: white;
        }
    </style>
@endpush

@section('content')
    <div class="container mx-auto px-4 py-8">
        <!-- Breadcrumb -->
        <nav class="mb-8">
            <ol class="flex items-center space-x-2 text-sm text-gray-700">
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

        <!-- Product Grid -->
        @if ($produks->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
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
                            <a href="{{ route('user.produks.show', $produk) }}" class="mt-auto bg-whites text-white text-sm font-medium px-4 py-2 rounded-lg text-center hover:bg-pink-600 transition-colors">
                                <i class="fas fa-eye mr-1"></i> Lihat Detail
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-8 text-center">
                {{ $produks->appends(request()->query())->links() }}
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
