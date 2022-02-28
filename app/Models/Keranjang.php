<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
   protected $primaryKey = 'id_keranjang';
   protected $table = 'keranjang';
   protected $fillable = ['id_keranjang','id_produk','id_pelanggan','id_percetakan','jumlah','ukuran','dokumen','total','created_at'];
   public $timestamps = false;

}
