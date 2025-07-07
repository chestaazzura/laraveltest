@php
    // Ambil cart dari session jika $cartItems tidak dikirim dari controller
    $cartItems = isset($cartItems) ? $cartItems : session('cart') ?? [];
    $total = 0;
    foreach ($cartItems as $item) {
        $qty = $item['qty'] ?? ($item->qty ?? 1);
        $harga = $item['harga'] ?? ($item->produk->harga ?? 0);
        $total += $qty * $harga;
    }
@endphp
<div id="sideCart" class="fixed top-0 right-0 h-full w-80 bg-white shadow-lg z-50 flex flex-col transform translate-x-full transition-transform duration-300" style="display: none;">
    <div class="flex items-center justify-between p-4 border-b">
        <h2 class="text-lg font-semibold">Keranjang</h2>
        <button id="closeCartBtn" class="text-gray-500 hover:text-red-500 text-2xl">&times;</button>
    </div>
    <div class="flex-1 overflow-y-auto p-4">
        @if (count($cartItems) > 0)
            @foreach ($cartItems as $item)
                @php
                    $qty = $item['qty'] ?? ($item->qty ?? 1);
                    $produkId = $item['produk_id'] ?? ($item->produk_id ?? $item->id);
                @endphp
                <div class="flex items-center mb-4 border-b pb-2">
                    <img src="{{ asset('storage/' . ($item['image_url'] ?? ($item->produk->image_url ?? 'img/BabyCare.png'))) }}" alt="{{ $item['nama_produk'] ?? ($item->produk->nama_produk ?? 'Produk') }}" class="w-14 h-14 object-cover rounded mr-3">
                    <div class="flex-1">
                        <div class="font-semibold text-gray-800">
                            {{ $item['nama_produk'] ?? ($item->produk->nama_produk ?? '-') }}
                        </div>
                        <form action="{{ route('cart.update', $produkId) }}" method="POST" class="flex items-center space-x-2 cart-qty-form" data-produk-id="{{ $produkId }}">
                            @csrf
                            @method('PATCH')
                            <button type="button" class="qty-btn px-2 py-1 bg-gray-200 rounded text-lg font-bold" data-action="minus">-</button>
                            <input type="number" name="qty" value="{{ $qty }}" min="1" class="w-12 px-1 py-1 border rounded text-center qty-input">
                            <button type="button" class="qty-btn px-2 py-1 bg-gray-200 rounded text-lg font-bold" data-action="plus">+</button>
                        </form>
                        <div class="text-sm text-blue-600 font-bold cart-item-subtotal" data-harga="{{ $item['harga'] ?? ($item->produk->harga ?? 0) }}">
                            Rp {{ number_format(($item['harga'] ?? ($item->produk->harga ?? 0)) * $qty, 0, ',', '.') }}
                        </div>
                    </div>
                    <form action="{{ route('cart.remove', $produkId) }}" method="POST" class="ml-2">
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
        <div class="flex justify-between items-center mb-3">
            <span class="font-semibold text-gray-700">Total:</span>
            <span class="font-bold text-blue-600 text-lg cart-total">Rp {{ number_format($total, 0, ',', '.') }}</span>
        </div>
        <a href="{{ route('checkout') }}" class="w-full block bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition text-center">Checkout</a>
    </div>
</div>
<!-- Overlay -->
<div id="cartOverlay" class="fixed inset-0 bg-black bg-opacity-40 z-40" style="display: none;"></div>

{{-- JQuery untuk tombol + - qty --}}
<script>
function formatRupiah(angka) {
    return 'Rp ' + angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}
$(function() {
    $('.cart-qty-form').each(function() {
        var $form = $(this);
        var $input = $form.find('.qty-input');
        var $minus = $form.find('.qty-btn[data-action="minus"]');
        var $plus = $form.find('.qty-btn[data-action="plus"]');
        var $subtotal = $form.closest('.flex-1').find('.cart-item-subtotal');

        function updateQty(newQty) {
            if (newQty < 1) newQty = 1;
            $input.val(newQty);

            $.ajax({
                url: $form.attr('action'),
                method: 'POST',
                data: $form.serialize(),
                headers: {'X-HTTP-Method-Override': 'PATCH'},
                success: function(res) {
                    if(res && res.subtotal && res.total){
                        $subtotal.text(formatRupiah(res.subtotal));
                        $('.cart-total').text(formatRupiah(res.total));
                    }
                },
                error: function() {
                    alert('Gagal memperbarui jumlah.');
                }
            });
        }

        $minus.on('click', function(e) {
            e.preventDefault();
            var val = parseInt($input.val()) || 1;
            if (val > 1) {
                updateQty(val - 1);
            }
        });
        $plus.on('click', function(e) {
            e.preventDefault();
            var val = parseInt($input.val()) || 1;
            updateQty(val + 1);
        });
        $input.on('change', function() {
            var val = parseInt($input.val()) || 1;
            updateQty(val);
        });
    });
});
</script>
