<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('pemesanan_homestay', function (Blueprint $table) {
            if (!Schema::hasColumn('pemesanan_homestay', 'order_id')) {
                $table->string('order_id')->unique()->after('nama_pengunjung');
            }
            if (!Schema::hasColumn('pemesanan_homestay', 'status')) {
                $table->string('status')->default('belum dibayar')->after('order_id');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pemesanan_homestay', function (Blueprint $table) {
            $table->dropColumn('order_id');
            $table->dropColumn('status');
        });
    }
};
