<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pelanggan extends Model
{
    //use HasFactory;
    protected $primaryKey = 'id_pelanggan';
   protected $table = 'pelanggan';
   protected $fillable = ['id_user','nama','jenis_kelamin','alamat','no_hp','foto'];
   public $timestamps = false;
}
