<?php

namespace App\Http\Controllers;

use App\models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class SiswaController extends Controller
{
    public function getsiswa()
    {
        $dt_siswa = Siswa::get();
        return response()->json($dt_siswa);
    }
    public function updatesiswa(Request $req, $id)
    {
        $validator = Validator::make($req->All(), [
            'nama_siswa' => 'required',
            'tanggal_lahir' => 'required',
            'gender' => 'required',
            'alamat' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson());
        }
        $ubah=siswaModel::Where('id_siswa',$id)
        ->$update([
            'nama_siswa' =>$req->get('nama_siswa'),
            'tanggal_lahir' =>$req->get('tanggal_lahir'),
            'gender' =>$req->get('gender'),
            'alamat' =>$req->get('alamat'),
        ]);
        if ($ubah) {
            return response()->json(['status' => true, 'massage' => 'Berhasil Mengubah Siswa']);
        }else{
            return response()->json(['status' => true, 'massage' => 'Gagal Mengubah Siswa']);
        }
    }
    
    public function deletesiswa($id)
    {
    $hapus=siswaModel::Where('id_siswa',$id)->delete();
    if ($hapus) {
        return response()->json(['status' => true, 'massage' => 'Berhasil Menghapus Siswa']);
    }else{
        return response()->json(['status' => true, 'massage' => 'Gagal Menghapus Siswa']);
    }

}
}