@extends('layouts.app')

@section('title', $produk->nama_produk . ' - Baby Care Shop')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <!-- Breadcrumb -->
        <nav class="mb-8">
            <ol class="flex items-center space-x-2 text-sm text-gray-500">
                <li><a href="{{ route('home') }}" class="hover:text-blue-600">Home</a></li>
                <li><i class="fas fa-chevron-right text-xs"></i></li>
                <li><a href="{{ route('user.produks.index') }}" class="hover:text-blue-600">Produk</a></li>
                <li><i class="fas fa-chevron-right text-xs"></i></li>
                <li><a href="{{ route('user.produks.category', $produk->kategori) }}" class="hover:text-blue-600">{{ $produk->kategori->nama_kategori }}</a></li>
                <li><i class="fas fa-chevron-right text-xs"></i></li>
                <li class="text-gray-800">{{ $produk->nama_produk }}</li>
            </ol>
        </nav>

        <!-- Product Detail -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden mb-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 p-6">
                <!-- Product Image -->
                <div class="aspect-w-1 aspect-h-1">
                    <img src="{{ $produk->image_url ? asset('storage/' . $produk->image_url) : asset('storage/img/BabyCare.png') }}" alt="{{ $produk->nama_produk }}" class="w-full h-96 object-cover rounded-lg">
                </div>

                <!-- Product Info -->
                <div class="space-y-4">
                    <div>
                        <span class="inline-block px-3 py-1 bg-blue-100 text-blue-800 text-sm rounded-full mb-2">
                            {{ $produk->kategori->nama_kategori }}
                        </span>
                        <h1 class="text-3xl font-bold text-gray-800">{{ $produk->nama_produk }}</h1>
                    </div>

                    <div class="flex items-center space-x-4">
                        <span class="text-3xl font-bold text-blue-600">Rp {{ number_format($produk->harga, 0, ',', '.') }}</span>
                        <span class="text-lg text-gray-500">
                            <i class="fas fa-box mr-1"></i>
                            Stok: {{ $produk->stock }}
                        </span>
                    </div>

                    @if ($produk->stock > 0)
                        <div class="space-y-4">
                            <div class="flex items-center space-x-4">
                                <label for="quantity" class="text-gray-700">Jumlah:</label>
                                <input type="number" id="quantity" value="1" min="1" max="{{ $produk->stock }}" class="w-20 px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            </div>

                            <button class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 transition duration-300">
                                <i class="fas fa-shopping-cart mr-2"></i>
                                Tambah ke Keranjang
                            </button>

                            <button class="w-full bg-green-600 text-white py-3 rounded-lg hover:bg-green-700 transition duration-300">
                                <i class="fas fa-bolt mr-2"></i>
                                Beli Sekarang
                            </button>
                        </div>
                    @else
                        <div class="text-center py-4">
                            <span class="inline-block px-4 py-2 bg-red-100 text-red-800 rounded-lg">
                                <i class="fas fa-times-circle mr-2"></i>
                                Stok Habis
                            </span>
                        </div>
                    @endif

                    <!-- Product Features -->
                    <div class="border-t pt-4">
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">Keunggulan Produk</h3>
                        <ul class="space-y-2 text-gray-600">
                            <li><i class="fas fa-check text-green-500 mr-2"></i>Kualitas terjamin dan aman untuk bayi</li>
                            <li><i class="fas fa-check text-green-500 mr-2"></i>Bahan berkualitas tinggi</li>
                            <li><i class="fas fa-check text-green-500 mr-2"></i>Garansi resmi</li>
                            <li><i class="fas fa-check text-green-500 mr-2"></i>Pengiriman cepat dan aman</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Related Products -->
        @if ($relatedProducts->count() > 0)
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Produk Serupa</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach ($relatedProducts as $related)
                        <div class="bg-gray-50 rounded-lg overflow-hidden hover:shadow-lg transition duration-300">
                            <div class="aspect-w-1 aspect-h-1">
                                <img src="{{ $related->image_url ? asset('storage/' . $related->image_url) : asset('storage/img/BabyCare.png') }}" alt="{{ $related->nama_produk }}" class="w-full h-40 object-cover">
                            </div>
                            <div class="p-4">
                                <h3 class="text-sm font-semibold text-gray-800 mb-2">{{ $related->nama_produk }}</h3>
                                <div class="flex justify-between items-center">
                                    <span class="text-lg font-bold text-blue-600">Rp {{ number_format($related->harga, 0, ',', '.') }}</span>
                                    <a href="{{ route('user.produks.show', $related) }}" class="text-blue-600 hover:text-blue-700 text-sm">
                                        Lihat
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
@endsection
