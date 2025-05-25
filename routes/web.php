<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomestayController;

Route::middleware(['auth:akun'])->group(function () {
    Route::get('/profile', [\App\Http\Controllers\DashboardController::class, 'showProfile'])->name('profile');
    Route::get('/profile/edit', [\App\Http\Controllers\DashboardController::class, 'editProfile'])->name('profile.edit');
    Route::post('/profile/update', [\App\Http\Controllers\DashboardController::class, 'updateProfile'])->name('profile.update');

    Route::get('/profile/foto/{id}', [\App\Http\Controllers\DashboardController::class, 'getProfileFoto'])->name('profile.foto');
});

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
Route::view('/homestay', 'homestay');
Route::get('/homestay', [HomestayController::class, 'index']);
Route::get('/homestay/{id}', [HomestayController::class, 'show']);
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
use App\Http\Controllers\Pemesanan;

Route::get('/detail_paket_1H_A', [Pemesanan::class, 'detailPaket1HA']);
Route::get('/detail_paket_1H_B', [Pemesanan::class, 'detailPaket1HB']);
Route::get('/detail_paket_2H_1M', [Pemesanan::class, 'detailPaket2H1M']);
Route::get('/detail_paket_3H_2M', [Pemesanan::class, 'detailPaket3H2M']);
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

    Route::get('/profile', [\App\Http\Controllers\DashboardController::class, 'showProfile'])->name('profile');

    Route::get('/profile/edit', [\App\Http\Controllers\DashboardController::class, 'editProfile'])->name('profile.edit');
    Route::post('/profile/update', [\App\Http\Controllers\DashboardController::class, 'updateProfile'])->name('profile.update');
});

//Update 11 Maret 2025
// Route::resource('akun', AkunAuthController::class);

use App\Http\Controllers\DashboardController;

    Route::get('/tabel_akun', [DashboardController::class, 'showTabelAkun'])->name('tabel_akun');
    Route::get('/tabel_pesanan', [DashboardController::class, 'showTabelPesanan'])->name('tabel_pesanan');

    // Account management routes
    Route::get('/akun/create', [DashboardController::class, 'createAkun'])->name('akun.create');
    Route::post('/akun', [DashboardController::class, 'storeAkun'])->name('akun.store');
    Route::get('/akun/{id}/edit', [DashboardController::class, 'editAkun'])->name('akun.edit');
    Route::put('/akun/{id}', [DashboardController::class, 'updateAkun'])->name('akun.update');
    Route::delete('/akun/{id}', [DashboardController::class, 'deleteAkun'])->name('akun.delete');
//

use App\Http\Controllers\PemesananHomestayController;

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


//Update tanggal 30 April 2025
Route::view('/tabel_kelola_homestay', 'dashboard.tabel_kelola_homestay');

//Update tanggal 02 Mei 2025
Route::get('/form-homestay', [PemesananHomestayController::class, 'create']);
Route::post('/form-homestay', [PemesananHomestayController::class, 'store']);


Route::get('/detail_homestay_A', [C_Homestay::class, 'detailA']);
Route::get('/detail_homestay_B', [C_Homestay::class, 'detailB']);
Route::get('/detail_homestay_C', [C_Homestay::class, 'detailC']);
Route::get('/detail_homestay_D', [C_Homestay::class, 'detailD']);

route::get('/tabel_pesanan_homestay', [DashboardController::class, 'showTabelPesananHomestay'])->name('tabel_pesanan_homestay');

use App\Http\Controllers\BukuKunjunganController;
Route::view('/buku_kunjungan', 'form_buku_kunjungan');
Route::get('/form-buku-kunjungan', [BukuKunjunganController::class, 'create']);
Route::post('/form-buku-kunjungan', [BukuKunjunganController::class, 'store']);

Route::get('/tabel_buku_kunjungan', [DashboardController::class, 'showTabelBukuKunjungan'])->name('tabel_buku_kunjungan');

//Update tanggal 07 mei 2025
Route::view('/tabel_pembayaran', 'dashboard.tabel_pembayaran');

//test
Route::get('/akun/detail/{id}', [DashboardController::class, 'DetailAkun']);

// Update Multi Level Auth (Belum Selesai)
use App\Http\Middleware\AdminMiddleware;    
use App\Http\Middleware\PengelolaMiddleware;
use App\Http\Middleware\PengunjungMiddleware;
use App\Http\Controllers\AdminController;


Route::middleware([AdminMiddleware::class])->group(function () {
    Route::get('/admin', [AdminController::class, 'index']);
});

Route::middleware([PengelolaMiddleware::class])->group(function () {
    Route::get('/pengelola_homestay', [DashboardController::class, 'ShowTabelPesananHomestay']);
});

Route::middleware([PengunjungMiddleware::class])->group(function () {
    Route::get('/pengunjung', [DashboardController::class, 'index']);
});


// Payment midtrans
// routes/web.php

use App\Http\Controllers\PaymentController;

Route::post('/pemesanan/store', [pemesanan::class, 'store']);
Route::post('/payment/store', [PaymentController::class, 'store']);
Route::view('/thank-you', 'payment.thankyou');
