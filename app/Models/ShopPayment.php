<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class ShopPayment extends Model
{
    // use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'shop_payment';
    protected $fillable = ['id','id_percetakan','no_rek_penerima','no_rek_pengirim','jml_transfer','bukti_transfer','status','created_at'];
    
    public function akunbank(){
        return $this->belongsTo('App\Models\AkunBank');
    }
}
