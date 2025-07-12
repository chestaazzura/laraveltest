@extends('layouts.dashboard')

@section('title', 'User Dashboard')

@section('breadcrumb')
    <li class="breadcrumb-item active">Dashboard</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-4 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $orders_count }}</h3>
                    <p>Total Pesanan</p>
                </div>
                <div class="icon">
                    <i class="fas fa-shopping-cart"></i>
                </div>
                <a href="{{ route('user.orders') }}" class="small-box-footer">Lihat Semua <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-4 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $user->name }}</h3>
                    <p>Nama Pengguna</p>
                </div>
                <div class="icon">
                    <i class="fas fa-user"></i>
                </div>
                <a href="{{ route('user.profile') }}" class="small-box-footer">Lihat Profil <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-4 col-6">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ session('cart') ? collect(session('cart'))->sum('qty') : 0 }}</h3>
                    <p>Item di Keranjang</p>
                </div>
                <div class="icon">
                    <i class="fas fa-shopping-cart"></i>
                </div>
                <a href="{{ route('checkout') }}" class="small-box-footer">Lihat Keranjang <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
@endsection
