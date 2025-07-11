<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class AuthController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        $orders_count = \App\Models\Order::where('id_pelanggan', $user->id)->count();

        return view('user.dashboard', compact('user', 'orders_count'));
    }

    public function profile()
    {
        $user = Auth::user();

        return view('user.profile', compact('user'));
    }

    public function orderHistory()
    {
        $user = Auth::user();

        // Misalnya relasi: $user->orders()
        $orders = Order::where('id_pelanggan', $user->id)->latest()->get();

        return view('user.order-history', compact('orders'));
    }
}
