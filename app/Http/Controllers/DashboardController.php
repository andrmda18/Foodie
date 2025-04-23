<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Data dummy – bisa diganti dengan data dari model
        $pesan = session('success');
        $totalResep = 23;
        $totalKategori = 8;
        $totalKoin = 1250;

        return view('dashboard', compact('pesan', 'totalResep', 'totalKategori', 'totalKoin'));
    }
}
