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
        Schema::create('buku_kunjungan', function (Blueprint $table) {
            $table->integer('id')->nullable();
            $table->text('nama_pengunjung')->nullable();
            $table->text('alamat')->nullable();
            $table->text('tanggal_kunjungan')->nullable();
            $table->text('jumlah_pengunjung')->nullable();
            $table->text('kesan_pesan')->nullable();
            $table->text('updated_at')->nullable();
            $table->text('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buku_kunjungan');
    }
};
