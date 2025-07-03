<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Models\Akun;
use App\Models\PemesananHomestay;
use App\Models\PemesananPaket;
use App\Models\BukuKunjungan;
use App\Models\Payment;
use Carbon\Carbon;

use Barryvdh\DomPDF\Facade\Pdf;

class DashboardController extends Controller
{
    public function index()
    {
        return view('layout.v_dashboard_tamplate');
    }

    // Show edit form for pemesanan paket
    public function editTabelPesanan($id)
    {
        $pesanan = PemesananPaket::findOrFail($id);
        return view('dashboard.edit_pesanan_paket', compact('pesanan'));
    }

    // Update pemesanan paket
    public function updateTabelPesanan(Request $request, $id)
    {
        $pesanan = PemesananPaket::findOrFail($id);

        $validatedData = $request->validate([
            'nama_pengunjung' => 'required|string|max:255',
            'tanggal_kunjungan' => 'required|date',
            'nama_paket' => 'required|string|max:255',
            'jumlah_pengunjung' => 'required|integer|min:1',
            'catatan_tambahan' => 'nullable|string',
            'alamat' => 'required|string|max:255',
            'no_hp' => 'required|string|max:20',
            'status' => 'nullable|string|max:50',
            'total_harga' => 'required|numeric',
            'bukti_pembayaran' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('bukti_pembayaran')) {
            $file = $request->file('bukti_pembayaran');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('foto_bukti_pembayaran'), $filename);
            $validatedData['bukti_pembayaran'] = $filename;
            $validatedData['status'] = 'Sudah Dibayar';
        } else {
            $validatedData['bukti_pembayaran'] = $pesanan->bukti_pembayaran;
            $validatedData['status'] = $pesanan->status;
        }

        $pesanan->update($validatedData);

        return redirect()->route('tabel_pesanan')->with('success', 'Pesanan paket berhasil diperbarui.');
    }

    // Delete pemesanan paket
   

    // Show edit form for pemesanan homestay
    public function editTabelPesananHomestay($id_pemesanan)
    {
        $pesanan = PemesananHomestay::where('id_pemesanan', $id_pemesanan)->firstOrFail();
        return view('dashboard.edit_pesanan_homestay', compact('pesanan'));
    }

    // Update pemesanan homestay
    public function updateTabelPesananHomestay(Request $request, $id_pemesanan)
    {
        $pesanan = PemesananHomestay::where('id_pemesanan', $id_pemesanan)->firstOrFail();

        $validatedData = $request->validate([
            'bukti_pembayaran' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('bukti_pembayaran')) {
            $file = $request->file('bukti_pembayaran');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('foto_bukti_pembayaran'), $filename);
            $validatedData['bukti_pembayaran'] = $filename;
            $validatedData['status'] = 'Sudah Dibayar';
        } else {
            // If no new file uploaded, keep the old filename and status
            $validatedData['bukti_pembayaran'] = $pesanan->bukti_pembayaran;
            $validatedData['status'] = $pesanan->status;
        }

        $pesanan->update($validatedData);

        return redirect()->route('tabel_pesanan_homestay')->with('success', 'Pesanan homestay berhasil diperbarui.');
    }

    // Delete pemesanan homestay
    public function deleteTabelPesananHomestay($id_pemesanan)
    {
        $pesanan = PemesananHomestay::where('id_pemesanan', $id_pemesanan)->firstOrFail();
        $pesanan->delete();

        return redirect()->route('tabel_pesanan_homestay')->with('success', 'Pesanan homestay berhasil dihapus.');
    }

    public function showTabelAkun()
    {
        $dataAkun = Akun::all();
        return view('dashboard.tabel_akun', compact('dataAkun'));
    }

