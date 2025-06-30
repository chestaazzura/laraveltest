<!-- Navbar -->
<header class="bg-blue-500 text-white">
    <!-- Top bar: logo + links -->
    <div class="container mx-auto flex justify-between items-center py-2 px-4">
        <!-- Logo -->
        <a href="{{ route('home') }}">
            <img src="{{ asset('storage/img/BabyCare.png') }}" alt="BabyCare Logo" class="h-10">
        </a>

        <!-- Grup ID + Contact Us dalam satu flex container -->
        <div class="flex items-center space-x-4">
            <img src="{{ asset('storage/img/language.png') }}" alt="Bahasa" width="40">
            <a href="https://wa.me/6283119343746" class="flex items-center space-x-2 hover:underline" target="_blank">
                <img src="{{ asset('storage/img/contact.png') }}" alt="Chat via WhatsApp" width="100">
            </a>
        </div>
    </div>

    <div class="bg-[#f0f0f0]">
        <!-- Nav dan Icon Bar dalam satu baris -->
        <div class="container mx-auto flex justify-between items-center py-2 px-4">

            <!-- Nav Kategori di Kiri -->
            <nav class="flex space-x-6 text-sm font-semibold text-gray-700">
                <a href="{{ route('home') }}" class="hover:text-blue-600 {{ request()->routeIs('home') ? 'text-blue-600' : '' }}">Home</a>
                <a href="{{ route('user.produks.index') }}" class="hover:text-blue-600 {{ request()->routeIs('user.produks.*') ? 'text-blue-600' : '' }}">Semua Produk</a>
                @php
                    $kategoris = \App\Models\Kategori::all();
                @endphp
                @foreach ($kategoris as $kategori)
                    <a href="{{ route('user.produks.category', $kategori) }}" class="hover:text-blue-600">{{ $kategori->nama_kategori }}</a>
                @endforeach
            </nav>

            <!-- Icon di Kanan -->
            <div class="flex items-center space-x-4">
                <button aria-label="Search" onclick="toggleSearch()">
                    <img src="{{ asset('storage/img/Search.png') }}" alt="Search" width="40">
                </button>
                <button aria-label="Location">
                    <img src="{{ asset('storage/img/Location.png') }}" alt="Location" width="40">
                </button>
                <a href="#" class="relative">
                    <img src="{{ asset('storage/img/Cart.png') }}" alt="Cart" width="40">
                    <span class="absolute -top-2 -right-2 bg-red-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">0</span>
                </a>

                @auth
                    <div class="relative group">
                        <button class="flex items-center space-x-2">
                            <img src="{{ asset('storage/img/User.png') }}" alt="User" width="40">
                            <span class="text-gray-700 text-sm">{{ Auth::user()->name }}</span>
                        </button>
                        <div class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50 hidden group-hover:block">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Order History</a>
                            <div class="border-t border-gray-100"></div>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                @csrf
                            </form>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="flex items-center space-x-2 hover:opacity-80">
                        <img src="{{ asset('storage/img/User.png') }}" alt="User" width="40">
                        <span class="text-gray-700 text-sm">Login</span>
                    </a>
                @endauth
            </div>
        </div>
    </div>
</header>

<!-- Search Modal -->
<div id="searchModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden">
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="bg-white rounded-lg p-6 w-full max-w-md">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-semibold">Cari Produk</h3>
                <button onclick="toggleSearch()" class="text-gray-400 hover:text-gray-600">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <form action="{{ route('user.produks.index') }}" method="GET">
                <div class="flex space-x-2">
                    <input type="text" name="search" placeholder="Masukkan nama produk..." class="flex-1 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                        Cari
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function toggleSearch() {
        const modal = document.getElementById('searchModal');
        modal.classList.toggle('hidden');
    }
</script>
