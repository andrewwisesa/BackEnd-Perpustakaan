<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    public $timestamps=null;
    protected $table="buku";
    protected $primarykey="id_buku";
    protected $fillable=['judul_buku','penggarang'];
}
