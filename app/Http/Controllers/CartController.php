<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Pembayaran;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CartController extends Controller
{
    public function add(Request $request, Produk $produk)
    {
        $qty = max(1, (int) $request->input('qty', 1));
        $cart = session()->get('cart', []);

        if (isset($cart[$produk->id])) {
            $cart[$produk->id]['qty'] += $qty;
        } else {
            $cart[$produk->id] = [
                'produk_id' => $produk->id,
                'nama_produk' => $produk->nama_produk,
                'image_url' => $produk->image_url,
                'harga' => $produk->harga,
                'qty' => $qty,
            ];
        }

        session(['cart' => $cart]);
        return redirect()->back()->with('success', 'Produk ditambahkan ke keranjang!');
    }

    public function remove($id)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session(['cart' => $cart]);
        }
        return redirect()->back()->with('success', 'Produk dihapus dari keranjang!');
    }

    public function update(Request $request, $id)
    {
        $cart = session()->get('cart', []);
        $qty = max(1, (int) $request->input('qty', 1));
        if (isset($cart[$id])) {
            $cart[$id]['qty'] = $qty;
            session(['cart' => $cart]);
        }
        // Jika AJAX, balikan subtotal dan total
        if ($request->ajax()) {
            $subtotal = $cart[$id]['qty'] * $cart[$id]['harga'];
            $total = 0;
            foreach ($cart as $item) {
                $total += $item['qty'] * $item['harga'];
            }
            return response()->json([
                'subtotal' => $subtotal,
                'total' => $total,
            ]);
        }
        return redirect()->back()->with('success', 'Jumlah produk di keranjang diperbarui!');
    }

    // Buy Now: simpan produk di session buy_now, lalu redirect ke checkout
    public function buyNow(Request $request, Produk $produk)
    {
        $qty = max(1, (int) $request->input('qty', 1));
        session(['buy_now' => [
            'produk_id' => $produk->id,
            'nama_produk' => $produk->nama_produk,
            'image_url' => $produk->image_url,
            'harga' => $produk->harga,
            'qty' => $qty,
        ]]);
        return redirect()->route('checkout');
    }

    // Checkout: tampilkan halaman checkout, prioritas buy_now jika ada
    public function checkout()
    {
        $buyNow = session('buy_now');
        $cartItems = session('cart', []);
        return view('user.checkout', [
            'buyNow' => $buyNow,
            'cartItems' => $buyNow ? [] : $cartItems,
        ]);
    }

    public function processCheckout(Request $request)
    {
        $validated = validator($request->all(), [
            'nama_penerima' => 'required|string|max:255',
            'alamat' => 'required|string|max:500',
            'no_hp' => 'required|string|max:20',
            'metode_pembayaran' => 'required|in:cod,transfer,ewallet',
        ], [
            'nama_penerima.required' => 'Nama penerima wajib diisi.',
            'alamat.required' => 'Alamat pengiriman wajib diisi.',
            'no_hp.required' => 'No. HP wajib diisi.',
            'metode_pembayaran.required' => 'Pilih salah satu metode pembayaran.',
            'metode_pembayaran.in' => 'Metode pembayaran tidak valid.',
        ])->validate();

        $buyNow = session('buy_now');
        $cartItems = session('cart', []);
        $user = Auth::user();
        $id_pelanggan = $user ? ($user->id ?? null) : null;
        $orderId = 'ORD' . strtoupper(Str::random(8));
        $order = null;
        $total = 0;

        if ($buyNow) {
            $total = $buyNow['qty'] * $buyNow['harga'];
            $order = Order::create([
                'id_order' => $orderId,
                'id_pelanggan' => $id_pelanggan,
                'total_price' => $total,
                'status' => 'pending',
                'alamat_pengiriman' => $request->alamat,
                'no_resi' => null,
                'tanggal_pesanan' => now(),
                'tanggal_dikirim' => null,
                'metode_pembayaran' => $request->metode_pembayaran,
            ]);
            OrderItem::create([
                'id_order' => $order->id,
                'id_produk' => $buyNow['produk_id'],
                'quantity' => $buyNow['qty'],
                'harga' => $buyNow['harga'],
            ]);
            session()->forget('buy_now');
        } elseif (count($cartItems) > 0) {
            foreach ($cartItems as $item) {
                $total += $item['qty'] * $item['harga'];
            }
            $order = Order::create([
                'id_order' => $orderId,
                'id_pelanggan' => $id_pelanggan,
                'total_price' => $total,
                'status' => 'pending',
                'alamat_pengiriman' => $request->alamat,
                'no_resi' => null,
                'tanggal_pesanan' => now(),
                'tanggal_dikirim' => null,
                'metode_pembayaran' => $request->metode_pembayaran,
            ]);
            foreach ($cartItems as $item) {
                OrderItem::create([
                    'id_order' => $order->id,
                    'id_produk' => $item['produk_id'],
                    'quantity' => $item['qty'],
                    'harga' => $item['harga'],
                ]);
            }
            session()->forget('cart');
        } else {
            return redirect()->route('checkout')->with('error', 'Tidak ada produk untuk diproses.');
        }

        Pembayaran::create([
            'id_pembayaran' => 'PAY' . strtoupper(Str::random(8)),
            'id_order' => $order->id,
            'payment_method' => $request->metode_pembayaran,
            'payment_status' => 'pending',
            'payment_date' => null,
        ]);

        return redirect()->route('home')->with('success', 'Pesanan berhasil diproses!');
    }
}
