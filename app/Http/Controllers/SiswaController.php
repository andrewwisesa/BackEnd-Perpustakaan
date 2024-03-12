<?php

namespace App\Http\Controllers;

use App\models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class SiswaController extends Controller
{
    public function getallsiswa()
    {
        $dt_siswa=Siswa::
        join('kelas','siswa.id_kelas','=','kelas.id_kelas')
        ->get();
        return response()->json($dt_siswa);
    }
    public function createsiswa(Request $req)
    {
        $validator = Validator::make($req->All(), [
            'nama_siswa' => 'required',
            'tanggal_lahir' => 'required',
            'gender' => 'required',
            'alamat' => 'required',
            // 'id_kelas' => 'required',
            
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson());
        }
        $save = Siswa::create([
            'nama_siswa'    => $req->get('nama_siswa'),
            'tanggal_lahir' => $req->get('tanggal_lahir'),
            'gender'        => $req->get('gender'),
            'alamat'        => $req->get('alamat'),
            'id_kelas'      => $req->get('id_kelas'),

        ]);
        if ($save) {
            return response()->json(['status' => true, 'massage' => 'Berhasil Menambahkan Siswa']);
        }else{
            return response()->json(['status' => true, 'massage' => 'Gagal Menambahkan Siswa']);
        }
    }

public function updatesiswa(Request $req, $id)
    {
        $validator = Validator::make($req->All(), [
            'nama_siswa' => 'required',
            'tanggal_lahir' => 'required',
            'gender' => 'required',
            'alamat' => 'required',
            'id_kelas' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson());
        }
        $ubah=Siswa::where('id',$id)->update([
            'nama_siswa' =>$req->get('nama_siswa'),
            'tanggal_lahir' =>$req->get('tanggal_lahir'),
            'gender' =>$req->get('gender'),
            'alamat' =>$req->get('alamat'),
            'id_kelas' => $req->get('id_kelas'),
        ]);
        if ($ubah) {
            return response()->json(['status' => true, 'massage' => 'Berhasil Mengubah Siswa']);
        }else{
            return response()->json(['status' => true, 'massage' => 'Gagal Mengubah Siswa']);
        }
    }
    public function deletesiswa($id)
    {
    $hapus=Siswa::Where('id',$id)->delete();
    if ($hapus) {
        return response()->json(['status' => true, 'massage' => 'Berhasil Menghapus Siswa']);
    }else{
        return response()->json(['status' => true, 'massage' => 'Gagal Menghapus Siswa']);
    }

}
public function getsiswa(Request $req, $id)
    {
        $data_siswa=Siswa::where('id','=',$id)
        ->get();
        return response()->json($data_siswa);
    }
}

