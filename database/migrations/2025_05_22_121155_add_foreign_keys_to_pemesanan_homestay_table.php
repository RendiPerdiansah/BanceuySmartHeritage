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
            $table->foreign(['id_homestay'], 'pemesanan_homestay_ibfk_1')->references(['id_homestay'])->on('tb_homestay')->onUpdate('restrict')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pemesanan_homestay', function (Blueprint $table) {
            $table->dropForeign('pemesanan_homestay_ibfk_1');
        });
    }
};
