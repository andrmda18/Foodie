@extends('layouts.app')

@section('content')
<div class="container mt-4">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
        </div>
    @endif

    <div class="card p-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="mb-0"><i class="bi bi-journal-text me-2"></i>Manajemen Resep</h3>
            <a href="{{ route('resep.create') }}" class="btn btn-success rounded-pill px-4">
                <i class="bi bi-plus-circle me-1"></i> Tambah Resep
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle text-center">
                <thead class="table-success">
                    <tr>
                        <th>Gambar</th>
                        <th>Judul Resep</th>
                        <th>Langkah - Langkah</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($reseps as $resep)
                    <tr>
                        <td>
                            <img src="{{ asset($resep['gambar']) }}" alt="Gambar" class="rounded shadow-sm" width="80">
                        </td>
                        <td class="fw-semibold text-start">{{ $resep['judul'] }}</td>
                        <td class="text-start">{{ $resep['langkah'] }}</td>
                        <td>
                            <span class="badge bg-primary">
                                <i class="bi bi-calendar2"></i> {{ $resep['tanggal'] }}
                            </span>
                        </td>
                        <td>
                            <form action="{{ route('resep.destroy', $resep['id']) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus resep ini?');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-outline-danger btn-sm">
                                    <i class="bi bi-trash"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-muted">Belum ada resep yang tersedia.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
