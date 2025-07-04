<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PemesananHomestay extends Model
{
    protected $table = 'pemesanan_homestay';
    protected $primaryKey = 'id_pemesanan';
    protected $fillable = [
        'nama_pengunjung',
        'alamat',
        'lama_tinggal',
        'check_in',
        'check_out',
        'no_hp',
        'total_harga',
        'order_id',
        'status',
        'bukti_pembayaran',
        'nama_homestay',
        'harga_homestay',
        'foto_homestay',
    ];
}
