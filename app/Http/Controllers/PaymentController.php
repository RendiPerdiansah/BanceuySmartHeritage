<?php

namespace App\Http\Controllers;

// app/Http/Controllers/PaymentController.php
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function store(Request $request)
    {
        Payment::create([
            'order_id' => $request->order_id,
            'payment_status' => $request->transaction_status,
            'payment_method' => $request->payment_type,
            'amount' => $request->gross_amount,
            'payment_date' => now(),
        ]);

        // Update order status if payment is successful
        if (in_array($request->transaction_status, ['capture', 'settlement'])) {
            $pesanan = \App\Models\PemesananPaket::find($request->order_id);
            if ($pesanan) {
                $pesanan->status = 'sudah dibayar';
                $pesanan->save();
            }
        }

        return response()->json(['status' => 'success']);
    }

    public function showUnpaidOrders()
    {
        $unpaidOrders = \App\Models\PemesananPaket::where('status', 'belum dibayar')->get();
        return view('payment.v_payment', compact('unpaidOrders'));
    }

    public function pay($id)
    {
        $pesanan = \App\Models\PemesananPaket::where('order_id', $id)->first();
        if (!$pesanan) {
            return redirect()->route('payment.unpaid')->with('error', 'Pesanan tidak ditemukan.');
        }

        $paket = \App\Models\Paket::where('nama_paket', $pesanan->nama_paket)->first();

        // Midtrans configuration
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;

        $params = [
            'transaction_details' => [
                'order_id' => $pesanan->order_id,
                'gross_amount' => $pesanan->total_harga,
            ],
            'customer_details' => [
                'first_name' => $pesanan->nama_pengunjung,
                'phone' => $pesanan->no_hp,
                'address' => $pesanan->alamat,
            ],
        ];

        $snapToken = \Midtrans\Snap::getSnapToken($params);

        return view('payment.v_bayar', compact('pesanan', 'paket', 'snapToken'));
    }

    public function checkStatus($orderId)
    {
        // Midtrans configuration
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;

        try {
            $status = \Midtrans\Transaction::status($orderId);
            return response()->json($status);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}

