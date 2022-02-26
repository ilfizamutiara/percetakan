<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusOrder extends Model
{
    protected $primaryKey = 'id_status_pesanan';
    protected $table = 'status_pesanan';
    protected $fillable = ['id_status_pesanan','status'];
    public $timestamps = false;
}
