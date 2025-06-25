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
        ]);

        $user = auth('akun')->user();

        if ($user) {
            $validatedData['alamat'] = $user->alamat;
            $validatedData['no_hp'] = $user->no_hp;
        }

        $checkIn = \Carbon\Carbon::parse($validatedData['check_in'])->startOfDay();
        $checkOut = \Carbon\Carbon::parse($validatedData['check_out'])->startOfDay();
        $diffDays = $checkIn->diffInDays($checkOut); // ✅ yang benar

        \Log::info('CheckIn: ' . $checkIn->toDateString() . ', CheckOut: ' . $checkOut->toDateString() . ', DiffDays: ' . $diffDays);

        $validatedData['lama_tinggal'] = $diffDays > 0 ? $diffDays : 1;


        // Calculate total_harga = harga_homestay * lama_tinggal
        $homestay = \App\Models\Homestay::where('id_homestay', $request->id_homestay)->first();
        if ($homestay) {
            $validatedData['total_harga'] = $homestay->harga_homestay * $validatedData['lama_tinggal'];
        } else {
            $validatedData['total_harga'] = 0;
        }

        // Generate unique order_id
        $validatedData['order_id'] = 'order-' . strtoupper(uniqid());

        // Set initial status
        $validatedData['status'] = 'belum dibayar';

        try {
            $pemesanan = PemesananHomestay::create($validatedData);
            // Redirect to payment page for homestay
            return redirect()->route('payment.homestay.pay', ['order_id' => $pemesanan->order_id]);
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan saat memproses pemesanan: ' . $e->getMessage());
        }
    }
}
