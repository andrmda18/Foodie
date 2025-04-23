<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KoinController extends Controller
{
    private $transaksi = [];

    public function showKoin()
    {
        $transaksi = session('transaksi', []);
        return view('koin', compact('transaksi'));
    }

    public function showTopUp()
    {
        return view('topup');
    }

    public function showTarik()
    {
        return view('tarik');
    }

    public function processTopUp(Request $request)
    {
        $jumlah = $request->input('jumlah');

        $transaksi = session('transaksi', []);
        $transaksi[] = [
            'tanggal' => now(),
            'jenis' => 'top up',
            'jumlah' => $jumlah,
        ];
        session(['transaksi' => $transaksi]);

        return redirect()->route('dashboard')->with('message', "Top up $jumlah koin berhasil!");
    }

    public function processTarik(Request $request)
    {
        $jumlah = $request->input('jumlah');

        $transaksi = session('transaksi', []);
        $transaksi[] = [
            'tanggal' => now(),
            'jenis' => 'penarikan',
            'jumlah' => $jumlah,
        ];
        session(['transaksi' => $transaksi]);

        return redirect()->route('dashboard')->with('message', "Penarikan $jumlah koin berhasil!");
    }

    public function showDashboard()
    {
        return view('dashboard');
    }

    public function deleteTransaksi($id)
    {
        $transaksi = session('transaksi', []);
        unset($transaksi[$id]);
        session(['transaksi' => array_values($transaksi)]);

        return redirect()->route('koin');
    }
}
