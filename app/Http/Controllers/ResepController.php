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
            'langkah' => '
            1. Panaskan minyak di wajan, lalu tumis bawang putih hingga harum.
            2. Masukkan telur, orak-arik hingga matang.
            3.Masukkan nasi putih, aduk rata dengan bumbu dan telur.
            4. Tambahkan kecap manis, saus tiram, garam, dan merica. Aduk hingga rata dan nasi agak kering.
            5. Koreksi rasa, lalu angkat.
            6. Sajikan hangat dengan topping favorit seperti telur mata sapi atau acar.',
            'tanggal' => '2025-04-19'
        ],
        [
            'id' => 2,
            'judul' => 'Ayam Bakar Madu',
            'gambar' => 'assets/makanan2.jpg',
            'langkah' => '
            1. Cuci ayam dan lumuri dengan air jeruk nipis, diamkan 10 menit lalu bilas.
            2. Tumis bumbu halus hingga harum, lalu tambahkan kecap manis, saus tiram, dan madu. Aduk rata.
            3. Masukkan ayam, aduk hingga terbalut bumbu, tambahkan sedikit air, lalu masak hingga bumbu meresap dan ayam setengah empuk.
            4. Panggang ayam di atas bara api atau teflon, sambil dioles sisa bumbu dan margarin.
            5. Bakar hingga permukaan ayam kecokelatan dan harum.',
            'tanggal' => '2025-04-18'
        ],
        [
            'id' => 3,
            'judul' => 'Sambal Matah',
            'gambar' => 'assets/makanan3.jpg',
            'langkah' => '
            1. Campurkan semua bahan iris (bawang merah, cabai, serai, daun jeruk) dalam mangkuk.
            2. Tambahkan garam dan perasan jeruk limau, aduk rata.
            3. Panaskan minyak hingga benar-benar panas, lalu tuang ke dalam campuran sambal tadi.
            4. Aduk perlahan hingga semua bahan layu dan tercampur rata.',
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
        'langkah' => 'required|string',
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
