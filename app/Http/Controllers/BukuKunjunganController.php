<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BukuKunjungan;
use App\Models\PemesananPaket;
use Illuminate\Support\Facades\Auth;

class BukuKunjunganController extends Controller
{
    public function index()
    {
        return view('buku_kunjungan');
    }

    public function create()
    {
        $user = auth('akun')->user();
        $pemesanan = null;
        if ($user) {
            $pemesanan = PemesananPaket::where('nama_pengunjung', $user->nama)
                ->orderBy('id_pesanan', 'desc')
                ->first();
        }
        return view('buku_kunjungan')->with('pemesanan', $pemesanan);
    }

    public function store(Request $request)
    {
        // Validasi input dari form dengan pesan kustom
        $request->validate([
            'nama_pengunjung' => 'required',
            'alamat' => 'required|string|max:255',
            'tanggal_kunjungan' => 'required|date',
            'jumlah_pengunjung' => 'required|integer|min:1|max:50',
            'kesan_pesan' => 'required|string|max:255',
        ], [
            // Pesan kustom untuk validasi field 'kesan_pesan'
            'kesan_pesan.required' => 'Kesan dan pesan harus diisi.',

            // Anda juga bisa menambahkan pesan kustom untuk field lain jika diperlukan
            'nama_pengunjung.required' => 'Nama pengunjung harus diisi.',
            'alamat.required' => 'Alamat harus diisi.',
            'tanggal_kunjungan.required' => 'Tanggal kunjungan harus diisi.',
            'jumlah_pengunjung.required' => 'Jumlah pengunjung harus diisi.',
            'jumlah_pengunjung.integer' => 'Jumlah pengunjung harus berupa angka.',
        ]);

        // Jika validasi berhasil, simpan data ke database
        BukuKunjungan::create($request->all());

        // Kembali ke halaman sebelumnya dengan pesan sukses
        return back()->with('success', 'Terima Kasih atas kunjungan Anda.');
    }

    public function edit($id)
    {
        $bukuKunjungan = BukuKunjungan::findOrFail($id);
        return view('buku_kunjungan', compact('bukuKunjungan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_pengunjung' => 'required',
            'alamat' => 'required|string|max:255',
            'tanggal_kunjungan' => 'required|date',
            'jumlah_pengunjung' => 'required|integer|min:1|max:50',
            'kesan_pesan' => 'required|string|max:255',
        ], [
            'kesan_pesan.required' => 'Kesan dan pesan harus diisi.',
            'nama_pengunjung.required' => 'Nama pengunjung harus diisi.',
            'alamat.required' => 'Alamat harus diisi.',
            'tanggal_kunjungan.required' => 'Tanggal kunjungan harus diisi.',
            'jumlah_pengunjung.required' => 'Jumlah pengunjung harus diisi.',
            'jumlah_pengunjung.integer' => 'Jumlah pengunjung harus berupa angka.',
        ]);

        $bukuKunjungan = BukuKunjungan::findOrFail($id);
        $bukuKunjungan->update($request->all());

        return redirect()->route('tabel_buku_kunjungan')->with('success', 'Data buku kunjungan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $bukuKunjungan = BukuKunjungan::findOrFail($id);
        $bukuKunjungan->delete();

        return redirect()->route('tabel_buku_kunjungan')->with('success', 'Data buku kunjungan berhasil dihapus.');
    }
}
