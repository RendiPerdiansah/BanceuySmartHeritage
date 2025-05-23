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
        Schema::create('job_batches', function (Blueprint $table) {
            $table->text('id')->nullable();
            $table->text('name')->nullable();
            $table->text('total_jobs')->nullable();
            $table->text('pending_jobs')->nullable();
            $table->text('failed_jobs')->nullable();
            $table->text('failed_job_ids')->nullable();
            $table->text('options')->nullable();
            $table->text('cancelled_at')->nullable();
            $table->text('created_at')->nullable();
            $table->text('finished_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_batches');
    }
};
