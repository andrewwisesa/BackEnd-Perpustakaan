<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    public $timestamps=null;
    protected $table="peminjaman";
    protected $primarykey="id_peminjaman";
    protected $fillable=['id_peminjaman','id_siswa','id_kelas','id_buku','tgl_pinjam','tgl_kembali','status'];
}
