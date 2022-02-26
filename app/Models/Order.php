<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
   public $increment = false;
   protected $primaryKey = 'id_pesanan';
   protected $table = 'pesanan';
   protected $fillable = ['id_pesanan','id_status_pesanan','id_percetakan','id_pelanggan','tgl_pesan','id_city','id_province',
                        'nama','no_hp','alamat','kode_pos','total_harga','pajak','ongkir','total_bayar','metode_pembayaran','kurir','created_at'];
   public $timestamps = false;
}
