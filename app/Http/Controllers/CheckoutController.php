<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pelanggan;
use App\Models\User;
use App\Models\province;
use App\Models\Keranjang;
use App\Models\produk;
use App\Models\city;
use Auth;

class CheckoutController extends Controller
{
    public function index(Request $request){

        $pelanggan = pelanggan::select('id_pelanggan','nama','no_hp','alamat')
            ->where('id_user',Auth::User()->id)
            ->first(); 
        $user = User::select('users.id','users.id_city','users.id_province','kota.city_name','province.name','kode_pos')
            ->join('kota','users.id_city','kota.id_city')
            ->join('province','kota.id_province','province.id_province')
            ->where('users.id',Auth::User()->id)
            ->first();
        $produk = produk::all();
        $keranjang = Keranjang::select('id_keranjang','pelanggan.id_pelanggan','keranjang.id_percetakan','keranjang.id_produk',
                                'percetakan.nama_toko','produk.gambar','produk.nama_produk','produk.harga','jumlah','ukuran','total')
                                ->join('produk','keranjang.id_produk','produk.id_produk')
                                ->join('percetakan','keranjang.id_percetakan','percetakan.id_percetakan')
                                ->join('pelanggan','keranjang.id_pelanggan','pelanggan.id_pelanggan')
                                ->join('users','pelanggan.id_user','users.id')
                                ->where('pelanggan.id_user', '=', Auth::user()->id)
                                ->orderBy('nama_toko','asc')
                                ->get();
        $province = Province::all();
        $city = City::all()->where('id_province');

        return view('checkout.index',compact('pelanggan','user','province','city','produk','keranjang'));

    }
    public function update(Request $request){

        $user = User::where('id',Auth::user()->id)->update([
            'id_province' => $request->id_province,
            'id_city' => $request->id_city,
            'kode_pos' => $request->kode_pos,
        ]);
        $pelanggan = pelanggan::where('id_user',Auth::user()->id)->update([
                    'nama' => $request->nama,
                    'alamat' => $request->alamat,
                    'no_hp' => $request->no_hp,
                    // 'foto' => $fileName,
        ]);
        // return $user;
        return redirect('/checkout/pengiriman');
    }
}
