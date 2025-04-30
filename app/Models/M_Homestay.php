<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class M_Homestay extends Model
{
    public function alldata()
    {
        return DB::table('tb_homestay')->get();
    }

    public function detaildata($id_homestay)
    {
        return DB::table('tb_homestay')->where('id_homestay', $id_homestay)->first();
    }

    public function addData($data)
    {
        DB::table('tb_homestay')->insert($data);
    }

    public function editData($id_homestay, $data)
    {
        DB::table('tb_homestay')->where('id_homestay', $id_homestay)->update($data);
    }

    public function deleteData($id_homestay)
    {
        DB::table('tb_homestay')->where('id_homestay', $id_homestay)->delete();
    } 
}
