<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PemesananHomestay;

class PemesananHomestayController extends Controller
{
    public function index()
    {
        $homestays = \App\Models\Homestay::all();
        return view('homestay', compact('homestays'));
    }
    public function create()
    {
        $homestays = \App\Models\Homestay::all();
        return view('homestay', compact('homestays'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_pengunjung' => 'required|string|max:255',
            'alamat' => 'required|string|max:500',
            'check_in' => 'required|date|after_or_equal:today',
            'check_out' => 'required|date|after:check_in',
            'id_homestay' => 'required|exists:tb_homestay,id_homestay',
        ]);

        $user = auth('akun')->user();

        if ($user) {
            $validatedData['alamat'] = $user->alamat;
            $validatedData['no_hp'] = $user->no_hp;
        }

        // Calculate lama_tinggal as difference in days between check_in and check_out
        $checkIn = \Carbon\Carbon::parse($validatedData['check_in']);
        $checkOut = \Carbon\Carbon::parse($validatedData['check_out']);
        $diffDays = $checkOut->diffInDays($checkIn);

        // Ensure lama_tinggal is never negative
        $validatedData['lama_tinggal'] = $diffDays > 0 ? $diffDays : 0;

        // Calculate total_harga = harga_homestay * lama_tinggal
        $homestay = \App\Models\Homestay::find($validatedData['id_homestay']);
        if ($homestay) {
            $validatedData['total_harga'] = $homestay->harga_homestay * $validatedData['lama_tinggal'];
        } else {
            $validatedData['total_harga'] = 0;
        }

        try {
            PemesananHomestay::create($validatedData);
            return back()->with('success', 'Pemesanan berhasil.');
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan saat memproses pemesanan: ' . $e->getMessage());
        }
    }
}
