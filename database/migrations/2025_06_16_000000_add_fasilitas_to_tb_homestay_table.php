<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFasilitasToTbHomestayTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('tb_homestay', function (Blueprint $table) {
            $table->text('fasilitas')->nullable()->after('deskripsi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tb_homestay', function (Blueprint $table) {
            $table->dropColumn('fasilitas');
        });
    }
}
