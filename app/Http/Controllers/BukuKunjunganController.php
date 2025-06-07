<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BukuKunjungan;
use App\Models\PemesananPaket;
use Illuminate\Support\Facades\Auth;

class BukuKunjunganController extends Controller
{
    public function index()
    {
        return view('buku_kunjungan');
    }

    public function create()
    {
        $user = auth('akun')->user();
        $pemesanan = null;
        if ($user) {
            $pemesanan = PemesananPaket::where('nama_pengunjung', $user->nama)
                ->orderBy('id_pesanan', 'desc')
                ->first();
        }
        return view('buku_kunjungan')->with('pemesanan', $pemesanan);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pengunjung' => 'required',
            'alamat' => 'required|string|max:255',
            'tanggal_kunjungan' => 'required|date',
            'jumlah_pengunjung' => 'required|integer|min:1|max:50',
            'kesan_pesan' => 'nullable|string|max:255',
        ]);

        BukuKunjungan::create($request->all());
        return back()->with('success', 'Terima Kasih atas kunjungan anda.');
    }
}
