<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bahan extends Model
{
    protected $primaryKey = 'id_bahan';
    protected $table = 'bahan';
    protected $fillable = ['bahan'];
    public $timestamps = false;
}
