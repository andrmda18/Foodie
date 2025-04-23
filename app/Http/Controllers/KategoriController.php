<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KategoriController extends Controller
{
    // Menampilkan halaman daftar kategori
    public function index()
    {
        return view('kategori.index');
    }

    // Menampilkan form untuk membuat kategori baru
    public function create()
    {
        return view('kategori.create');
    }

    // Menyimpan data kategori baru
    public function store(Request $request)
    {
        // Validasi input: nama wajib, dan foto harus berupa gambar
        $request->validate([
            'nama' => 'required',
            'foto' => 'required|image'
        ]);

        // Ambil data kategori dari session (jika belum ada, gunakan array kosong)
        $kategori = session('kategori', []);

        // Cek apakah nama kategori sudah ada sebelumnya
        foreach ($kategori as $item) {
            if (strtolower($item['nama']) == strtolower($request->nama)) {
                return redirect()->back()->withInput()->with('error', 'Kategori sudah tersedia!');
            }
        }

        // Upload file gambar ke folder 'storage/app/public/kategori'
        $foto_path = $request->file('foto')->store('kategori', 'public');

        // Tambahkan kategori baru ke dalam array
        $kategori[] = [
            'nama' => $request->nama,
            'foto' => $foto_path
        ];

        // Simpan kembali array kategori ke dalam session
        session(['kategori' => $kategori]);

        // Redirect ke halaman dashboard dengan pesan sukses
        return redirect('/dashboard')->with('success', 'Kategori berhasil ditambahkan!');
    }


    // Menampilkan halaman dashboard
    public function dashboard()
    {
        return view('dashboard');
    }

    // Menampilkan form edit untuk kategori tertentu berdasarkan index
    public function edit($index)
    {
        // Ambil data kategori berdasarkan index dari session
        $kategori = session('kategori', [])[$index] ?? null;

        // Jika kategori tidak ditemukan, redirect ke index dengan pesan error
        if (!$kategori) {
            return redirect()->route('kategori.index')->with('error', 'Kategori tidak ditemukan');
        }

        // Tampilkan halaman edit dan kirim data kategori serta index-nya
        return view('kategori.edit', compact('kategori', 'index'));
    }

    // Menyimpan perubahan kategori
    public function update(Request $request, $index)
    {
        // Validasi input: nama wajib, foto opsional (jika ada harus gambar)
        $request->validate([
            'nama' => 'required',
            'foto' => 'nullable|image'
        ]);

        // Ambil data kategori dari session
        $kategori = session('kategori', []);

        // Update nama kategori berdasarkan input
        $kategori[$index]['nama'] = $request->nama;

        // Jika ada foto baru di-upload, simpan dan update path-nya
        if ($request->hasFile('foto')) {
            $foto_path = $request->file('foto')->store('kategori', 'public');
            $kategori[$index]['foto'] = $foto_path;
        }

        // Simpan kembali array kategori ke dalam session
        session(['kategori' => $kategori]);

        // Redirect ke halaman kategori dengan pesan sukses
        return redirect('/kategori')->with('success', 'Kategori berhasil diperbarui!');
    }

    // Menghapus kategori berdasarkan index
    public function delete($index)
    {
        // Ambil data kategori dari session
        $kategori = session('kategori', []);

        // Hapus data kategori pada index yang ditentukan
        unset($kategori[$index]);

        // Reindex array agar index tidak lompat
        session(['kategori' => array_values($kategori)]);

        // Redirect ke halaman kategori dengan pesan sukses
        return redirect('/kategori')->with('success', 'Kategori berhasil dihapus');
    }
}