    public function showTabelPesanan(Request $request)
    {
        $monthYear = $request->query('month'); // expects format YYYY-MM
        $status = $request->query('status');

        $query = PemesananPaket::query();

        if ($monthYear) {
            $parts = explode('-', $monthYear);
            if (count($parts) == 2) {
                $year = intval($parts[0]);
                $month = intval($parts[1]);
                $query->whereYear('created_at', $year)
                    ->whereMonth('created_at', $month);
            }
        } else {
            $year = null;
            $month = null;
        }

        if ($status) {
            if ($status === 'paid') {
                $query->whereNotNull('bukti_pembayaran');
            } elseif ($status === 'unpaid') {
                $query->whereNull('bukti_pembayaran');
            }
        }

        $dataPesanan = $query->get();

        return view('dashboard.tabel_pesanan', compact('dataPesanan', 'month', 'year', 'status'));
    }

    public function showTabelPesananHomestay(Request $request)
    {
        $monthYear = $request->query('month'); // expects format YYYY-MM
        $status = $request->query('status');

        $query = PemesananHomestay::query();

        if ($monthYear) {
            $parts = explode('-', $monthYear);
            if (count($parts) == 2) {
                $year = intval($parts[0]);
                $month = intval($parts[1]);
                $query->whereYear('created_at', $year)
                    ->whereMonth('created_at', $month);
            }
        } else {
            $year = null;
            $month = null;
        }

        if ($status) {
            if ($status === 'paid') {
                $query->whereNotNull('bukti_pembayaran');
            } elseif ($status === 'unpaid') {
                $query->whereNull('bukti_pembayaran');
            }
        }

        $dataPesananHomestay = $query->get();

        return view('dashboard.tabel_pesanan_homestay', compact('dataPesananHomestay', 'month', 'year', 'status'));
    }

    public function printPesanan()
    {
        $dataPesanan = PemesananPaket::all();
        $pdf = Pdf::loadView('dashboard.pdf_pesanan', compact('dataPesanan'));
        return $pdf->stream('data_pesanan.pdf');
    }

    public function printPesananHomestay()
    {
        $dataPesananHomestay = PemesananHomestay::all();
        $pdf = Pdf::loadView('dashboard.pdf_pesanan_homestay', compact('dataPesananHomestay'));
        return $pdf->stream('data_pesanan_homestay.pdf');
    }

    public function showTabelBukuKunjungan()
    {
        $dataBukuKunjungan = BukuKunjungan::all();
        return view('dashboard.tabel_buku_kunjungan', compact('dataBukuKunjungan'));
    }

    public function showTabelPesananPengunjung()
    {
        // Ambil data akun yang sedang login
        $user = auth('akun')->user();

        $dataPesananPengunjung = [];

        // Pastikan user valid
        if ($user) {
            // Jika level 3 (pengunjung), filter berdasarkan nama_pengunjung
            if ($user->level == 3) {
                $dataPesananPengunjung = PemesananPaket::where('nama_pengunjung', $user->nama)->get();
            }
            // Jika level 1 atau 2 (admin atau pengelola), ambil semua data
            elseif (in_array($user->level, [1, 2])) {
                $dataPesananPengunjung = PemesananPaket::all();
            }
        }

        return view('dashboard.tabel_pesanan_pengunjung', compact('dataPesananPengunjung'));
    }

    // Fungsi untuk menampilkan semua detail
    public function DetailAkun($id)
    {
        $akun = Akun::find($id);
        if ($akun) {
            return view('detail.detail_akun', compact('akun'));
        } else {
            return redirect()->route('tabel_akun')->with('error', 'Akun tidak ditemukan.');
        }
    }

    public function DetailPesanan($id)
    {
        $pesanan = PemesananPaket::find($id);
        if ($pesanan) {
            return view('detail.detail_pesanan', compact('pesanan'));
        } else {
            return redirect()->route('dashboard.tabel_pesanan')->with('error', 'Pesanan tidak ditemukan.');
        }
    }


    // Fungsi untuk mengedit semua data


