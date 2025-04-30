<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PemesananPaket;

class Pemesanan extends Controller
{

    public function index()
    {
        return view('paket_wisata');
    }
    public function create()
    {
        return view('form-kunjungan');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pengunjung' => 'required',
            'tanggal_kunjungan' => 'required|date',
        ]);

        // Cek apakah tanggal sudah penuh
        $jumlah = PemesananPaket::where('tanggal_kunjungan', $request->tanggal_kunjungan)->count();
        if ($jumlah >= 50) {
            return back()->with('error', 'Tanggal kunjungan sudah penuh.');
        }

        PemesananPaket::create($request->all());
        return back()->with('success', 'Pemesanan berhasil.');
    }

    public function tanggalPenuh()
    {
        $data = PemesananPaket::selectRaw('tanggal_kunjungan, COUNT(*) as total')
            ->groupBy('tanggal_kunjungan')
            ->havingRaw('total >= 2')
            ->pluck('tanggal_kunjungan');

        return response()->json($data);
    }
}
