<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Akun;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AkunAuthController extends Controller
{
    // REGISTER
    public function register(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'username' => 'required|string|unique:akun,username',
            'no_hp' => 'required|string|max:20',
            'email' => 'required|string|email|unique:akun,email',
            'alamat' => 'required|string|max:255',
            'password' => 'required|string|min:6|confirmed',
            
        ]);

        $email = $request->email;
        $status = 'pengunjung'; // default status

        if (str_ends_with($email, '@admin.com')) {
            $status = 'admin';
        } elseif (str_ends_with($email, '@pengelola.com')) {
            $status = 'pengelola';
        } elseif (str_ends_with($email, '@pengunjung.com')) {
            $status = 'pengunjung';
        }

        $level = 3; // default level pengunjung
        if ($status === 'admin') {
            $level = 1;
        } elseif ($status === 'pengelola') {
            $level = 2;
        } elseif ($status === 'pengunjung') {
            $level = 3;
        }

        Akun::create([
            'nama' => $request->nama,
            'username' => $request->username,
            'no_hp' => $request->no_hp,
            'email' => $email,
            'alamat' => $request->alamat,
            'status' => $status,
            'password' => Hash::make($request->password),
            'level' => $level,
        ]);

        return redirect()->route('login')->with('success', 'Akun berhasil dibuat, silakan login.');
    }

    // LOGIN
    public function login(Request $request)
    {
        if (Auth::guard('akun')->attempt($request->only('username', 'password'))) {
            $user = Auth::guard('akun')->user();
            return redirect()->to($this->redirectByLevel($user->level));
        }

        return back()->withInput()->with('message', 'Login gagal! Username atau password salah.');
    }

    // LOGOUT
    public function logout(Request $request)
    {
        Auth::guard('akun')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Logout berhasil!');
    }

    public function showLoginForm()
{
    return view('login'); // sesuai dengan nama file view kamu
}

private function redirectByLevel($level) {
    switch ($level) {
        case 1:
            return '/admin';
        case 2:
            return '/pengelola_homestay';
        case 3:
            return '/pengunjung';
        default:
            return '/pengunjung';
    }
}

    

}


