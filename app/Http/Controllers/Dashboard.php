<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kategori;



class Dashboard extends Controller
{
    public function index()
    {
        $totalKategori = kategori::count();
      
        
        return view('dashboard-admin', compact('totalKategori'));
    }
}
