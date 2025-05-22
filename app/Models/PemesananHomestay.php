<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PemesananHomestay extends Model
{
    protected $table = 'pemesanan_homestay';
    protected $fillable = ['nama_pengunjung',
                            'alamat',
                            'lama_tinggal',
                            ];
}
