@extends('layouts.dashboard')

@section('title', 'User Profile')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Profil</li>
@endsection

@section('content')
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h3 class="card-title">Informasi Profil</h3>
        </div>
        <div class="card-body">
            <dl class="row">
                <dt class="col-sm-4">Nama</dt>
                <dd class="col-sm-8">{{ $user->name }}</dd>

                <dt class="col-sm-4">Email</dt>
                <dd class="col-sm-8">{{ $user->email }}</dd>

                <dt class="col-sm-4">Tanggal Registrasi</dt>
                <dd class="col-sm-8">{{ $user->created_at->translatedFormat('d F Y') }}</dd>
            </dl>
        </div>
    </div>
@endsection
