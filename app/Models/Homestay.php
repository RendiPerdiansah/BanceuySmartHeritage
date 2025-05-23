<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Homestay extends Model
{
    use HasFactory;

    protected $table = 'tb_homestay';

    protected $primaryKey = 'id_homestay';

    public $incrementing = false;

    public $timestamps = false;


    protected $keyType = 'int';

    protected $fillable = [
        'nama_homestay',
        'harga_homestay',
        'foto_homestay',
        'deskripsi',
    ];
}
