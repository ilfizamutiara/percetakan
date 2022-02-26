<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailProduk extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'detail_produk';
    protected $fillable = ['id_produk','jumlah','ukuran','file'];
    public $timestamps = false;
}
