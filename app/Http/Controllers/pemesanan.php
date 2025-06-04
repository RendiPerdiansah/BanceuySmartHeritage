<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PemesananPaket;
use Midtrans\Config;
use Midtrans\Snap;
use App\Models\Homestay;
use App\Models\Paket;

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

   

 
    public function detailPaket1HA()
    {
        $homestays = Homestay::all();
        $paket = \App\Models\Paket::where('nama_paket', 'Paket 1 Hari (A)')->first();
        return view('detail.detail_paket_1H_A', ['homestays' => $homestays, 'paket' => $paket]);
    }

    public function detailPaket1HB()
    {
        $homestays = Homestay::all();
        $paket = \App\Models\Paket::where('nama_paket', 'Paket 1 Hari (B)')->first();
        return view('detail.detail_paket_1H_B', ['homestays' => $homestays, 'paket' => $paket]);
    }

    public function detailPaket2H1M()
    {
        $homestays = Homestay::all();
        $paket = \App\Models\Paket::where('nama_paket', 'Paket 2 Hari 1 Malam')->first();
        return view('detail.detail_paket_2H_1M', ['homestays' => $homestays, 'paket' => $paket]);
    }

    public function detailPaket3H2M()
    {
        $homestays = Homestay::all();
        $paket = \App\Models\Paket::where('nama_paket', 'Paket 3 Hari 2 Malam')->first();
        return view('detail.detail_paket_3H_2M', ['homestays' => $homestays, 'paket' => $paket]);
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'nama_pengunjung' => 'required',
        //     'tanggal_kunjungan' => 'required|date',
        //     'jumlah_pengunjung' => 'required|integer|min:1|max:50',
        //     'nama_paket' => 'required',
        //     'id_homestay' => 'required|integer',
        //     'catatan_tambahan' => 'nullable|string|max:255',
        // ]);

        $paket = \App\Models\Paket::where('nama_paket', $request->nama_paket)->first();
        $totalHarga = $paket ? $paket->harga_paket * $request->jumlah_pengunjung : 0;

        $data = $request->all();
        $data['order_id'] = 'order-' . strtoupper(uniqid());
        $data['total_harga'] = $totalHarga;

        $pemesanan = PemesananPaket::create($data);
        $pesanan = $pemesanan;

        //Konfigurasi midtrans
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = true;
        Config::$is3ds = true;

        $params = [
            'transaction_details' => [
                'order_id' => $pesanan->id,
                'gross_amount' => $totalHarga,
            ],
            'customer_details' => [
                'first_name' => $request->nama_pengunjung,
                'phone' => $request->no_hp ?? '',
            ],
        ];

        $snapToken = Snap::getSnapToken($params);
        return view('payment.v_bayar', compact('snapToken', 'pesanan', 'paket'));

        $user = auth('akun')->user();

        $data = $request->all();
        if ($user) {
            $data['no_hp'] = $user->no_hp;
            $data['alamat'] = $user->alamat;
        }

        // Cek apakah tanggal sudah penuh
        $jumlah = PemesananPaket::where('tanggal_kunjungan', $data['tanggal_kunjungan'])->count();
        if ($jumlah >= 2) {
            return back()->with('error', 'Tanggal kunjungan sudah penuh.');
        }

        PemesananPaket::create($data);
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
