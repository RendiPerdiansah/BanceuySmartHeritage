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
        Schema::create('jobs', function (Blueprint $table) {
            $table->text('id')->nullable();
            $table->text('queue')->nullable();
            $table->text('payload')->nullable();
            $table->text('attempts')->nullable();
            $table->text('reserved_at')->nullable();
            $table->text('available_at')->nullable();
            $table->text('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
