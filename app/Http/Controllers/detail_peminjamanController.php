<?php
namespace App\Http\Controllers;
use App\Models\detail_peminjaman;
use App\Models\peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class detail_peminjamanController extends Controller
{
    public function getdetail_peminjaman()
    {
        $dt_Detail_peminjaman=peminjaman::select('nama_siswa','nama_kelas','judul_buku','tgl_pinjam','tgl_kembali')
        ->join('siswa','siswa.id','=','peminjaman.id_siswa')
        ->join('kelas','kelas.id','=','peminjaman.id_kelas')
        ->join('buku','buku.id_buku','=','peminjaman.id_buku')
        ->join('detail_peminjaman','detail_peminjaman.id_detail','=','detail_peminjaman.id_detail')
        ->get();
        return response()->json($dt_Detail_peminjaman);
        
        // return view('welcome');
    }
    public function createdetail_peminjaman(Request $req)
    {
        $validator = Validator::make($req->all(),[
            
            
            'id_peminjaman'=>'required',
            'tgl_pinjam'=>'required',
            'tgl_kembali'=>'required',
            
   ]);
   if($validator->fails()){
    return Response()->json($validator->errors()->toJson());
    
   }
   $save = detail_peminjaman::create([
    'id_peminjaman' =>$req->get('id_peminjaman'),
    'tgl_pinjam' =>$req->get('tgl_pinjam'),
    'tgl_kembali' =>$req->get('tgl_kembali'),
    
   ]);
   if($save){
    return Response()->json(['status'=>true, 'message' =>'Sukses Menambah Detail']);
   } else {
    return Response()->json(['status'=>false, 'message' =>'Gagal Menambah Detail']);
   
    }
}


    public function updatedetail_peminjaman(Request $req, $id)
    {
        $validator = Validator::make($req->all(),[
            'id_peminjaman'=>'required',
            'tgl_pinjam'=>'required',
            'tgl_kembali'=>'required',

            
   ]);
   if($validator->fails()){
    return Response()->json($validator->errors()->toJson());
    
   }
   $ubah = detail_peminjaman::where('id_detail',$id)->update([
    'tgl_pinjam' =>$req->get('tgl_pinjam'),
    'tgl_kembali' =>$req->get('tgl_kembali'),
    
   ]);
   if($ubah){
    return Response()->json(['status'=>true, 'message' =>'Sukses Update Detail']);
   } else {
    return Response()->json(['status'=>false, 'message' =>'Gagal Update Detail']);
   
    }
}

public function deletedetail($id)
{
    $hapus=Detail_peminjaman::where('id_detail',$id)->delete();
    if($hapus){
        return Response()->json(['status'=>true, 'message' =>'Sukses Delete Detail']);
   } else {
    return Response()->json(['status'=>false, 'message' =>'Gagal Delete Detail']);
   
    }
    }
}