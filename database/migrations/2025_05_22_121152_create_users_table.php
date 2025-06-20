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
        Schema::create('users', function (Blueprint $table) {
            $table->text('id')->nullable();
            $table->text('name')->nullable();
            $table->text('email')->nullable();
            $table->text('email_verified_at')->nullable();
            $table->text('password')->nullable();
            $table->text('remember_token')->nullable();
            $table->text('created_at')->nullable();
            $table->text('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
