<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detail_peminjaman extends Model
{
    public $timestamps=null;
    protected $table="detail_peminjaman";
    protected $primarykey="id_detail";
    protected $fillable=['id_detail','id_peminjaman','tgl_pinjam','tgl_kembali'];
}
