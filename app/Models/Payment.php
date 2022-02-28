<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $primaryKey = 'id_konfirmasi';
    protected $table = 'konfirmasi_pembayaran';
    protected $fillable = ['id_konfirmasi','id_pesanan','total_tagihan','bukti_bayar'];
    public $timestamps = false;
}
