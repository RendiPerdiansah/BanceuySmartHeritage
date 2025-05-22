<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BukuKunjungan extends Model
{
    protected $table = 'buku_kunjungan';
    protected $fillable = ['nama_pengunjung',
                            'alamat',
                            'tanggal_kunjungan',
                            'jumlah_pengunjung',
                            'kesan_pesan'
                            ];
}
