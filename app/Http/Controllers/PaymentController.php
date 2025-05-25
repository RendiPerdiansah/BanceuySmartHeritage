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
        if ($pesanan) {
            $pesanan->status = 'sudah dibayar';
            $pesanan->save();

            // Also update payment table status
            $payment = Payment::where('order_id', $pesanan->order_id)->first();
            if ($payment) {
                $payment->payment_status = 'settlement';
                $payment->save();
            }
        }
        return redirect()->route('payment.unpaid')->with('success', 'Status pesanan berhasil diubah menjadi sudah dibayar.');
    }
}

