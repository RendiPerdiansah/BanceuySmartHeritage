<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;


Route::post('/callback', [PaymentController::class, 'callback']);


use App\Http\Controllers\MidtransWebhookController;

Route::post('/midtrans/notification', [MidtransWebhookController::class, 'handle']);