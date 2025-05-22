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
        Schema::create('pemesanan_paket', function (Blueprint $table) {
            $table->integer('id')->nullable();
            $table->text('nama_pengunjung')->nullable();
            $table->text('tanggal_kunjungan')->nullable();
            $table->text('created_at')->nullable();
            $table->text('updated_at')->nullable();
            $table->text('nama_homestay')->nullable();
            $table->text('nama_paket')->nullable();
            $table->integer('jumlah_pengunjung')->nullable();
            $table->text('catatan_tambahan')->nullable();
            $table->text('alamat')->nullable();
            $table->float('no_hp')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemesanan_paket');
    }
};
