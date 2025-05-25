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

        return response()->json(['status' => 'success']);
    }
}

