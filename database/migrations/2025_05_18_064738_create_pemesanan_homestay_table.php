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
        Schema::create('pemesanan_homestay', function (Blueprint $table) {
            $table->integer('id')->nullable();
            $table->text('nama_pengunjung')->nullable();
            $table->text('alamat')->nullable();
            $table->integer('lama_tinggal')->nullable();
            $table->text('created_at')->nullable();
            $table->text('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemesanan_homestay');
    }
};
