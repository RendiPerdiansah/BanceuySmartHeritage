<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PemesananPaket;
use Midtrans\Config;
use Midtrans\Snap;
use App\Models\Homestay;

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
        return view('detail.detail_paket_1H_A', compact('homestays'));
    }

    public function detailPaket1HB()
    {
        $homestays = Homestay::all();
        return view('detail.detail_paket_1H_B', compact('homestays'));
    }

    public function detailPaket2H1M()
    {
        $homestays = Homestay::all();
        return view('detail.detail_paket_2H_1M', compact('homestays'));
    }

    public function detailPaket3H2M()
    {
        $homestays = Homestay::all();
        return view('detail.detail_paket_3H_2M', compact('homestays'));
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


        $data = $request->all();

        $data['order_id'] = 'order-' . strtoupper(uniqid());

        $pemesanan = PemesananPaket::create($data);

        //Konfigurasi midtrans
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = true;
        Config::$is3ds = true;

        $params = [
            'transaction_details' => [
                'order_id' => $pemesanan->id,
                'gross_amount' => 7000000, // Ganti dengan harga paket yang sesuai
            ],
            'customer_details' => [
                'first_name' => $request->nama_pengunjung,
                'phone' => $request->no_hp ?? '',
            ],
        ];

        $snapToken = Snap::getSnapToken($params);
        return view('payment.v_bayar', compact('snapToken', 'pemesanan'));

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
