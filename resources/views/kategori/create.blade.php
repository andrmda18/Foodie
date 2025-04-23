@extends('layouts.app')

@section('content')
    <h2>Tambah Kategori</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card p-4">
        <form action="/kategori/store" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="nama" class="form-label">Nama Kategori</label>
                <input type="text" id="nama" name="nama" class="form-control" placeholder="Masukkan nama kategori">
            </div>

            <div class="mb-3">
                <label for="foto" class="form-label">Foto</label>
                <input type="file" id="foto" name="foto" class="form-control">
            </div>

            <button type="submit" class="btn btn-success">Simpan</button>
        </form>
    </div>

    <a href="{{ url('/kategori') }}" class="btn btn-secondary mt-3">Kembali ke daftar kategori</a>
@endsection
