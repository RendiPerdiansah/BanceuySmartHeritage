<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PemesananPaket extends Model
{
    protected $table = 'pemesanan_paket'; 
    protected $fillable = ['nama_pengunjung', 'tanggal_kunjungan'];
}
