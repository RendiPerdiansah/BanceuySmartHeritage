<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Homestay;

class PemesananPaket extends Model
{
    protected $table = 'pemesanan_paket';
    protected $fillable = [
        'nama_pengunjung', 'tanggal_kunjungan', 'nama_paket',
        'jumlah_pengunjung', 'catatan_tambahan', 'alamat', 'no_hp', 'order_id', 'status','total_harga',
    ];

    // Removed homestay relationship as id_homestay is removed
    // public function homestay()
    // {
    //     return $this->belongsTo(Homestay::class, 'id_homestay', 'id_homestay');
    // }
}
