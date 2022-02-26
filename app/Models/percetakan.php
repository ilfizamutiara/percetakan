<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Percetakan extends Model
{
   // use HasFactory;
   protected $primaryKey = 'id_percetakan';
   protected $table = 'percetakan';
   protected $fillable = ['id_user','nama_toko','alamat_toko','no_telp','foto'];
   public $timestamps = false;
}
