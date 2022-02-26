<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\produk;
use App\Http\Resources\ProdukResource;

class ProdukController extends Controller
{
    public function getAll()
    {
        return ProdukResource::collection( produk::all());
    }
}
