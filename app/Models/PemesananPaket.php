<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Homestay;

class PemesananPaket extends Model
{
    protected $table = 'pemesanan_paket';
    protected $fillable = ['nama_pengunjung', 'tanggal_kunjungan', 'id_homestay', 'nama_paket', 'alamat', 'jumlah_pengunjung', 'catatan_tambahan', 'no_hp'];

    public function homestay()
    {
        return $this->belongsTo(Homestay::class, 'id_homestay', 'id_homestay');
    }
}
