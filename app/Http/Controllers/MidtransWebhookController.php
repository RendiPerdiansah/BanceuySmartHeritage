<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MidtransWebhookController extends Controller
{
    public function handle(Request $request)
    {
        // Ambil server key dari config atau .env
        $serverKey = config('midtrans.server_key'); // Sebaiknya buat file config/midtrans.php

        // Validasi signature key
        $signatureKey = hash('sha512', $request->order_id . $request->status_code . $request->gross_amount . $serverKey);
        if ($signatureKey != $request->signature_key) {
            return response()->json(['message' => 'Invalid signature'], 403);
        }

        // Cari transaksi berdasarkan order_id
        $transaction = \App\Models\Payment::where('order_id', $request->order_id)->first();
        if (!$transaction) {
             return response()->json(['message' => 'Transaction not found'], 404);
        }

        // Update status transaksi
        $transactionStatus = $request->transaction_status;
        if ($transactionStatus == 'settlement' || $transactionStatus == 'capture') {
            $transaction->status = 'settlement'; // atau 'success' sesuai kebutuhan Anda
        } else if ($transactionStatus == 'pending') {
            $transaction->status = 'pending';
        } else if ($transactionStatus == 'deny' || $transactionStatus == 'expire' || $transactionStatus == 'cancel') {
            $transaction->status = 'failed';
        }

        // Simpan detail lainnya jika perlu
        $transaction->transaction_id = $request->transaction_id;
        $transaction->payment_type = $request->payment_type;
        $transaction->payment_details = json_encode($request->all()); // Simpan semua data notifikasi
        $transaction->save();

        return response()->json(['message' => 'Notification processed successfully']);
    }
}
