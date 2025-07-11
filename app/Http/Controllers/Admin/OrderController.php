<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Pembayaran;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('pelanggan')->orderByDesc('created_at')->get();
        return view('admin.orders.index', compact('orders'));
    }

    public function payments()
    {
        $payments = Pembayaran::with(['order.pelanggan'])->orderByDesc('created_at')->get();
        return view('admin.orders.payments', compact('payments'));
    }

    public function show(Order $order)
    {
        $order->load(['pelanggan', 'items.produk', 'pembayaran']);
        return view('admin.orders.show', compact('order'));
    }

    public function updateStatus(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:pending,dikirim,selesai,batal',
        ]);
        $order->status = $request->status;
        if ($request->status === 'dikirim' && !$order->tanggal_dikirim) {
            $order->tanggal_dikirim = now();
        }
        $order->save();
        return redirect()->route('admin.orders.show', $order)->with('success', 'Status order berhasil diupdate.');
    }
}
