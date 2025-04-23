@extends('layouts.app')

@section('title', 'Tarik Koin')

@section('content')
<h1>Tarik Koin</h1>

<form action="{{ route('koin.tarik.proses') }}" method="POST">
    @csrf
    <label>Pilih jumlah penarikan:</label>
    <select name="jumlah" class="form-control mb-3" required>
        <option value="10">10 Koin</option>
        <option value="20">20 Koin</option>
        <option value="50">50 Koin</option>
        <option value="100">100 Koin</option>
    </select>
    <button type="submit" class="btn btn-warning text-white">Tarik</button>
</form>
@endsection
