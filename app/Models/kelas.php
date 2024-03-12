<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    public $timestamps=null;
    protected $table="kelas";
    protected $primarykey="id";
    protected $fillable=['nama_kelas'];
}
