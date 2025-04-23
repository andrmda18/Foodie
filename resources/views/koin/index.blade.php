@extends('layouts.app')

@section('title', 'Koin Saya')

@section('content')
<h1>Koin Saya</h1>

<table class="table">
    <thead>
        <tr>
            <th>Tanggal</th>
            <th>Jenis</th>
            <th>Jumlah</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($transaksi as $index => $item)
        <tr>
            <td>{{ $item['tanggal'] }}</td>
            <td>{{ $item['jenis'] }}</td>
            <td>{{ $item['jumlah'] }}</td>
            <td>
                <form method="POST" action="{{ route('koin.delete', $index) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                </form>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<a href="{{ route('koin.topup') }}" class="btn btn-success">Top Up Koin</a>
<a href="{{ route('koin.tarik') }}" class="btn btn-warning text-white">Tarik Koin</a>
@endsection
