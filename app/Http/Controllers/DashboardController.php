<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Akun;
use App\Models\PemesananPaket;

class DashboardController extends Controller
{
    public function showTabelAkun()
    {
        $dataAkun = Akun::all(); 
        return view('dashboard.tabel_akun', compact('dataAkun'));
    }

    public function showTabelPesanan()
    {
        $dataPesanan = PemesananPaket::all(); 
        return view('dashboard.tabel_pesanan', compact('dataPesanan'));
    }
}

