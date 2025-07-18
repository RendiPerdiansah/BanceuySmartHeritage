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
            $table->bigInteger('total_harga')->nullable()->after('lama_tinggal');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pemesanan_homestay', function (Blueprint $table) {
            $table->dropColumn('total_harga');
        });
    }
};
