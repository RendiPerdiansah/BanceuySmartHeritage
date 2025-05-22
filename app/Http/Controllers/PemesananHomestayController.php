<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PemesananHomestay;

class PemesananHomestayController extends Controller
{
    public function index()
    {
        return view('homestay');
    }
    public function create()
    {
        return view('homestay');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pengunjung' => 'required',
            'lama_tinggal' => 'required',
        ]);

        $user = auth('akun')->user();

        $data = $request->all();
        if ($user) {
            $data['alamat'] = $user->alamat;
            $data['no_hp'] = $user->no_hp;
        }

        PemesananHomestay::create($data);
        return back()->with('success', 'Pemesanan berhasil.');
    }
}