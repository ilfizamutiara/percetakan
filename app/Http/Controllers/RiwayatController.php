<?php

namespace App\Http\Controllers;
use App\Models\DetailOrder;
use App\Models\Order;
use App\Models\produk;
use Auth;

use Illuminate\Http\Request;

class RiwayatController extends Controller
{
    public function index()
    {
        $pesanan = Order::select('id_pesanan','nama_toko','users.foto','pesanan.nama','id_status_pesanan','total_bayar',
                                'pesanan.alamat','pesanan.no_hp','status_pesanan.status','pesanan.created_at')
                                ->join('pelanggan','pesanan.id_pelanggan','=','pelanggan.id_pelanggan')
                                ->join('percetakan','pesanan.id_percetakan','percetakan.id_percetakan')
                                ->join('users','pelanggan.id_user','users.id')                      
                                ->join('status_pesanan','pesanan.id_status_pesanan','=','status_pesanan.id')
                                ->orderBy('pesanan.created_at','desc')
                                ->where('pelanggan.id_user',Auth::user()->id)
                                ->get();
        $order = Order::select('id_pesanan','nama_toko','users.foto','pesanan.nama','id_status_pesanan','total_bayar',
                                'pesanan.alamat','pesanan.no_hp','status_pesanan.status','pesanan.created_at')
                                ->join('pelanggan','pesanan.id_pelanggan','=','pelanggan.id_pelanggan')
                                ->join('percetakan','pesanan.id_percetakan','percetakan.id_percetakan')
                                ->join('users','pelanggan.id_user','users.id')                      
                                ->join('status_pesanan','pesanan.id_status_pesanan','=','status_pesanan.id')
                                ->orderBy('pesanan.created_at','desc')
                                ->where('pelanggan.id_user',Auth::user()->id)
                                ->first();

        return view('user/riwayat',compact('pesanan','order'));
    }

    public function detailpesanan($id_pesanan)
    {
        $pesan = Order::findOrFail($id_pesanan);
        $pesanan = Order::select('pesanan.id_pesanan','pesanan.nama','id_status_pesanan','total_harga','ongkir','nama_toko',
                              'total_bayar','detail_pesanan.id_percetakan','pesanan.alamat','pesanan.id_city','city_name','name','pesanan.id_province','pajak','users.email','pesanan.kode_pos',
                              'pesanan.no_hp','status_pesanan.status','pesanan.created_at')
                              ->join('pelanggan','pesanan.id_pelanggan','pelanggan.id_pelanggan')
                              ->join('kota','pesanan.id_city','kota.id_city')
                              ->join('province','kota.id_province','province.id_province')
                              ->join('detail_pesanan','pesanan.id_pesanan','detail_pesanan.id_pesanan')
                              ->join('percetakan','detail_pesanan.id_percetakan','percetakan.id_percetakan')
                              ->join('users','pelanggan.id_user','users.id')
                              ->join('status_pesanan','pesanan.id_status_pesanan','=','status_pesanan.id')
                              ->where('pesanan.id_pesanan',$id_pesanan)
                              ->first();
        $detail = DetailOrder::select('detail_pesanan.id_pesanan','detail_pesanan.id_percetakan','nama_produk','detail_pesanan.id_produk','nama_toko','gambar','jumlah','ukuran','harga','total_harga')
                                ->join('pesanan','detail_pesanan.id_pesanan','pesanan.id_pesanan')
                                ->join('percetakan','detail_pesanan.id_percetakan','percetakan.id_percetakan')
                                ->join('produk','detail_pesanan.id_produk','produk.id_produk')
                                ->where('detail_pesanan.id_pesanan',$id_pesanan)
                                ->get();
        return view('user.detailpesanan',compact('detail','pesanan'));
    }

    public function updatePesananDiterima(Request $request, $id_pesanan){
        $pesan = Order::findOrFail($id_pesanan);
        $pesanan = Order::where('id_pesanan',$id_pesanan)->update([
            'id_status_pesanan' => "5",
        ]);

        return redirect('user/riwayat');

    }
    public function updatePesananDibatalkan(Request $request, $id_pesanan){
        $pesan = Order::findOrFail($id_pesanan);
        $pesanan = Order::where('id_pesanan',$id_pesanan)->update([
            'id_status_pesanan' => "6",
        ]);

        return redirect('user/riwayat');

    }
}
