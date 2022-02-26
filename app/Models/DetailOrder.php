<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailOrder extends Model
{
   public $increment = false;
   protected $primaryKey = 'id';
   protected $table = 'detail_pesanan';
   protected $fillable = ['id_pesanan','id_produk','id_percetakan','jumlah','ukuran','dokumen','created_at'];
   public $timestamps = false;
}
