<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResepController extends Controller
{
    private $reseps = [
        [
            'id' => 1,
            'judul' => 'Nasi Goreng',
            'gambar' => 'assets/makanan1.jpg',
            'tanggal' => '2025-04-19'
        ],
        [
            'id' => 2,
            'judul' => 'Ayam Bakar Madu',
            'gambar' => 'assets/makanan2.jpg',
            'tanggal' => '2025-04-18'
        ],
        [
            'id' => 3,
            'judul' => 'Sambal Matah',
            'gambar' => 'assets/makanan3.jpg',
            'tanggal' => '2025-04-17'
        ],
    ];

    public function index()
    {
        return view('reseps.index', ['reseps' => $this->reseps]);
    }

    public function create()
    {
        return view('reseps.create');
    }

    public function store(Request $request)
    {
    $validated = $request->validate([
        'judul' => 'required|string',
        'tanggal' => 'required|date',
        'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    return redirect()->route('resep.index')->with('success', 'Resep berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        return redirect()->route('resep.index')->with('success', 'Resep berhasil diperbarui!');
    }

    public function destroy($id)
    {
        return redirect()->route('resep.index')->with('success', 'Resep berhasil dihapus!');
    }
}
