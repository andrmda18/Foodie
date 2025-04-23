@extends('layouts.app')
@section('content')
<div class="container mt-5">
    <div class="card p-4">
        <h4 class="mb-4"><i class="bi bi-pencil-square me-2"></i>Edit Resep</h4>
        <form action="{{ route('resep.update', $resep['id']) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT') <!-- method spoofing supaya Laravel tahu ini request PUT -->

            <div class="mb-3">
                <label for="judulEdit" class="form-label">Judul Resep</label>
                <input type="text" class="form-control" id="judulEdit" name="judul" value="{{ $resep['judul'] }}">
            </div>
            <div class="mb-3">
                <label for="tanggalEdit" class="form-label">Tanggal</label>
                <input type="date" class="form-control" id="tanggalEdit" name="tanggal" value="{{ $resep['tanggal'] }}">
            </div>
            <div class="mb-3">
                <label for="gambarEdit" class="form-label">Ubah Gambar</label>
                <input class="form-control" type="file" id="gambarEdit" name="gambar">
            </div>
            <button type="submit" class="btn btn-success rounded-pill px-4">
                <i class="bi bi-save me-1"></i> Update Resep
            </button>
        </form>
    </div>
</div>
@endsection
