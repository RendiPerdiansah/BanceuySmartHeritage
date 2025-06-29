<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddHomestayDetailsToPemesananHomestayTable extends Migration
{
    public function up()
    {
        Schema::table('pemesanan_homestay', function (Blueprint $table) {
            $table->string('nama_homestay')->after('nama_pengunjung');
            $table->bigInteger('harga_homestay')->after('total_harga');
            $table->string('foto_homestay')->nullable()->after('harga_homestay');
        });
    }

    public function down()
    {
        Schema::table('pemesanan_homestay', function (Blueprint $table) {
            $table->dropColumn(['nama_homestay', 'harga_homestay', 'foto_homestay']);
        });
    }
}
