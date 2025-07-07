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
}
