<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paket;

class C_Paket extends Controller
{
    protected $M_Paket;

    public function __construct()
    {
        $this->M_Paket = new Paket(); 
        
    }

    public function index()
    {
        $data = [
            'paket' => Paket::all(),
        ];
        return view('v_paket', $data);
    }

    public function detail($id)
    {
        $paket = Paket::find($id);
        if (!$paket) {
            abort(404);
        }
        return view('v_paket_detail', compact('paket'));
    }

    public function add()
    {
        return view('v_addpaket');
    }

    public function insert()
    {
        Request()->validate([
            'nama_paket' => 'required|unique:paket,nama_paket|min:7|max:255',
            'harga_paket' => 'required|integer',
            'foto_paket' => 'required|mimes:jpg,jpeg,png,bmp|max:1024',
            'deskripsi_paket' => 'nullable|string',
        ], [
            'nama_paket.required' => 'Nama Paket wajib diisi !',
            'nama_paket.unique' => 'Nama Paket ini sudah terdaftar di database !',
            'nama_paket.min' => 'Nama Paket minimal 7 karakter',
            'nama_paket.max' => 'Nama Paket maksimal 255 karakter',
            'harga_paket.required' => 'Harga Paket wajib di isi !',
            'foto_paket.required' => 'Foto Paket wajib di isi !',
        ]);

        $file = Request()->foto_paket;
        $fileName = Request()->nama_paket . '.' . $file->extension();
        $file->move(public_path('foto_paket'), $fileName);

        $data = [
            'nama_paket' => Request()->nama_paket,
            'harga_paket' => Request()->harga_paket,
            'foto_paket' => $fileName,
            'deskripsi_paket' => Request()->deskripsi_paket,
        ];
        Paket::create($data);
        return redirect()->route('paket')->with('pesan', 'Data Berhasil Ditambahkan !');
    }

    public function edit($id)
    {
        $paket = Paket::find($id);
        if (!$paket) {
            abort(404);
        }
        return view('v_editpaket', compact('paket'));
    }

    public function update($id)
    {
        Request()->validate([
            'nama_paket' => 'required|min:7|max:255',
            'harga_paket' => 'required|integer',
            'foto_paket' => 'mimes:jpg,jpeg,png,bmp|max:1024',
            'deskripsi_paket' => 'nullable|string',
        ], [
            'nama_paket.required' => 'Nama Paket wajib diisi !',
            'nama_paket.min' => 'Nama Paket minimal 7 karakter',
            'nama_paket.max' => 'Nama Paket maksimal 255 karakter',
            'harga_paket.required' => 'Harga Paket wajib di isi !',
        ]);

        if (Request()->foto_paket <> "") {
            $file = Request()->foto_paket;
            $fileName = Request()->nama_paket . '.' . $file->extension();
            $file->move(public_path('foto_paket'), $fileName);

            $data = [
                'nama_paket' => Request()->nama_paket,
                'harga_paket' => Request()->harga_paket,
                'foto_paket' => $fileName,
                'deskripsi_paket' => Request()->deskripsi_paket,
            ];
            Paket::where('id', $id)->update($data);
        } else {
            $data = [
                'nama_paket' => Request()->nama_paket,
                'harga_paket' => Request()->harga_paket,
                'deskripsi_paket' => Request()->deskripsi_paket,
            ];
            Paket::where('id', $id)->update($data);
        }
        return redirect()->route('paket')->with('pesan', 'Data Berhasil Diubah !');
    }

    public function delete($id)
    {
        $paket = $this->M_Paket->find($id);
        if ($paket && $paket->foto_paket <> "") {
            unlink(public_path('foto_paket') . '/' . $paket->foto_paket);
        }
        Paket::destroy($id);
        return redirect()->route('paket')->with('pesan', 'Data Berhasil Dihapus !');
    }
}
