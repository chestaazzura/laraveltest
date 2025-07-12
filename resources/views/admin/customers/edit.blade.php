<!-- resources/views/admin/customers/edit.blade.php -->

@extends('layouts.dashboard')

@section('title', 'Edit Customer')

@section('content')
<div class="container-fluid">
    <h1 class="mb-4">Edit Customer</h1>
    <form action="{{ route('admin.customers.update', $customer->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" name="nama" value="{{ old('nama', $customer->name) }}" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" value="{{ old('email', $customer->email) }}" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="no_telp">No. Telepon</label>
            <input type="text" name="no_telp" value="{{ old('no_telp', $customer->no_telp) }}" class="form-control">
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea name="alamat" class="form-control">{{ old('alamat', $customer->alamat) }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('admin.customers.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
