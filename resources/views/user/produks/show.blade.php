@extends('layouts.app')

@section('title', $produk->nama_produk . ' - Baby Care Shop')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <!-- Breadcrumb -->
        <nav class="mb-8 text-md text-gray-700">
            <ol class="flex items-center space-x-2">
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
                <div>
                    <img src="{{ $produk->image_url ? asset('storage/' . $produk->image_url) : asset('storage/img/BabyCare.png') }}" alt="{{ $produk->nama_produk }}" class="w-full h-96 object-cover rounded-lg">
                </div>

                <!-- Product Info -->
                <div class="space-y-4">
                    <div>
                        <span class="inline-block px-3 py-1 bg-blue-100 text-blue-800 text-sm rounded-full mb-2">
                            <i class="fas fa-tag mr-1"></i>{{ $produk->kategori->nama_kategori }}
                        </span>
                        <h1 class="text-3xl font-bold text-gray-800">{{ $produk->nama_produk }}</h1>
                    </div>

                    <!-- Rating -->
                    <div class="flex items-center space-x-2 text-yellow-400 text-lg">
                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i><i class="far fa-star"></i>
                        <span class="text-sm text-gray-500 ml-2">(123 ulasan)</span>
                    </div>

                    <div class="flex items-center space-x-4">
                        <span class="text-3xl font-bold text-blue-600">Rp {{ number_format($produk->harga, 0, ',', '.') }}</span>
                        <span class="text-lg text-gray-500">
                            <i class="fas fa-box mr-1"></i>Stok: {{ $produk->stock }}
                        </span>
                    </div>

                    <!-- Deskripsi -->
                    <div class="text-gray-600 leading-relaxed">
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">Deskripsi Produk</h3>
                        <p>
                            Produk ini dirancang khusus untuk kebutuhan bayi Anda. Dengan bahan berkualitas tinggi dan keamanan teruji, menjamin kenyamanan dan perlindungan si kecil setiap saat.
                        </p>
                    </div>

                    @if ($produk->stock > 0)
                        <form action="{{ route('cart.add', $produk->id) }}" method="POST" class="space-y-4" id="addToCartForm">
                            @csrf
                            <div class="flex items-center space-x-4">
                                <label for="quantity" class="text-gray-700">Jumlah:</label>
                                <input type="number" name="qty" id="quantity" value="1" min="1" max="{{ $produk->stock }}" class="w-20 px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                            </div>
                            <button type="submit" class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 transition mt-2">
                                <i class="fas fa-shopping-cart mr-2"></i>Tambah ke Keranjang
                            </button>
                        </form>
                        <form action="{{ route('checkout.buynow', $produk->id) }}" method="POST" id="buyNowForm" class="mt-3">
                            @csrf
                            <input type="hidden" name="qty" id="buyNowQty" value="1">
                            <button type="submit" class="w-full bg-green-600 text-white py-3 rounded-lg hover:bg-green-700 transition">
                                <i class="fa-solid fa-money-bill-wave mr-2"></i>Beli Sekarang
                            </button>
                        </form>
                        <script>
                            document.getElementById('quantity').addEventListener('input', function() {
                                document.getElementById('buyNowQty').value = this.value;
                            });
                        </script>
                    @else
                        <div class="text-center py-4">
                            <span class="inline-block px-4 py-2 bg-red-100 text-red-800 rounded-lg">
                                <i class="fas fa-times-circle mr-2"></i>Stok Habis
                            </span>
                        </div>
                    @endif

                    <!-- Product Features -->
                    <div class="border-t pt-4">
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">Keunggulan Produk</h3>
                        <ul class="space-y-2 text-gray-600">
                            <li><i class="fas fa-check text-green-500 mr-2"></i>Aman untuk bayi, bersertifikat</li>
                            <li><i class="fas fa-check text-green-500 mr-2"></i>Bahan premium, bebas alergi</li>
                            <li><i class="fas fa-check text-green-500 mr-2"></i>Garansi produk 7 hari</li>
                            <li><i class="fas fa-check text-green-500 mr-2"></i>Pengiriman cepat & aman</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Komentar / Review Section -->
        <div class="bg-white rounded-lg shadow-md p-6 mb-8">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Ulasan Pelanggan</h2>
            <div class="space-y-4">
                <div class="border p-4 rounded-lg">
                    <div class="flex items-center justify-between mb-2">
                        <div class="flex items-center space-x-2">
                            <span class="font-semibold text-gray-800">Siti Aminah</span>
                            <div class="text-yellow-400 text-sm">
                                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i>
                            </div>
                        </div>
                        <span class="text-sm text-gray-500">2 hari lalu</span>
                    </div>
                    <p class="text-gray-600">Produk bagus banget! Bayiku nyaman dan tidak iritasi sama sekali. ❤️</p>
                </div>
                <!-- Tambah ulasan lainnya sesuai kebutuhan -->
            </div>
        </div>

        <!-- Related Products -->
        @if ($relatedProducts->count() > 0)
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Produk Serupa</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach ($relatedProducts as $produk)
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
            </div>
        @endif
    </div>
@endsection
@push('scripts')
    <script>
        // Tambahkan event listener untuk form "Tambah ke Keranjang"
        // document.getElementById('addToCartForm').addEventListener('submit', function(event) {
        //     event.preventDefault(); // Mencegah submit default
        //     const qty = document.getElementById('quantity').value;
        //     this.querySelector('input[name="qty"]').value = qty; // Set nilai qty
        //     this.submit(); // Submit form
        // });
        // Sinkronkan qty "Beli Sekarang" dengan input qty utama
        document.getElementById('quantity').addEventListener('input', function() {
            document.getElementById('buyNowQty').value = this.value;
        });
    </script>
@endpush
