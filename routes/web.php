<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomestayController;

Route::get('/', function () {
    return view('welcome');
});

Route::view('/sejarah', 'sejarah');
Route::view('/budaya', 'budaya');
Route::view('/tradisi', 'tradisi');
Route::view('/makanan_khas', 'makanan_khas');
Route::view('/kesenian', 'kesenian');
Route::view('/kaulinan_barudak', 'kaulinan_barudak');
Route::view('/atraksi_rakyat', 'atraksi_rakyat');
Route::view('/wisata_alam', 'wisata_alam');
Route::view('/ritual', 'ritual');
// Route::view('/paket_wisata', 'paket_wisata');
Route::view('/informasi_kunjungan', 'informasi_kunjungan');
// Route::view('/homestay', 'homestay');
// Route::get('/homestay', [HomestayController::class, 'index']);
// Route::get('/homestay/{id}', [HomestayController::class, 'show']);
Route::view('/gula_aren', 'gula_aren');
Route::view('/kicimpring', 'kicimpring');
Route::view('/kue_satu', 'kue_satu');
Route::view('/opak', 'opak');
Route::view('/r_katumbiri', 'r_katumbiri');
Route::view('/rangginang', 'rangginang');
Route::view('/ranggining', 'ranggining');
Route::view('/sambal_papagan', 'sambal_papagan');

// Update tanggal 14 maret 2025
Route::view('/detail_paket', 'detail_paket');

// Update tanggal 24 maret 2025
Route::view('/login', 'login');
//Update tanggal 28 maret 2025
Route::view('/register', 'register');
//Update tanggal 29 maret 2025
// Route::view('/dashboard', 'layout.v_dashboard_tamplate');
Route::view('/kesenian', 'kesenian');
//Update tanggal 01 april 2025
// Route::view('/tabel', 'layout.v_table_tamplate');
Route::view('/detail_paket_1H_A', 'detail_paket_1H_A');
Route::view('/detail_paket_1H_B', 'detail_paket_1H_B');
Route::view('/detail_paket_2H_1M', 'detail_paket_2H_1M');
Route::view('/detail_paket_3H_2M', 'detail_paket_3H_2M');
//Update tanggal 04 april 2025
// Route::view('/pemesanan_paket', 'pesan_paket');
Route::get('/pemesanan_paket', function () {
    return view('pesan_paket');
})->name('pemesanan_paket');
//Update tanggal 09 april 2025
use App\Http\Controllers\AkunAuthController;
use App\Http\Controllers\C_Homestay;

Route::post('/akun/register', [AkunAuthController::class, 'register'])->name('akun.register');

Route::post('/akun/logout', [AkunAuthController::class, 'logout'])->name('akun.logout');

Route::post('/akun/login', [AkunAuthController::class, 'login'])->name('akun.login');

Route::get('/akun/login', [AkunAuthController::class, 'showLoginForm'])->name('login');

Route::middleware('auth:akun')->group(function () {
    Route::get('/dashboard', function () {
        return view('layout.v_dashboard_tamplate');
    });
});

//Update 11 Maret 2025
// Route::resource('akun', AkunAuthController::class);

use App\Http\Controllers\DashboardController;

Route::get('/tabel_akun', [DashboardController::class, 'showTabelAkun'])->name('tabel_akun');
Route::get('/tabel_pesanan', [DashboardController::class, 'showTabelPesanan'])->name('tabel_pesanan');
//
use App\Http\Controllers\Pemesanan;

Route::get('/form-kunjungan', [Pemesanan::class, 'create']);
Route::post('/form-kunjungan', [Pemesanan::class, 'store']);
Route::get('/api/tanggal-penuh', [Pemesanan::class, 'tanggalPenuh']);
// CRUD
Route::get('/homestay-table', [C_Homestay::class, 'index'])->name('homestay');
Route::get('/homestay-table/detail/{id_homestay}', [C_Homestay::class, 'detail']);
Route::get('/homestay-table/add', [C_Homestay::class, 'add']);
Route::post('/homestay-table/insert', [C_Homestay::class, 'insert']);
Route::get('/homestay-table/edit/{id_homestay}', [C_Homestay::class, 'edit']);
Route::post('/homestay-table/update/{id_homestay}', [C_Homestay::class, 'update']);
Route::get('/homestay-table/delete/{id_homestay}', [C_Homestay::class, 'delete']);

// Middleware pemesanan paket
Route::get('/paket_wisata', [Pemesanan::class, 'index'])->middleware('auth:akun');


