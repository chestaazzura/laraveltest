<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        // Ambil semua user dengan role_id user (default 2 untuk user biasa)
        $customers = User::where('role_id', 2)->orderByDesc('created_at')->get();
        // dd($customers);
        return view('admin.customers.index', compact('customers'));
    }
}
