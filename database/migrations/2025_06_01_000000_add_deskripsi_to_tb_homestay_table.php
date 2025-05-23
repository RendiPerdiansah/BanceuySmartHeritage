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
        Schema::table('tb_homestay', function (Blueprint $table) {
            $table->text('deskripsi')->nullable()->after('foto_homestay');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tb_homestay', function (Blueprint $table) {
            $table->dropColumn('deskripsi');
        });
    }
};
