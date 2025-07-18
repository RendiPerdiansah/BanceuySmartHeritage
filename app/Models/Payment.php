<?php

// app/Models/Payment.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payment';

    protected $fillable = [
        'order_id', 'payment_status', 'payment_method', 'amount', 'payment_date', 'bukti_pembayaran'
    ];
}

