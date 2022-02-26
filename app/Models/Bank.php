<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_rek';
   protected $table = 'bank';
   protected $fillable = ['id_bank','nama_bank'];
   public $timestamps = false;
}
