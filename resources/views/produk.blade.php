<!DOCTYPE html>
<html lang="id" class="h-full bg-blue-100">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<script src="https://cdn.tailwindcss.com"></script>
<title>BabyCare - produks</title>
</head>
<body class="h-full flex flex-col">
<!-- Navbar -->
<header class="bg-blue-500 text-white">
<!-- Top bar: logo + links -->
<div class="container mx-auto flex justify-between items-center py-2 px-4">
  <!-- Logo -->
  <img src="img/babycare.png" alt="BabyCare Logo" class="h-10">

  <!-- Grup ID + Contact Us dalam satu flex container -->
  <div class="flex items-center space-x-4">
    <img src="img/language.png" alt="Bahasa" width="40">
    <a 
      href="https://wa.me/08319343746" 
      class="flex items-center space-x-2 hover:underline"
    >
      <img src="img/contact.png" alt="Chat via WhatsApp" width="100">
    </a>
  </div>
</div>

<div class="bg-[#f0f0f0]">
<!-- Nav dan Icon Bar dalam satu baris -->
<div class="container mx-auto flex justify-between items-center py-2 px-4">
  
  <!-- Nav Kategori di Kiri -->
  <nav class="flex space-x-6 text-sm font-semibold text-gray-700">
    <a href="{{ route('home') }}" class="hover:text-blue-600">Home</a>
    <a href="{{ route('produks.index') }}" class="hover:text-blue-600">Pakaian</a>
    <a href="#alat-makan" class="hover:text-blue-600">Alat Makan</a>
    <a href="#alat-mandi" class="hover:text-blue-600">Alat Mandi</a>
    <a href="#mainan" class="hover:text-blue-600">Mainan</a>
  </nav>

  <!-- Icon di Kanan -->
  <div class="flex items-center space-x-4">
    <button aria-label="Search"><img src="img/search.png" alt="Search" width="40"></button>
    <button aria-label="Location"><img src="img/location.png" alt="Location" width="40"></button>
    <button aria-label="Cart"><img src="img/cart.png" alt="Cart" width="40"></button>
    <button aria-label="User"><img src="img/user.png" alt="User" width="40"></button>
  </div>
  
</div>
</div>


</header>



<section id="pakaian" class="py-8 px-4 flex-1 bg-gradient-to-b from-blue-200 to-blue-100">
<h3 class="text-center text-xl font-semibold mb-6">Pakaian</h3>
<div class="grid grid-cols-2 sm:grid-cols-4 gap-6 max-w-5xl mx-auto">
  @foreach ($produks as $product)
    <div class="bg-blue-400 rounded-lg p-4 flex flex-col items-center">
      <img src="{{ asset($product->image_url) }}" alt="{{ $product->nama_produk }}" class="mb-4 rounded" />
      <h4 class="text-white mb-1">{{ $product->nama_produk }}</h4>
      <p class="text-white font-semibold">Rp. {{ number_format($product->harga, 0, ',', '.') }}</p>
    </div>
  @endforeach
</div>

<!-- Custom Pagination Manual -->
@if ($produks->hasPages())
<div class="mt-8 flex justify-center">
    <ul class="inline-flex items-center space-x-1">
        {{-- Tombol Sebelumnya --}}
        @if ($produks->onFirstPage())
            <li class="px-3 py-1 bg-gray-300 text-gray-600 rounded cursor-not-allowed">←</li>
        @else
            <li>
                <a href="{{ $produks->previousPageUrl() }}" class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600">←</a>
            </li>
        @endif

        {{-- Nomor Halaman --}}
        @foreach ($produks->links()->elements[0] as $page => $url)
            @if ($page == $produks->currentPage())
                <li class="px-3 py-1 bg-white text-blue-600 border border-blue-500 rounded font-bold">{{ $page }}</li>
            @else
                <li>
                    <a href="{{ $url }}" class="px-3 py-1 bg-blue-400 text-white rounded hover:bg-blue-500">{{ $page }}</a>
                </li>
            @endif
        @endforeach

        {{-- Tombol Berikutnya --}}
        @if ($produks->hasMorePages())
            <li>
                <a href="{{ $produks->nextPageUrl() }}" class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600">→</a>
            </li>
        @else
            <li class="px-3 py-1 bg-gray-300 text-gray-600 rounded cursor-not-allowed">→</li>
        @endif
    </ul>
</div>
@endif

</section>


<!-- Footer -->
<footer class="bg-white py-8 px-4 mt-auto">
<div class="max-w-6xl mx-auto grid grid-cols-1 sm:grid-cols-3 gap-6">
  <div class="flex flex-col items-center space-y-2">
    <span>Unduh aplikasi kami</span>
    <div class="flex space-x-4">
      <img src="{{ asset('img/playstore.png') }}" alt="playstore" width="40" />
      <img src="{{ asset('img/appstore.png') }}" alt="appstore" width="40" />
    </div>
  </div>
  <div class="text-center space-y-2">
    <span>Butuh bantuan? hubungi kami</span>
    <a href="#">hubungi kami</a>
    <a href="#">bantuan dan faq</a>
    <span>081-333-777-999</span>
    <span>Senin – Minggu: 10AM – 8PM</span>
  </div>
  <div class="flex flex-col items-center space-y-2">
    <span>We accept</span>
    <div class="flex space-x-4">
      <img src="{{ asset('img/mandiri.png') }}" alt="mandiri" width="40" />
      <img src="{{ asset('img/bca.png') }}" alt="bca" width="40" />
      <img src="{{ asset('img/visa.png') }}" alt="visa" width="40" />
      <img src="{{ asset('img/mastercard.png') }}" alt="mastercard" width="40" />
    </div>
  </div>
</div>
</footer>
</body>
</html>
