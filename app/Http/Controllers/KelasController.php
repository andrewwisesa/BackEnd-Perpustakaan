<?php

namespace App\Http\Controllers;

use App\models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class KelasController extends Controller
{
    public function getkelas()
    {
        $dt_kelas = Kelas::get();
        return response()->json($dt_kelas);
    }
    public function createkelas(Request $req)
    {
        $validator = Validator::make($req->All(), [
            'nama_kelas' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson());
        }
        $save = Kelas::create([
            'nama_kelas' => $req->get('nama_kelas'),

        ]);
        if ($save) {
            return response()->json(['status' => true, 'massage' => 'Berhasil Menambahkan Siswa']);
        }else{
            return response()->json(['status' => true, 'massage' => 'Gagal Menambahkan Siswa']);
        }
    }
}