<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBuktiPembayaranToPaymentTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('payment', function (Blueprint $table) {
            $table->string('bukti_pembayaran')->nullable()->after('payment_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('payment', function (Blueprint $table) {
            $table->dropColumn('bukti_pembayaran');
        });
    }
}
