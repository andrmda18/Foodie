<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KoinController extends Controller
{
    private $transaksi = [];

    public function showKoin()
    {
        $transaksi = session('transaksi', []);

        $saldo = 0;
        foreach ($transaksi as $item) {
            if ($item['jenis'] === 'top up') {
                $saldo += $item['jumlah'];
            } elseif ($item['jenis'] === 'penarikan') {
                $saldo -= $item['jumlah'];
            }
        }

        return view('koin.index', compact('transaksi', 'saldo'));
    }

    public function showTopUp()
    {
        return view('koin.topup');
    }

    public function showTarik()
    {
        return view('koin.tarik');
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

        return redirect()->route('koin.index')->with('message', "Top up $jumlah koin berhasil!");
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

        return redirect()->route('koin.index')->with('message', "Penarikan $jumlah koin berhasil!");
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

        return redirect()->route('koin.index');
    }
}
