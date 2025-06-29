<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Homestay;

class C_Homestay extends Controller
{
    protected $M_Homestay;

    public function __construct()
    {
        $this->M_Homestay = new Homestay();
    }

    public function index()
    {
        $data = [
            'homestay' => Homestay::all(),
        ];
        return view('v_homestay', $data);
    }

    public function detail($id_homestay)
    {
        $homestay = Homestay::find($id_homestay);
        if (!$homestay) {
            abort(404);
        }
        return view('v_homestay2', compact('homestay'));
    }

    public function add()
    {
        return view('v_addhomestay');
    }

    public function insert()
    {
        Request()->validate([
            'nama_homestay' => 'required|unique:tb_homestay,nama_homestay|min:7|max:15',
            'harga_homestay' => 'required',
            'foto_homestay' => 'required|mimes:jpg,jpeg,png,bmp|max:1024',
            'deskripsi' => 'nullable|string',
            'fasilitas' => 'nullable|string',
        ], [ //ini adalah konversi keterangan validasi form NIP dalam bahasa indonesia
            'nama_homestay.required' => 'Nama Homestay wajib diisi !',
            'nama_homestay.unique' => 'Nama Homestay ini sudah terdaftar di database !',
            'nama_homestay.min' => 'Nama Homestay minimal 7 karakter',
            'nama_homestay.max' => 'Nama Homestay maksimal 15 karakter',
            'harga_homestay.required' => 'Harga homestay wajib di isi !',
            'foto_homestay.required' => 'Foto Homestay wajib di isi !',
        ]);
        //jika validasi tidak ada maka lakukan simpan data
        //upload gambar/foto
        $file = Request()->foto_homestay;
        $fileName = Request()->nama_homestay . '.' . $file->extension();
        $file->move(public_path('foto_homestay'), $fileName);

        $data = [
            'nama_homestay' => Request()->nama_homestay,
            'harga_homestay' => Request()->harga_homestay,
            'foto_homestay' => $fileName,
            'deskripsi' => Request()->deskripsi,
            'fasilitas' => Request()->fasilitas,
        ];
        Homestay::create($data);
        return Redirect()->route('homestay')->with('pesan', 'Data Berhasil Ditambahkan !');
    }

    public function edit($id_homestay)
    {
        $homestay = Homestay::find($id_homestay);
        if (!$homestay) {
            abort(404);
        }
        return view('v_edithomestay', compact('homestay'));
    }

    public function update($id_homestay)
    {
        Request()->validate([
            'nama_homestay' => 'required|min:7|max:15',
            'harga_homestay' => 'required',
            'foto_homestay' => 'mimes:jpg,jpeg,png,bmp|max:1024',
            'deskripsi' => 'nullable|string',
            'fasilitas' => 'nullable|string',
        ], [ //ini adalah konversi keterangan validasi form NIP dalam bahasa indonesia
            'nama_homestay.required' => 'Nama Homestay wajib diisi !',
            'nama_homestay.min' => 'Nama Homestay minimal 7 karakter',
            'nama_homestay.max' => 'Nama Homestay maksimal 15 karakter',
            'harga_homestay.required' => 'Harga Homestay wajib di isi !',

        ]);
        //jika validasi tidak ada maka lakukan simpan data
        if (Request()->foto_homestay <> "") {
            //jika ganti gambar/foto
            $file = Request()->foto_homestay;
            $fileName = Request()->nama_homestay . '.' . $file->extension();
            $file->move(public_path('foto_homestay'), $fileName);

            $data = [

                'nama_homestay' => Request()->nama_homestay,
                'harga_homestay' => Request()->harga_homestay,
                'foto_homestay' => $fileName,
                'deskripsi' => Request()->deskripsi,
                'fasilitas' => Request()->fasilitas,
            ];
            Homestay::where('id_homestay', $id_homestay)->update($data);
        } else {
            //jika tidak ganti gambar/foto
            $data = [
                'nama_homestay' => Request()->nama_homestay,
                'harga_homestay' => Request()->harga_homestay,
                'deskripsi' => Request()->deskripsi,
                'fasilitas' => Request()->fasilitas,
            ];
            Homestay::where('id_homestay', $id_homestay)->update($data);
        }
        return redirect()->route('homestay')->with('pesan', 'Data Berhasil Diubah !');
    }

    public function delete($id_homestay)
    {
        //hapus atau delete foto
        $homestay = $this->M_Homestay->find($id_homestay);
        if ($homestay && $homestay->foto_homestay != "") {
            unlink(public_path('foto_homestay') . '/' . $homestay->foto_homestay);
        }
        if ($homestay) {
            $homestay->delete();
        }
        return redirect()->route('homestay')->with('pesan', 'Data Berhasil Dihapus !');
    }

   
}
