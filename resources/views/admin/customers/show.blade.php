<!-- resources/views/admin/customers/show.blade.php -->

@extends('layouts.dashboard')

@section('title', 'Detail Customer')

@section('content')
<div class="container-fluid">
    <h1 class="mb-4">Detail Customer</h1>
    <div class="card">
        <div class="card-body">
            <p><strong>Nama:</strong> {{ $customer->name }}</p>
            <p><strong>Email:</strong> {{ $customer->email }}</p>
            <p><strong>No. Telepon:</strong> {{ $customer->no_telp }}</p>
            <p><strong>Alamat:</strong> {{ $customer->alamat }}</p>
            <p><strong>Terdaftar Sejak:</strong> {{ $customer->created_at->format('d M Y') }}</p>
        </div>
    </div>
    <a href="{{ route('admin.customers.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection
