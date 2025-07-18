<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBuktiPembayaranToPemesananHomestayTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('pemesanan_homestay', function (Blueprint $table) {
            $table->string('bukti_pembayaran')->nullable()->after('alamat');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pemesanan_homestay', function (Blueprint $table) {
            $table->dropColumn('bukti_pembayaran');
        });
    }
}
