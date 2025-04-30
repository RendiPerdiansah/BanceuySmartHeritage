<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Homestay; // Pastikan model ini ada

class HomestayController extends Controller
{
    // Menampilkan daftar homestay
    public function index()
    {
        $homestays = Homestay::all(); // Ambil semua data homestay
        return view('homestay', compact('homestays'));
    }

    // Menampilkan detail homestay berdasarkan ID
    public function show($id)
    {
        $homestay = Homestay::findOrFail($id); // Menggunakan findOrFail untuk menangani jika tidak ditemukan
        return view('homestay_detail', compact('homestay'));
    }
}
