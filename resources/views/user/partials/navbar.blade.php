<!-- Navbar -->
<header class="bg-blue-500 text-white">
    <!-- Top bar: logo + links -->
    <div class="container mx-auto flex justify-between items-center py-2 px-4">
        <!-- Logo -->
        <a href="{{ route('home') }}">
            <img src="{{ asset('img/BabyCare.png') }}" alt="BabyCare Logo" class="h-10">
        </a>

        <!-- Grup ID + Contact Us dalam satu flex container -->
        <div class="flex items-center space-x-4">
            <img src="{{ asset('img/language.png') }}" alt="Bahasa" width="40">
            <a href="https://wa.me/6283119343746" class="flex items-center space-x-2 hover:underline" target="_blank">
                <img src="{{ asset('img/contact.png') }}" alt="Chat via WhatsApp" width="100">
            </a>
        </div>
    </div>

    <div class="bg-[#f0f0f0]">
        <!-- Nav dan Icon Bar dalam satu baris -->
        <div class="container mx-auto flex justify-between items-center py-2 px-4">

            <nav class="flex space-x-6 text-sm font-semibold text-gray-700">
                <a href="{{ route('home') }}" class="hover:text-blue-600 {{ request()->routeIs('home') ? 'text-blue-600' : '' }}">Beranda</a>
                <a href="{{ route('user.produks.index') }}" class="hover:text-blue-600 {{ request()->routeIs('user.produks.index') ? 'text-blue-600' : '' }}">Semua Produk</a>

                @foreach ($kategoriGroups as $group => $kategoris)
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="flex items-center space-x-1 hover:text-blue-600 focus:outline-none">
                            <span>{{ ucfirst($group) }}</span>
                            <svg :class="{ 'rotate-180': open }" class="w-3 h-3 mt-[1px] text-gray-500 transition-transform duration-200" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div x-show="open" @click.away="open = false" class="absolute left-0 bg-white shadow-md mt-2 rounded z-10 min-w-[160px]" x-cloak>
                            @foreach ($kategoris as $kategori)
                                <a href="{{ route('user.produks.category', $kategori) }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-100">
                                    {{ $kategori->nama_kategori }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </nav>


            <!-- Icon di Kanan -->
            <div class="flex items-center space-x-4">
                <button aria-label="Search" onclick="toggleSearch()">
                    <img src="{{ asset('img/Search.png') }}" alt="Search" width="40">
                </button>
                {{-- <button aria-label="Location">
                    <img src="{{ asset('img/Location.png') }}" alt="Location" width="40">
                </button> --}}
                @php
                    $cart = session('cart', []);
                    // Hitung jumlah item unik (bukan total qty)
                    $cartCount = count($cart);
                @endphp

                <!-- Cart Icon Button -->
                <button id="cartToggleBtn" type="button" class="relative p-1 rounded-lg hover:bg-gray-200 hover:shadow-md transition-all duration-200 transform hover:scale-105" aria-label="Keranjang">
                    <img src="{{ asset('img/Cart.png') }}" alt="Cart" width="40">
                    <span class="absolute -top-2 -right-2 bg-red-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">
                        {{ $cartCount }}
                    </span>
                </button>


                @auth
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="flex items-center space-x-2 focus:outline-none">
                            @if (Auth::user()->profile_picture)
                                <img src="{{ asset('storage/' . Auth::user()->profile_picture) }}" alt="User" class="w-10 h-10 rounded-full object-cover">
                            @else
                                <img src="{{ asset('img/User.png') }}" alt="User" class="w-10 h-10 rounded-full object-cover">
                            @endif
                            <span class="text-gray-700 text-sm">{{ Auth::user()->name }}</span>
                        </button>
                        {{-- @dd(Auth::user()->role) --}}
                        <div x-show="open" @click.away="open = false" x-cloak class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50">
                            @if (Auth::user()->role->name === 'user')
                                <a href="{{ route('user.profile') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
                                <a href="{{ route('user.orders') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Order History</a>
                                {{-- <a href="{{ route('user.settings') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Setting</a> --}}
                            @elseif(Auth::user()->role->name === 'admin')
                                <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Dashboard</a>
                                <a href="{{ route('admin.profile.show') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
                                {{-- <a href="{{ route('admin.settings') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Setting</a> --}}
                            @endif

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
                        <img src="{{ asset('img/User.png') }}" alt="User" width="40">
                        <span class="text-gray-700 text-sm">Login</span>
                    </a>
                @endauth

            </div>
        </div>
    </div>
</header>

<!-- Search Modal -->
<div id="searchModal" class="fixed inset-0 z-50 bg-black bg-opacity-50 hidden transition-opacity duration-300 ease-in-out" onclick="toggleSearch(event)">
    <div class="flex items-center justify-center min-h-screen p-4" onclick="event.stopPropagation()">
        <div id="searchContent" class="bg-white rounded-2xl p-6 w-full max-w-md shadow-lg transform scale-95 opacity-0 transition duration-300 ease-in-out">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-bold text-gray-800">🔍 Cari Produk</h3>
                <button onclick="toggleSearch()" class="text-gray-500 hover:text-gray-700 text-xl">
                    &times;
                </button>
            </div>
            <form action="{{ route('user.produks.index') }}" method="GET">
                <div class="flex space-x-2">
                    <input type="text" id="searchInput" name="search" placeholder="Masukkan nama produk..." class="flex-1 px-4 py-2 border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-500 shadow-sm transition duration-200">
                    <button type="submit" class="px-5 py-2 rounded-full bg-blue-500 text-white font-medium hover:bg-blue-600 shadow-md transition duration-200">
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
        const content = document.getElementById('searchContent');
        const isHidden = modal.classList.contains('hidden');
        if (isHidden) {
            modal.classList.remove('hidden');
            setTimeout(() => {
                content.classList.remove('opacity-0', 'scale-95');
                a
                content.classList.add('opacity-100', 'scale-100');
            }, 10);
        } else {
            content.classList.remove('opacity-100', 'scale-100');
            content.classList.add('opacity-0', 'scale-95');
            setTimeout(() => {
                modal.classList.add('hidden');
            }, 300); // tunggu animasi selesai
        }
    }
</script>
