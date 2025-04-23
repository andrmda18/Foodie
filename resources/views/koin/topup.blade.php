@extends('layouts.app')

@section('title', 'Top Up Koin')

@section('content')
<h1>Top Up Koin</h1>

<form action="{{ route('koin.topup.proses') }}" method="POST">
    @csrf
    <label>Pilih jumlah top up:</label>
    <select name="jumlah" class="form-control mb-3" required>
        <option value="10">10 Koin</option>
        <option value="20">20 Koin</option>
        <option value="50">50 Koin</option>
        <option value="100">100 Koin</option>
    </select>
    <button type="submit" class="btn btn-primary">Top Up</button>
</form>
@endsection
