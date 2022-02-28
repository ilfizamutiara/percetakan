<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'delivery';
    protected $fillable = ['id','id_pesanan','id_percetakan','no_resi'];
    public $timestamps = false;
}
