<?php

namespace App\Http\Controllers;

// app/Http/Controllers/PaymentController.php
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    public function store(Request $request)
    {
        \Log::info('Payment store called with data:', $request->all());

        try {
            // Extract numeric order ID from string like "order-6832A052D025E"
            $orderIdStr = $request->order_id;
            $orderIdNum = null;
            if (preg_match('/\d+/', $orderIdStr, $matches)) {
                $orderIdNum = $matches[0];
            }

            Payment::create([
                'order_id' => $orderIdNum,
                'payment_status' => $request->transaction_status,
                'payment_method' => $request->payment_type,
                'amount' => $request->gross_amount,
                'payment_date' => now(),
            ]);

            // Update order status if payment is successful
            if (in_array($request->transaction_status, ['capture', 'settlement'])) {
                $pesanan = \App\Models\PemesananPaket::find($orderIdNum);
                if ($pesanan) {
                    $pesanan->status = 'sudah dibayar';
                    $pesanan->save();
                }
            }

            return response()->json(['status' => 'success']);
        } catch (\Exception $e) {
            \Log::error('Payment store error: ' . $e->getMessage());
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
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

    public function success(Request $request)
    {
        $orderId = $request->query('orderId');
        return view('payment.v_success', compact('orderId'));
    }

    public function notification(Request $request)
    {
        Log::info('Midtrans notification received:', $request->all());

        // Midtrans sends JSON payload with transaction_status, payment_type, order_id, gross_amount, etc.
        $notification = $request->all();

        // Create a new Request object with the expected fields for store()
        $storeRequest = new \Illuminate\Http\Request();
        $storeRequest->setMethod('POST');
        $storeRequest->request->add([
            'order_id' => $notification['order_id'] ?? null,
            'transaction_status' => $notification['transaction_status'] ?? null,
            'payment_type' => $notification['payment_type'] ?? null,
            'gross_amount' => $notification['gross_amount'] ?? null,
        ]);

        // Call the existing store logic to save payment data and update order status
        $this->store($storeRequest);

        return response()->json(['status' => 'notification received']);
    }
}

