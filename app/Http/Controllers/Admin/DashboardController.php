<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\Produk;
use App\Models\Order;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'totalKategori' => Kategori::count(),
            'totalProduk' => Produk::count(),
            'totalOrder' => Order::count(),
            'totalCustomer' => User::where('role_id', 2)->count(), // role_id 2 = user
        ];

        return view('dashboard-admin', $data);
    }
}
