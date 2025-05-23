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
        Schema::create('tb_homestay', function (Blueprint $table) {
            $table->integer('id_homestay', true);
            $table->text('nama_homestay')->nullable();
            $table->integer('harga_homestay')->nullable();
            $table->text('foto_homestay')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_homestay');
    }
};
