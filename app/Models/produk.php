<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    //use HasFactory;
    protected $primaryKey = 'id_produk';
    protected $table = 'produk';
    protected $fillable = ['id_percetakan','id_bahan','nama_produk','id_kategori','id_satuan_produk','harga','stok','berat','keterangan','estimasi_pengerjaan','gambar'];
    public $timestamps = false;
}
