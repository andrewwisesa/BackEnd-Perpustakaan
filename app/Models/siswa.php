<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    public $timestamps=null;
    protected $table="siswa";
    protected $primarykey="id";
    protected $fillable=['nama_siswa','tanggal_lahir','gender','alamat','id_kelas'];
}
