<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProdukResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id_produk'=>$this->id_produk,
            'id_user'=>$this->id_user,
            'nama_produk'=>$this->nama_produk,
            'harga'=>$this->harga,
            'deskripsi'=>$this->deskripsi,
            'foto'=>$this->foto
        ];
    }
}
