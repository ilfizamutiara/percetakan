<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class toko extends Model
{
    //use HasFactory;
    protected $primaryKey = 'id_toko';
    protected $table = 'toko';
    protected $fillable = ['id_user','nama_toko','alamat_toko','deskripsi_toko'];
    public $timestamps = false;
}
