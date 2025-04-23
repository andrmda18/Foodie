<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = session('kategori', []);
        return view('kategori.index', compact('kategori'));
    }

    public function create()
    {
        return view('kategori.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'foto' => 'required|image'
        ]);

        $foto_path = $request->file('foto')->store('kategori', 'public');

        $kategori = session('kategori', []);
        $kategori[] = [
            'nama' => $request->nama,
            'foto' => $foto_path
        ];
        session(['kategori' => $kategori]);

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil ditambahkan!');
    }

    public function dashboard()
    {
        return view('dashboard');
    }

    public function edit($index)
    {
        $kategori = session('kategori', []);
        if (!isset($kategori[$index])) {
            return redirect()->route('kategori.index')->with('error', 'Kategori tidak ditemukan');
        }

        return view('kategori.edit', ['kategori' => $kategori[$index], 'index' => $index]);
    }

    public function update(Request $request, $index)
    {
        $request->validate([
            'nama' => 'required',
            'foto' => 'nullable|image'
        ]);

        $kategori = session('kategori', []);

        $kategori[$index]['nama'] = $request->nama;

        if ($request->hasFile('foto')) {
            $foto_path = $request->file('foto')->store('kategori', 'public');
            $kategori[$index]['foto'] = $foto_path;
        }

        session(['kategori' => $kategori]);

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diperbarui!');
    }

    public function delete($index)
    {
        $kategori = session('kategori', []);
        unset($kategori[$index]);
        session(['kategori' => array_values($kategori)]);

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus');
    }
}
