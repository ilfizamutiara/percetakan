<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class satuan_produk extends Model
{
    protected $primaryKey = 'id_satuan_produk';
    protected $table = 'satuan_produk';
    protected $fillable = ['id_satuan_produk','satuan'];
    public $timestamps = false;
}