    // Fungsi untuk menghapus semua data
    public function deleteAkun($id)
    {
        $akun = Akun::find($id);
        if ($akun) {
            $akun->delete();
            return redirect()->route('tabel_akun')->with('success', 'Akun berhasil dihapus.');
        } else {
            return redirect()->route('tabel_akun')->with('error', 'Akun tidak ditemukan.');
        }
    }
    public function deletePesanan($id)
    {
        $pesanan = PemesananPaket::find($id);
        if ($pesanan) {
            $pesanan->delete();
            return redirect()->route('dashboard.tabel_pesanan')->with('success', 'Pesanan berhasil dihapus.');
        } else {
            return redirect()->route('dashboard.tabel_pesanan')->with('error', 'Pesanan tidak ditemukan.');
        }
    }

    // Show profile detail
    public function showProfile()
    {
        $authUser = auth('akun')->user();
        $user = Akun::find($authUser->id);
        return view('detail.detail_profile', compact('user'));
    }

    // Show edit profile form
    public function editProfile()
    {
        $authUser = auth('akun')->user();
        $user = Akun::find($authUser->id);
        return view('detail.edit_profile', compact('user'));
    }

    // Handle update profile request
    public function updateProfile(Request $request)
    {
        $user = auth('akun')->user();

        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:akun,email,' . $user->id,
            'no_hp' => 'nullable|string|max:20',
            'alamat' => 'nullable|string|max:255',
            'status' => 'nullable|string|max:50',
            'foto_profile' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('foto_profile')) {
            // Delete old photo if exists
            if ($user->foto_profile && \Storage::disk('public')->exists($user->foto_profile)) {
                \Storage::disk('public')->delete($user->foto_profile);
            }
            // Store new photo
            $path = $request->file('foto_profile')->store('profile_photos', 'public');
            $validatedData['foto_profile'] = $path;
        }

        $user->fill($validatedData);
        $user->save();

