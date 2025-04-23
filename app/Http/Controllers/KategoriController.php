<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KategoriController extends Controller
{
    // Tampilkan tabel kategori
    public function index()
    {
        return view('kategori.index');
    }

    // Tampilkan form create
    public function create()
    {
        return view('kategori.create');
    }

    // Proses simpan kategori
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required',
            'foto' => 'required|image'
        ]);

        // Upload file
        $foto_path = $request->file('foto')->store('kategori', 'public');

        // Simpan data dalam session
        $kategori = session('kategori', []);
        $kategori[] = [
            'nama' => $request->nama,
            'foto' => $foto_path
        ];
        session(['kategori' => $kategori]);

        // Redirect ke dashboard dengan pesan sukses
        return redirect('/dashboard')->with('success', 'Kategori berhasil ditambahkan!');
    }

    // Tampilkan dashboard
    public function dashboard()
    {
        return view('dashboard');
    }

    // Tampilkan form edit
    public function edit($index)
    {
        // Fetch kategori berdasarkan index dari session
        $kategori = session('kategori', [])[$index] ?? null;

        if (!$kategori) {
            return redirect()->route('kategori.index')->with('error', 'Kategori tidak ditemukan');
        }

        return view('kategori.edit', compact('kategori', 'index'));
    }

    // Update kategori
    public function update(Request $request, $index)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required',
            'foto' => 'nullable|image'
        ]);

        // Ambil data kategori dari session
        $kategori = session('kategori', []);

        // Update nama kategori
        $kategori[$index]['nama'] = $request->nama;

        // Update foto jika ada file baru
        if ($request->hasFile('foto')) {
            $foto_path = $request->file('foto')->store('kategori', 'public');
            $kategori[$index]['foto'] = $foto_path;
        }

        // Simpan kembali data yang sudah diubah ke session
        session(['kategori' => $kategori]);

        return redirect('/kategori')->with('success', 'Kategori berhasil diperbarui!');
    }

    // Hapus kategori
    public function delete($index)
    {
        // Hapus kategori berdasarkan index
        $kategori = session('kategori', []);
        unset($kategori[$index]);
        session(['kategori' => array_values($kategori)]);

        return redirect('/kategori')->with('success', 'Kategori berhasil dihapus');
    }
}
