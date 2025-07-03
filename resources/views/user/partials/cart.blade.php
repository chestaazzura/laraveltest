<!-- Side Cart Drawer -->
<div id="sideCart" class="fixed top-0 right-0 h-full w-80 bg-white shadow-lg z-50 flex flex-col transform translate-x-full transition-transform duration-300" style="display: none;">
    <div class="flex items-center justify-between p-4 border-b">
        <h2 class="text-lg font-semibold">Keranjang</h2>
        <button id="closeCartBtn" class="text-gray-500 hover:text-red-500 text-2xl">&times;</button>
    </div>
    <div class="flex-1 overflow-y-auto p-4">
        @if (isset($cartItems) && count($cartItems) > 0)
            @foreach ($cartItems as $item)
                <div class="flex items-center mb-4 border-b pb-2">
                    <img src="{{ asset('storage/' . $item->produk->image_url) }}" alt="{{ $item->produk->nama_produk }}" class="w-14 h-14 object-cover rounded mr-3">
                    <div class="flex-1">
                        <div class="font-semibold text-gray-800">{{ $item->produk->nama_produk }}</div>
                        <div class="text-sm text-gray-500">Qty: {{ $item->qty }}</div>
                        <div class="text-sm text-blue-600 font-bold">Rp {{ number_format($item->produk->harga, 0, ',', '.') }}</div>
                    </div>
                    <form action="{{ route('cart.remove', $item->id) }}" method="POST" class="ml-2">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:text-red-700" title="Hapus">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </div>
            @endforeach
        @else
            <p class="text-gray-500 text-center mt-8">Keranjang masih kosong.</p>
        @endif
    </div>
    <div class="p-4 border-t">
        <button class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition">Checkout</button>
    </div>
</div>
<!-- Overlay -->
<div id="cartOverlay" class="fixed inset-0 bg-black bg-opacity-40 z-40" style="display: none;"></div>
