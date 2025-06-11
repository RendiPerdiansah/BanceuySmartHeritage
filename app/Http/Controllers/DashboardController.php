<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Akun;
use App\Models\PemesananHomestay;
use App\Models\PemesananPaket;
use App\Models\BukuKunjungan;

class DashboardController extends Controller
{
    public function index()
    {
        return view('layout.v_dashboard_tamplate');
    }

    public function showTabelAkun()
    {
        $dataAkun = Akun::all(); 
        return view('dashboard.tabel_akun', compact('dataAkun'));
    }

    public function showTabelPesanan()
    {
        $dataPesanan = PemesananPaket::with('homestay')->get(); 
        return view('dashboard.tabel_pesanan', compact('dataPesanan'));
    }

    public function showTabelPesananHomestay()
    {
        $dataPesananHomestay = PemesananHomestay::all(); 
        return view('dashboard.tabel_pesanan_homestay', compact('dataPesananHomestay'));
    }

    public function showTabelBukuKunjungan()
    {
        $dataBukuKunjungan = BukuKunjungan::all(); 
        return view('dashboard.tabel_buku_kunjungan', compact('dataBukuKunjungan'));
    }

    public function showTabelPesananPengunjung()
    {
        $user = auth('akun')->user();
        $dataPesananPengunjung = [];
        if ($user && $user->no_hp) {
            $dataPesananPengunjung = PemesananPaket::where('no_hp', $user->no_hp)->get();
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
        $user = auth('akun')->user();
        return view('detail.detail_profile', compact('user'));
    }

    // Show edit profile form
    public function editProfile()
    {
        $user = auth('akun')->user();
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
            $file = $request->file('foto_profile');
            $imageData = base64_encode(file_get_contents($file->getRealPath()));
            $validatedData['foto_profile'] = $imageData;
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
}

