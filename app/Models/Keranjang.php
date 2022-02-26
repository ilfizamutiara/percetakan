<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
   protected $primaryKey = 'id_keranjang';
   protected $table = 'keranjang';
   protected $fillable = ['id_produk','id_pelanggan','id_percetakan','jumlah','ukuran','dokumen','total','created_at'];
   public $timestamps = false;

   public function toko()
   {
      return $this->hasMany(percetakan::class);
   }
   public function produk()
   {
      return $this->hasMany(produk::class);
   }
}
