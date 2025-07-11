<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pembayaran;

class PaymentController extends Controller
{
    public function updateStatus(Request $request, Pembayaran $pembayaran)
    {
        $request->validate([
            'payment_status' => 'required|in:pending,berhasil,gagal',
        ]);
        $pembayaran->payment_status = $request->payment_status;
        if ($request->payment_status === 'berhasil' && !$pembayaran->payment_date) {
            $pembayaran->payment_date = now();
        }
        $pembayaran->save();
        return redirect()->back()->with('success', 'Status pembayaran berhasil diupdate.');
    }
    public function show(Pembayaran $pembayaran)
    {
        $pembayaran->load('order.pelanggan');
        return view('admin.orders.payment_show', compact('pembayaran'));
    }
}
