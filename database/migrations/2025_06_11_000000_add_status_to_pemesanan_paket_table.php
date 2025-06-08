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
        Schema::table('pemesanan_paket', function (Blueprint $table) {
            if (!Schema::hasColumn('pemesanan_paket', 'status')) {
                $table->string('status')->default('belum dibayar')->after('order_id');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pemesanan_paket', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};
