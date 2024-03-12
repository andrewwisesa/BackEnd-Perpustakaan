<?php

namespace App\Http\Controllers;

use App\models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class BukuController extends Controller
{
    public function getsemuabuku()
    {
        $dt_buku = Buku::get();
        return response()->json($dt_buku);
    }
    public function getbuku($id)
    {
        $dt_buku = buku::
        where('id_buku','=',$id)
        ->get();
        return response()->json($dt_buku);
    }
    public function createbuku(Request $req)
    {
        $validator = Validator::make($req->All(), [
            'judul_buku' => 'required',
            'penggarang'=> 'required',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson());
        }
        $save = Buku::create([
            'judul_buku' => $req->get('judul_buku'),
            'penggarang'=> $req->get('penggarang'),
        ]);
        if ($save) {
            return response()->json(['status' => true, 'massage' => 'Berhasil Menambahkan buku']);
        }else{
            return response()->json(['status' => true, 'massage' => 'Gagal Menambahkan buku']);
        }
    }
    public function updatebuku(Request $req, $id)
    {
        $validator = Validator::make($req->All(), [
            'judul_buku' => 'required',
            'penggarang' => 'required',
            
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson());
        }
        $ubah=buku::where('id_buku',$id)->update([
            'judul_buku' =>$req->get('judul_buku'),
            'penggarang' =>$req->get('penggarang'),
           
        ]);
        if ($ubah) {
            return response()->json(['status' => true, 'massage' => 'Berhasil Mengubah buku']);
        }else{
            return response()->json(['status' => true, 'massage' => 'Gagal Mengubah Siswa']);
        }
    }
    public function deletebuku($id)
    {
    $hapus=buku::where('id_buku',$id)->delete();
    if ($hapus) {
        return response()->json(['status' => true, 'massage' => 'Berhasil Menghapus Buku']);
    }else{
        return response()->json(['status' => true, 'massage' => 'Gagal Menghapus Buku']);
    }

}
}