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
    Route::get('/tabel_pesanan/print', [DashboardController::class, 'printPesanan'])->name('tabel_pesanan.print');

    // Account management routes
    Route::get('/akun/create', [DashboardController::class, 'createAkun'])->name('akun.create');
    Route::post('/akun', [DashboardController::class, 'storeAkun'])->name('akun.store');
    Route::get('/akun/{id}/edit', [DashboardController::class, 'editAkun'])->name('akun.edit');
    Route::put('/akun/{id}', [DashboardController::class, 'updateAkun'])->name('akun.update');
    Route::delete('/akun/{id}', [DashboardController::class, 'deleteAkun'])->name('akun.delete');

    // Dashboard admin route
    Route::get('/dashboard_admin', [DashboardController::class, 'dashboard_admin'])->name('dashboard_admin');
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

Route::get('/paket-table', [\App\Http\Controllers\C_Paket::class, 'index'])->name('paket');
Route::get('/paket-table/detail/{id}', [\App\Http\Controllers\C_Paket::class, 'detail']);
Route::get('/paket-table/add', [\App\Http\Controllers\C_Paket::class, 'add']);
Route::post('/paket-table/insert', [\App\Http\Controllers\C_Paket::class, 'insert']);
Route::get('/paket-table/edit/{id}', [\App\Http\Controllers\C_Paket::class, 'edit']);
Route::post('/paket-table/update/{id}', [\App\Http\Controllers\C_Paket::class, 'update']);
Route::get('/paket-table/delete/{id}', [\App\Http\Controllers\C_Paket::class, 'delete']);

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

Route::get('/detail_homestay/{id}', [\App\Http\Controllers\HomestayController::class, 'show'])->name('detail_homestay');

route::get('/tabel_pesanan_homestay', [DashboardController::class, 'showTabelPesananHomestay'])->name('tabel_pesanan_homestay');
route::get('/tabel_pesanan_homestay/print', [DashboardController::class, 'printPesananHomestay'])->name('tabel_pesanan_homestay.print');

route::get('/tabel_pesanan_homestay/{id}/edit', [DashboardController::class, 'editTabelPesananHomestay'])->name('tabel_pesanan_homestay.edit');
route::put('/tabel_pesanan_homestay/{id}', [DashboardController::class, 'updateTabelPesananHomestay'])->name('tabel_pesanan_homestay.update');
route::delete('/tabel_pesanan_homestay/{id}', [DashboardController::class, 'deleteTabelPesananHomestay'])->name('tabel_pesanan_homestay.delete');

route::get('/tabel_pesanan/{id}/edit', [DashboardController::class, 'editTabelPesanan'])->name('tabel_pesanan.edit');
route::put('/tabel_pesanan/{id}', [DashboardController::class, 'updateTabelPesanan'])->name('tabel_pesanan.update');
route::delete('/tabel_pesanan/{id}', [DashboardController::class, 'deletePesanan'])->name('tabel_pesanan.delete');

use App\Http\Controllers\BukuKunjunganController;


Route::get('/buku_kunjungan', [BukuKunjunganController::class, 'create']);
Route::get('/buku-kunjungan', [BukuKunjunganController::class, 'create']);
Route::post('/form-buku-kunjungan', [PemesananHomestayController::class, 'store']);


Route::post('/buku-kunjungan', [BukuKunjunganController::class, 'store']);

// Edit buku kunjungan
Route::get('/buku-kunjungan/{id}/edit', [BukuKunjunganController::class, 'edit'])->name('buku-kunjungan.edit');
Route::put('/buku-kunjungan/{id}', [BukuKunjunganController::class, 'update'])->name('buku-kunjungan.update');
Route::delete('/buku-kunjungan/{id}', [BukuKunjunganController::class, 'destroy'])->name('buku-kunjungan.destroy');

Route::get('/tabel_buku_kunjungan', [DashboardController::class, 'showTabelBukuKunjungan'])->name('tabel_buku_kunjungan');

//Update tanggal 07 mei 2025
Route::view('/tabel_pembayaran', 'dashboard.tabel_pembayaran');
Route::get('/payment/unpaid', [\App\Http\Controllers\PaymentController::class, 'showUnpaidOrders'])->name('payment.unpaid');

Route::get('/payment/{id}/pay', [\App\Http\Controllers\PaymentController::class, 'pay'])->name('payment.pay');

// Routes for PemesananHomestay payment integration
Route::prefix('payment/homestay')->group(function () {
    Route::get('/unpaid', [\App\Http\Controllers\PaymentController::class, 'showUnpaidHomestayOrders'])->name('payment.homestay.unpaid');
    Route::get('/{order_id}/pay', [\App\Http\Controllers\PaymentController::class, 'payHomestay'])->name('payment.homestay.pay');
    Route::get('/success', [\App\Http\Controllers\PaymentController::class, 'successHomestay'])->name('payment.homestay.success');
    Route::post('/notification', [\App\Http\Controllers\PaymentController::class, 'notificationHomestay'])->name('payment.homestay.notification');
});

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
    Route::get('/pengelola_homestay', [AdminController::class, 'pengelola']);
});

Route::middleware([PengunjungMiddleware::class])->group(function () {
    Route::get('/pengunjung', [AdminController::class, 'pengunjung']);
});


// Payment midtrans
// routes/web.php

use App\Http\Controllers\PaymentController;

Route::post('/pemesanan/store', [pemesanan::class, 'store']);

Route::get('/pemesanan/{id}/pay', [\App\Http\Controllers\Pemesanan::class, 'payOrder'])->name('pemesanan.payOrder');
Route::post('/payment/store', [PaymentController::class, 'store']);
Route::post('/payment/upload-proof', [\App\Http\Controllers\PaymentController::class, 'uploadProof'])->name('payment.uploadProof');
Route::get('/payment/success', [\App\Http\Controllers\PaymentController::class, 'success'])->name('payment.success');
//// Route::post('/payment/notification', [\App\Http\Controllers\PaymentController::class, 'notification'])->name('payment.notification');
Route::get('/payment/succes', function () {
    return redirect('/payment/success');
});
Route::view('/thank-you', 'payment.thankyou');

Route::get('/tabel_pesanan_pengunjung', [DashboardController::class, 'showTabelPesananPengunjung'])->name('tabel_pesanan_pengunjung');