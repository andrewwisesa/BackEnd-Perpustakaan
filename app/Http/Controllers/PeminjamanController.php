<?php

namespace App\Http\Controllers;

use App\models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Date;

class PeminjamanController extends Controller
{
    public function getsemuaPeminjaman($id)
    {
        $dt_peminjaman=peminjaman::where ('id_peminjaman',$id)
        ->select('nama_siswa','nama_kelas','judul_buku')
        ->join('siswa','siswa.id','=','peminjaman.id_siswa')
        ->join('kelas','kelas.id','=','peminjaman.id_kelas')
        ->join('buku','buku.id_buku','=','peminjaman.id_buku')
        ->get();
        return response()->json($dt_peminjaman);
        
        // return view('welcome');
    }
    public function getPeminjaman()
    {
        $dt_peminjaman=peminjaman::
        // ->select('nama_siswa','nama_kelas','judul_buku')
        join('siswa','siswa.id','=','peminjaman.id_siswa')
        ->join('kelas','kelas.id_kelas','=','peminjaman.id_kelas')
        ->join('buku','buku.id_buku','=','peminjaman.id_buku')
        ->orderBy('id_peminjaman','desc')
        ->get();
        return response()->json($dt_peminjaman);
        
        // return view('welcome');
    }
    public function createpeminjaman(Request $req)
    {
        $validator = Validator::make($req->All(), [
            'id_siswa' => 'required',
            'id_kelas' => 'required',
            'id_buku' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson());
        }
        $save = Peminjaman::create([
            'id_siswa' => $req->get('id_siswa'),
            'id_kelas' => $req->get('id_kelas'),
            'id_buku' => $req->get('id_buku'),
            'tgl_pinjam' =>Date::now(),
            'tgl_kembali' =>Date::now()->addDays(5),
            'status'=>'dipinjam',

        ]);
        if ($save) {
            return response()->json(['status' => true, 'massage' => 'Berhasil Menambahkan peminjaman']);
        }else{
            return response()->json(['status' => true, 'massage' => 'Gagal Menambahkan peminjaman']);
        }
    }

    public function updatepeminjaman( $id)
    {
        
        $ubah = Peminjaman::where('id_peminjaman',$id)
        ->update([
            
            'status'=>'kembali',

        ]);
        if ($ubah) {
            return response()->json(['status' => true, 'massage' => 'Berhasil Menambahkan peminjaman']);
        }else{
            return response()->json(['status' => true, 'massage' => 'Gagal Menambahkan peminjaman']);
        }
    }

    public function kembalipeminjaman($id){
        $kembali= peminjaman::where('id_peminjaman',$id)
        ->update([
            'status' => 'kembali'
        ]);
        if($kembali) {
            return Response()->json(['status'=>true, 'message' => 'sukses']);
        }
        else {
            return Response()->json(['status'=>false, 'message' => 'gagal']);
        }
        }
        public function deletepeminjaman($id)
    {
    $hapus=peminjaman::where('id_peminjaman',$id)->delete();
    if ($hapus) {
        return response()->json(['status' => true, 'massage' => 'Berhasil Menghapus peminjaman']);
    }else{
        return response()->json(['status' => true, 'massage' => 'Gagal Menghapus peminjaman']);
    }

}
}