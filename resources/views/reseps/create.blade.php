@extends('layouts.app')
@section('content')
<div class="container mt-5">
    <div class="card p-4">
        <h4 class="mb-4"><i class="bi bi-plus-circle me-2"></i>Tambah Resep Baru</h4>
        <form action="{{ route('resep.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="judulResep" class="form-label">Judul Resep</label>
                <input type="text" class="form-control" id="judulResep" name="judul" placeholder="Contoh: Nasi Goreng Spesial">
            </div>
            <div class="mb-3">
                <label for="langkahLangkah" class="form-label">Langkah-Langkah</label>
                <textarea class="form-control" id="langkahLangkah" name="langkah" rows="5" placeholder="Contoh: 1. Panaskan wajan..."></textarea>
            </div>
            <div class="mb-3">
                <label for="tanggalResep" class="form-label">Tanggal</label>
                <input type="date" class="form-control" id="tanggalResep" name="tanggal">
            </div>
            <div class="mb-3">
                <label for="gambarResep" class="form-label">Gambar Resep</label>
                <input class="form-control" type="file" id="gambarResep" name="gambar">
            </div>
            <button type="submit" class="btn btn-success rounded-pill px-4">
                <i class="bi bi-save me-1"></i> Simpan Resep
            </button>
        </form>
    </div>
</div>
@endsection
