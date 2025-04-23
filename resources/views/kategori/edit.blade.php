@extends('layouts.app')

@section('content')
    <h2>Edit Kategori</h2>

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
        <form action="/kategori/update/{{ $index }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nama" class="form-label">Nama Kategori</label>
                <input type="text" id="nama" name="nama" class="form-control" value="{{ $kategori['nama'] }}" placeholder="Masukkan nama kategori">
            </div>

            <div class="mb-3">
                <label for="foto" class="form-label">Foto</label>
                <input type="file" id="foto" name="foto" class="form-control">
            </div>

            <small>Foto Lama:</small><br>
            <img src="{{ asset('storage/'.$kategori['foto']) }}" width="100"><br><br>

            <button type="submit" class="btn btn-warning">Update</button>
        </form>
    </div>

    <a href="{{ url('/kategori') }}" class="btn btn-secondary mt-3">Kembali ke daftar kategori</a>
@endsection