        return redirect()->route('profile')->with('success', 'Profile updated successfully.');
    }

    // Serve profile photo by user id
    public function getProfileFoto($id)
    {
        $user = Akun::find($id);
        if ($user && $user->foto_profile) {
            $path = storage_path('app/public/' . $user->foto_profile);
            if (file_exists($path)) {
                return response()->file($path);
            }
        }
        // Return default image if no photo found
        $defaultPath = public_path('assets/img/profile.jpg');
        return response()->file($defaultPath);
    }

    // Show add akun form
    public function createAkun()
    {
        return view('dashboard.form_akun');
    }

    // Store new akun
    public function storeAkun(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:akun,email',
            'username' => 'required|string|max:255|unique:akun,username',
            'password' => 'required|string|min:6|confirmed',
            'no_hp' => 'nullable|string|max:20',
            'alamat' => 'nullable|string|max:255',
            'status' => 'nullable|string|max:50',
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);

        Akun::create($validatedData);

        return redirect()->route('tabel_akun')->with('success', 'Akun berhasil ditambahkan.');
    }

    // Show edit akun form
    public function editAkun($id)
    {
        $akun = Akun::findOrFail($id);
        return view('dashboard.form_akun', compact('akun'));
    }

    // Update akun
    public function updateAkun(Request $request, $id)
    {
        $akun = Akun::findOrFail($id);

        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:akun,email,' . $akun->id,
            'username' => 'required|string|max:255|unique:akun,username,' . $akun->id,
            'password' => 'nullable|string|min:6|confirmed',
            'no_hp' => 'nullable|string|max:20',
            'alamat' => 'nullable|string|max:255',
            'status' => 'nullable|string|max:50',
        ]);

        if (!empty($validatedData['password'])) {
            $validatedData['password'] = bcrypt($validatedData['password']);
        } else {
            unset($validatedData['password']);
        }

        $akun->update($validatedData);

        return redirect()->route('tabel_akun')->with('success', 'Akun berhasil diperbarui.');
    }

    public function dashboard_admin(Request $request)
    {
        $monthYear = $request->query('month');

        if ($monthYear) {
            $dateParts = explode('-', $monthYear);
            if (count($dateParts) == 2) {
                $year = intval($dateParts[0]);
                $month = intval($dateParts[1]);
            } else {
                $year = Carbon::now()->year;
                $month = Carbon::now()->month;
            }
        } else {
            $year = Carbon::now()->year;
            $month = Carbon::now()->month;
        }

        // Menghitung Total Volume (Month to Date) dari tabel pemesanan_paket berdasarkan tanggal_kunjungan
        $totalVolume = PemesananPaket::whereYear(\DB::raw("STR_TO_DATE(tanggal_kunjungan, '%Y-%m-%d')"), $year)
            ->whereMonth(\DB::raw("STR_TO_DATE(tanggal_kunjungan, '%Y-%m-%d')"), $month)
            ->sum('total_harga');

        // Menghitung Total Transaksi (Month to Date) dari tabel pemesanan_paket berdasarkan tanggal_kunjungan
        $totalTransactions = PemesananPaket::whereYear(\DB::raw("STR_TO_DATE(tanggal_kunjungan, '%Y-%m-%d')"), $year)
            ->whereMonth(\DB::raw("STR_TO_DATE(tanggal_kunjungan, '%Y-%m-%d')"), $month)
            ->count();

        // Menghitung pendapatan pemesanan homestay per bulan berdasarkan check_in
        $pendapatanHomestay = PemesananHomestay::whereYear(\DB::raw("STR_TO_DATE(check_in, '%Y-%m-%d')"), $year)
            ->whereMonth(\DB::raw("STR_TO_DATE(check_in, '%Y-%m-%d')"), $month)
            ->sum('total_harga');

        // Menghitung pendapatan pemesanan paket per bulan berdasarkan tanggal_kunjungan
        $pendapatanPaket = PemesananPaket::whereYear(\DB::raw("STR_TO_DATE(tanggal_kunjungan, '%Y-%m-%d')"), $year)
            ->whereMonth(\DB::raw("STR_TO_DATE(tanggal_kunjungan, '%Y-%m-%d')"), $month)
            ->sum('total_harga');

        // Menghitung jumlah pengunjung homestay per bulan (count distinct nama_pengunjung) berdasarkan check_in
        $jumlahPengunjungHomestay = PemesananHomestay::whereYear(\DB::raw("STR_TO_DATE(check_in, '%Y-%m-%d')"), $year)
            ->whereMonth(\DB::raw("STR_TO_DATE(check_in, '%Y-%m-%d')"), $month)
            ->distinct('nama_pengunjung')
            ->count('nama_pengunjung');

        // Menghitung jumlah pengunjung paket per bulan (sum jumlah_pengunjung) berdasarkan tanggal_kunjungan
        $jumlahPengunjungPaket = PemesananPaket::whereYear(\DB::raw("STR_TO_DATE(tanggal_kunjungan, '%Y-%m-%d')"), $year)
            ->whereMonth(\DB::raw("STR_TO_DATE(tanggal_kunjungan, '%Y-%m-%d')"), $month)
            ->sum('jumlah_pengunjung');

        // Data untuk chart (Contoh: 7 hari terakhir)
        $transactionVolumeChart = PemesananPaket::selectRaw('DATE(updated_at) as date, SUM(total_harga) as volume')
            ->where('updated_at', '>=', Carbon::now()->subDays(7))
            ->groupBy('date')
            ->orderBy('date', 'ASC')
            ->get();

        return view('dashboard.dashboard_admin', [
            'totalVolume' => $totalVolume,
            'totalTransactions' => $totalTransactions,
            'pendapatanHomestay' => $pendapatanHomestay,
            'pendapatanPaket' => $pendapatanPaket,
            'jumlahPengunjungHomestay' => $jumlahPengunjungHomestay,
            'jumlahPengunjungPaket' => $jumlahPengunjungPaket,
            'chartData' => $transactionVolumeChart,
            'month' => $month,
            'year' => $year,
        ]);
    }
}
