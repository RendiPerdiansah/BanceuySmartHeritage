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
            $table->date('check_in')->nullable()->after('alamat');
            $table->date('check_out')->nullable()->after('check_in');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pemesanan_homestay', function (Blueprint $table) {
            $table->dropColumn(['check_in', 'check_out']);
        });
    }
};
