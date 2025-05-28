<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BukuKunjungan;

class BukuKunjunganController extends Controller
{
    public function index()
    {
        return view('buku_kunjungan');
    }
    public function create()
    {
        return view('buku_kunjungan');
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
        return back()->with('success', 'Pemesanan berhasil.');
    }
}
