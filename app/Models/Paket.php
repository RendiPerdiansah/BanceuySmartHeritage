<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    use HasFactory;

    protected $table = 'paket';

    protected $primaryKey = 'id';

    protected $fillable = [
        'nama_paket',
        'deskripsi_paket',
        'harga_paket',
        'foto_paket',
    ];

    public $timestamps = false;
}
