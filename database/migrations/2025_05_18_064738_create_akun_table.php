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
        Schema::create('akun', function (Blueprint $table) {
            $table->integer('id')->nullable();
            $table->text('nama')->nullable();
            $table->text('username')->nullable();
            $table->text('password')->nullable();
            $table->integer('level')->nullable();
            $table->text('created_at')->nullable();
            $table->text('updated_at')->nullable();
            $table->string('no_hp')->nullable();
            $table->string('email')->nullable();
            $table->string('status')->nullable();
            $table->text('alamat')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('akun');
    }
};
