<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

    public function update(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        return redirect()->route('admin.profile.show')->with('success', 'Profile updated successfully');
    }

    public function orderHistory()
    {
        $user = Auth::user();

        $orders = Order::where('id_pelanggan', $user->id)->latest()->get();

        // Statistik status pesanan
        $orders_chart = [
            'labels' => ['Selesai', 'Pending', 'Dibatalkan'],
            'data' => [
                Order::where('id_pelanggan', $user->id)->where('status', 'selesai')->count(),
                Order::where('id_pelanggan', $user->id)->where('status', 'pending')->count(),
                Order::where('id_pelanggan', $user->id)->where('status', 'batal')->count(),
            ]
        ];

        return view('user.order-history', compact('orders', 'orders_chart'));
    }

    public function show()
    {
        $user = Auth::user();
        return view('admin.profile.show', compact('user'));
    }
}
