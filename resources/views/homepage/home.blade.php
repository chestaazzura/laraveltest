<!DOCTYPE html>
<html lang="id" class="h-full bg-blue-100">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>BabyCare</title>
</head>

<body class="h-full flex flex-col">
    <!-- Navbar -->
    <header class="bg-blue-500 text-white">
        <!-- Top bar: logo + links -->
        <div class="container mx-auto flex justify-between items-center py-2 px-4">
            <!-- Logo -->
            <img src="{{ asset('storage/img/BabyCare.png') }}" alt="BabyCare Logo" class="h-10">

            <!-- Grup ID + Contact Us dalam satu flex container -->
            <div class="flex items-center space-x-4">
                <img src="{{ asset('storage/img/language.png') }}" alt="Bahasa" width="40">
                <a href="https://wa.me/08319343746" class="flex items-center space-x-2 hover:underline">
                    <img src="{{ asset('storage/img/contact.png') }}" alt="Chat via WhatsApp" width="100">
                </a>
            </div>
        </div>

        <div class="bg-[#f0f0f0]">
            <!-- Nav dan Icon Bar dalam satu baris -->
            <div class="container mx-auto flex justify-between items-center py-2 px-4">

                <!-- Nav Kategori di Kiri -->
                <nav class="flex space-x-6 text-sm font-semibold text-gray-700">
                    <a href="{{ route('home.index') }}" class="hover:text-blue-600">Home</a>

                    <a href="{{ route('produks.index') }}" class="hover:text-blue-600">Pakaian</a>
                    <a href="alatmakan.index" class="hover:text-blue-600">Alat Makan</a>
                    <a href="#alat-mandi" class="hover:text-blue-600">Alat Mandi</a>
                    <a href="#mainan" class="hover:text-blue-600">Mainan</a>
                </nav>

                <!-- Icon di Kanan -->
                <div class="flex items-center space-x-4">
                    <button aria-label="Search"><img src="{{ asset('storage/img/Search.png') }}" alt="Search" width="40"></button>
                    <button aria-label="Location"><img src="{{ asset('storage/img/Location.png') }}" alt="Location" width="40"></button>
                    <button aria-label="Cart"><img src="{{ asset('storage/img/Cart.png') }}" alt="Cart" width="40"></button>
                    <button aria-label="User"><img src="{{ asset('storage/img/User.png') }}" alt="User" width="40"></button>
                </div>

            </div>
        </div>


    </header>

    <!-- Hero -->
    <section class="bg-gradient-to-b from-blue-400 to-blue-200 p-6 text-center">
        <div class="max-w-4xl mx-auto">
            <img src="img/banner.png" alt="" class="mx-auto mb-4 rounded-lg" />
        </div>
    </section>

    <!-- Shop by category -->
    <section class="py-8 px-4">
        <h3 class="text-center text-xl font-semibold mb-6">Shop by category</h3>
        <div class="grid grid-cols-3 sm:grid-cols-6 gap-4 max-w-4xl mx-auto">
            @foreach ($categories as $cat)
                <div class="bg-white rounded-xl p-4 flex flex-col items-center">
                    <img src="{{ asset('storage/' . $cat['image_url']) }}" alt="{{ $cat['nama_kategori'] }}" class="w-20 h-20 object-cover rounded" />
                    <span>{{ $cat['nama_kategori'] }}</span>
                </div>
            @endforeach
        </div>
    </section>

    <!-- Best seller -->
    <section class="py-8 px-4 flex-1 bg-gradient-to-b from-blue-200 to-blue-100">
        <h3 class="text-center text-xl font-semibold mb-6">Recomendation</h3>
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-6 max-w-5xl mx-auto">
            <!-- repeat per product -->
            @foreach ($products as $product)
                <div class="bg-blue-400 rounded-lg p-4 flex flex-col items-center">
                    <img src="{{ asset('storage/' . $product['image_url']) }}" alt="{{ $product['nama_produk'] }}" class="mb-4 rounded w-full h-40 object-cover" />
                    <h4 class="text-white mb-1">{{ $product['nama_produk'] }}</h4>
                    <p class="text-white font-semibold">Rp. {{ number_format($product['harga'], 0, ',', '.') }}</p>
                </div>
            @endforeach
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-white py-8 px-4 mt-auto">
        <div class="max-w-6xl mx-auto grid grid-cols-1 sm:grid-cols-3 gap-6">
            <div class="flex flex-col items-center space-y-2">
                <span>Unduh aplikasi kami</span>
                <div class="flex space-x-4">
                    <img src="{{ asset('storage/img/Playstore.png') }}" alt="playstore" width="40" />
                    <img src="{{ asset('storage/img/Appstore.png') }}" alt="appstore" width="40" />
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
                    <img src="{{ asset('storage/img/Mandiri.png') }}" alt="mandiri" width="40" />
                    <img src="{{ asset('storage/img/Bca.png') }}" alt="bca" width="40" />
                    <img src="{{ asset('storage/img/Visa.png') }}" alt="visa" width="40" />
                    <img src="{{ asset('storage/img/Mastercard.png') }}" alt="mastercard" width="40" />
                </div>
            </div>
        </div>
    </footer>
</body>

</html>
