<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'id_upload';
    protected $table = 'uploads';
    protected $fillable = ['id_keranjang','name_file','extension'];
    public $timestamps = false;
}
