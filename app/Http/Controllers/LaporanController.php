<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailOrder;
use App\Models\Order;
use App\Models\ShopPayment;

use Auth;
use PDF;
use DB;

class LaporanController extends Controller
{
    public function laporanPenjualan(Request $request)
    {
        date_default_timezone_set("Asia/Jakarta");

        $tgl1 = $request->tgl1;
        $tgl2 = $request->tgl2;

        $pesanan = Order::select('pesanan.tgl_pesan','pesanan.id_percetakan','pesanan.id_pesanan',
                    'ongkir','total_harga','id_status_pesanan')
                    ->join('percetakan','pesanan.id_percetakan','percetakan.id_percetakan')
                    ->where('id_user',Auth::User()->id)
                    ->where('id_status_pesanan',5)
                    ->whereBetween('pesanan.tgl_pesan', [$tgl1, $tgl2])
                    ->paginate(10); 
        $detail = DetailOrder::select('id_produk','jumlah','id_status_pesanan')
                    ->join('percetakan','detail_pesanan.id_percetakan','percetakan.id_percetakan')
                    ->join('pesanan','detail_pesanan.id_pesanan','pesanan.id_pesanan')
                    ->where('id_user',Auth::User()->id)
                    ->where('id_status_pesanan',5)
                    ->whereBetween('pesanan.tgl_pesan', [$tgl1, $tgl2]);

        return view('Laporan.laporan-penjualan', compact('pesanan','detail','tgl1','tgl2'));
    }
    
    public function cetakLaporanPenjualan(Request $request){
        $tgl1 = $request->tgl1;
        $tgl2 = $request->tgl2;
        $pesanan = Order::select('pesanan.tgl_pesan','pesanan.id_percetakan','pesanan.id_pesanan','ongkir','total_harga')
                ->join('percetakan','pesanan.id_percetakan','percetakan.id_percetakan')
                ->where('id_user',Auth::User()->id)
                ->where('id_status_pesanan',5)
                ->whereBetween('pesanan.created_at', [$tgl1, $tgl2])->get();

        $detail = DetailOrder::select('id_produk','jumlah')
                ->join('percetakan','detail_pesanan.id_percetakan','percetakan.id_percetakan')
                ->join('pesanan','detail_pesanan.id_pesanan','pesanan.id_pesanan')
                ->where('id_user',Auth::User()->id)
                ->whereBetween('pesanan.tgl_pesan', [$tgl1, $tgl2]);

        $pdf = PDF::loadView('Laporan.cetak-laporanpenjualan', compact('pesanan','detail','tgl1','tgl2'))->setpaper('A4','landscape');
        return $pdf->stream('Laporan_Penjualan.pdf');
    }

    public function laporanTransfer(Request $request){
        date_default_timezone_set("Asia/Jakarta");

        $tgl1 = $request->tgl1;
        $tgl2 = $request->tgl2;
        $shop_pay = ShopPayment::select('shop_payment.id','shop_payment.id_percetakan','percetakan.nama_toko','no_rek_pengirim','no_rek_penerima','jml_transfer','bukti_transfer','status','shop_payment.created_at')
                                ->join('percetakan','shop_payment.id_percetakan','percetakan.id_percetakan')
                                ->join('users','percetakan.id_user','users.id')
                                ->where('id_user',Auth::User()->id)
                                ->whereBetween('shop_payment.created_at', [$tgl1, $tgl2])
                                ->get();
        return view('Laporan.laporan-transfer',compact('shop_pay','tgl1','tgl2'));
    }

    public function cetakLaporanTransfer(Request $request){
        date_default_timezone_set("Asia/Jakarta");

        $tgl1 = $request->tgl1;
        $tgl2 = $request->tgl2;
        $shop_pay = ShopPayment::select('shop_payment.id','shop_payment.id_percetakan','percetakan.nama_toko','no_rek_pengirim','no_rek_penerima','jml_transfer','bukti_transfer','status','shop_payment.created_at')
                                ->join('percetakan','shop_payment.id_percetakan','percetakan.id_percetakan')
                                ->join('users','percetakan.id_user','users.id')
                                ->where('id_user',Auth::User()->id)
                                ->whereBetween('shop_payment.created_at', [$tgl1, $tgl2])
                                ->get();
        $pdf = PDF::loadView('Laporan.cetak-laporanTransfer', compact('shop_pay','tgl1','tgl2'))->setpaper('A4','landscape');
        return $pdf->stream('Laporan_TRansfer.pdf');
    }

  }
