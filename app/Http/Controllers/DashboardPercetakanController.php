<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailOrder;
use App\Models\Order;
use App\Models\Percetakan;
use App\Models\Pelanggan;
use Auth;


class DashboardPercetakanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $percetakan = Percetakan::all()
                        ->count();
        $pelanggan = Pelanggan::all()
                        ->count();
        $pesanan = DetailOrder::select('detail_pesanan.id_pesanan','detail_pesanan.id_percetakan',
                                'pesanan.tgl_pesan','pesanan.nama','pesanan.alamat','pesanan.no_hp','detail_pesanan_nama_produk','status_pesanan.status')
                              ->join('percetakan','detail_pesanan.id_percetakan','percetakan.id_percetakan')
                              ->join('users','percetakan.id_user','users.id')
                              ->join('pesanan','detail_pesanan.id_pesanan','pesanan.id_pesanan')
                              ->join('status_pesanan','pesanan.id_status_pesanan','=','status_pesanan.id')
                              ->join('produk','detail_pesanan.id_produk','=','produk.id_produk')
                              ->where('percetakan.id_user','=', Auth::User()->id)
                            ->count();
        // $pelanggan = Order::select('id_pelanggan')
        //                     ->join('percetakan','detail_pesanan.id_percetakan','percetakan.id_percetakan')
        //                     ->join('users','percetakan.id_user','users.id')
        //                     ->where('percetakan.id_user','=', Auth::User()->id)
        //                 ->count();
        return view('dashboardPercetakan',compact('pesanan','percetakan','pelanggan'));
    }

    public function Addfoto(){
        $foto = Percetakan::select('id_percetakan','foto')
                            ->get();
        return view('layouts.admin',compact('foto'));
    }

}
