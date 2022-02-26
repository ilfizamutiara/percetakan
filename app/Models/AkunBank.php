<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AkunBank extends Model
{
   protected $primaryKey = 'id_rek';
   protected $table = 'rekening';
   protected $fillable = ['id_user','id_bank','no_rek','nama_pemilik'];
   public $timestamps = false;
}
