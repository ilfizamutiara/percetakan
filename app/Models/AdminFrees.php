<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminFrees extends Model
{
    use HasFactory;
    protected $table = 'admin_frees';
    protected $fillable = ['id','persentase'];
    public $timestamps = false;
}
