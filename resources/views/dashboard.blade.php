@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Dashboard Admin</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row">
        <!-- Modul Resep -->
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title">Modul Resep</h5>
                    <p class="card-text">Kelola daftar resep yang telah diinput pengguna.</p>
                    <a href="{{ route('resep.index') }}" class="btn btn-primary">Kelola Resep</a>
                </div>
            </div>
        </div>

        <!-- Modul Kategori -->
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title">Modul Kategori</h5>
                    <p class="card-text">Kelola kategori untuk resep yang tersedia.</p>
                    <a href="{{ route('kategori.index') }}" class="btn btn-success">Kelola Kategori</a>
                </div>
            </div>
        </div>

        <!-- Modul Koin -->
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title">Modul Koin</h5>
                    <p class="card-text">Atur sistem reward dan penukaran koin pengguna.</p>
                    <a href="{{ route('koin.index') }}" class="btn btn-warning">Kelola Koin</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
