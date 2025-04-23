@extends('layouts.app')

@section('content')
    <h2 class="mb-4">Data Kategori</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ url('/kategori/create') }}" class="btn btn-primary mb-3">+ Tambah Kategori</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Kategori</th>
                <th>Foto</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach(session('kategori', []) as $k)
            <tr>
                <td>{{ $k['nama'] }}</td>
                <td><img src="{{ asset('storage/'.$k['foto']) }}" width="100"></td>
                <td>
                    <a href="/kategori/edit/{{ $loop->index }}" class="btn btn-warning btn-sm">Edit</a>
                    <a href="/kategori/delete/{{ $loop->index }}" class="btn btn-danger btn-sm">Hapus</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
