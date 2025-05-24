<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;

class PaymentController extends Controller
{
    public function index()
    {
        return view('payment.v_payment');
    }

    public function bayar(Request $request)
    {
        $request->request->add(['total_harga' => $request->qty * 7000000, 'status' => 'Unpaid']);
        $order = Payment::create($request->all());


        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => $order->id,
                'gross_amount' => $order->total_harga,
            ),
            'customer_details' => array(
                'first_name' => $request->name,
                'phone' => $request->no_hp,
            ),
        );
        $orderId = $order->id;

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        return view('payment.v_bayar', compact('snapToken', 'orderId','order'));

    }

    public function callback(Request $request)
    {
        $serverKey = config('midtrans.server_key');
        $hashed = hash("sha512", $request->order_id.$request->status_code.$request->gross_amount.$server_key);
        if($hashed == $request->signature_key){
            if($request->transaction_status == 'capture'){
                $order = Payment::find($request->order_id);
                $order->update(['status' => 'Paid']);
            }
        }
    }

    public function succes(Request $request)
    {
        $orderId = $request->query(key: 'orderId');
        $order = Payment::where('id', $orderId)->first();

        if ($order)
        {
            $order->status = 'Paid';
            $order->save();
        }

        return view('welcome');
    }
}
