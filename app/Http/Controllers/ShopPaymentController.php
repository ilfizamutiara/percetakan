<?php

namespace App\Http\Controllers;
use App\Models\ShopPayment;
use App\Models\percetakan;
use App\Models\AkunBank;
use App\Models\Order;
use App\Models\DetailOrder;
use PDF;
use Auth;

use Illuminate\Http\Request;

class ShopPaymentController extends Controller
{
    public function index()
    {
        $percetakan = percetakan::select('id_percetakan','nama_bank','no_telp','nama_toko','no_rek','nama_pemilik')
                                ->join('users','percetakan.id_user','users.id')
                                ->join('rekening','users.id','rekening.id_user')
                                ->join('bank','rekening.id_bank','bank.id_bank')                            
                                ->get();
        
        return view('shop_payment.index', compact('percetakan'));
    }

    public function laporanPembayaran(Request $request){
        date_default_timezone_set("Asia/Jakarta");

        $tgl1 = $request->tgl1;
        $tgl2 = $request->tgl2;
        $shop_pay = ShopPayment::select('id','shop_payment.id_percetakan','percetakan.nama_toko','no_rek_pengirim','no_rek_penerima','jml_transfer','bukti_transfer','status','shop_payment.created_at')
                                ->join('percetakan','shop_payment.id_percetakan','percetakan.id_percetakan')
                                ->whereBetween('shop_payment.created_at', [$tgl1, $tgl2])
                                ->get();
        return view('shop_payment.laporan-pembayaran',compact('shop_pay','tgl1','tgl2'));
    }

    public function cetakLaporanPembayaran(Request $request){
        date_default_timezone_set("Asia/Jakarta");

        $tgl1 = $request->tgl1;
        $tgl2 = $request->tgl2;
        $shop_pay = ShopPayment::select('id','shop_payment.id_percetakan','percetakan.nama_toko','no_rek_pengirim','no_rek_penerima','jml_transfer','bukti_transfer','status','shop_payment.created_at')
                                ->join('percetakan','shop_payment.id_percetakan','percetakan.id_percetakan')
                                ->whereBetween('shop_payment.created_at', [$tgl1, $tgl2])
                                ->get();
        $pdf = PDF::loadView('shop_payment.cetak-laporanPembayaran', compact('shop_pay','tgl1','tgl2'))->setpaper('A4','landscape');
        return $pdf->stream('Laporan_Pembayaran.pdf');    
    }

    public function laporanPenjualanToko(Request $request, $id_percetakan)
    {
        date_default_timezone_set("Asia/Jakarta");

        $tgl1 = $request->tgl1;
        $tgl2 = $request->tgl2;

        $percetakan = Percetakan::first();
        $pesanan = Order::select('pesanan.tgl_pesan','pesanan.id_percetakan','pesanan.id_pesanan',
                    'ongkir','total_harga','id_status_pesanan','pesanan.created_at')
                    ->join('percetakan','pesanan.id_percetakan','percetakan.id_percetakan')
                    ->where('pesanan.id_percetakan',$id_percetakan)
                    ->where('id_status_pesanan',5)
                    ->whereBetween('pesanan.tgl_pesan', [$tgl1, $tgl2])
                    ->paginate(10); 
        $detail = DetailOrder::select('id_produk','jumlah','id_status_pesanan')
                    ->join('percetakan','detail_pesanan.id_percetakan','percetakan.id_percetakan')
                    ->join('pesanan','detail_pesanan.id_pesanan','pesanan.id_pesanan')
                    ->where('pesanan.id_percetakan',$id_percetakan)
                    ->where('id_status_pesanan',5)
                    ->whereBetween('pesanan.tgl_pesan', [$tgl1, $tgl2]);

        return view('shop_payment.details', compact('pesanan','percetakan','detail','tgl1','tgl2'));
    }
 
    public function penjualanToko(Request $request)
    {
        date_default_timezone_set("Asia/Jakarta");

        $tgl1 = $request->tgl1;
        $tgl2 = $request->tgl2;

        $percetakan = Percetakan::all();
        $pesanan = Order::select('pesanan.tgl_pesan','pesanan.id_percetakan','pesanan.id_pesanan',
                    'ongkir','total_harga','id_status_pesanan')
                    ->join('percetakan','pesanan.id_percetakan','percetakan.id_percetakan')
                    ->where('id_user',Auth::User()->id)
                    ->where('id_status_pesanan',5)
                    ->whereBetween('pesanan.tgl_pesan', [$tgl1, $tgl2])
                    ->paginate(10); 
        $detail = Order::select('pesanan.tgl_pesan','pesanan.id_percetakan','pesanan.id_pesanan',
                    'ongkir','total_harga','id_status_pesanan')
                    ->join('percetakan','detail_pesanan.id_percetakan','percetakan.id_percetakan')
                    ->join('pesanan','detail_pesanan.id_pesanan','pesanan.id_pesanan')
                    ->where('id_user',Auth::User()->id)
                    ->where('id_status_pesanan',5)
                    ->whereBetween('pesanan.tgl_pesan', [$tgl1, $tgl2]);
        
        foreach($percetakan as $toko)
        {
            $totalBayar = Order::join('percetakan','pesanan.id_percetakan','percetakan.id_percetakan')
                                ->where('pesanan.id_percetakan',$toko->id_percetakan)
                                ->where('id_status_pesanan',5)
                                ->whereBetween('pesanan.tgl_pesan', [$tgl1, $tgl2])
                                ->sum('total_harga'); 
            
            $totalTransaksi = Order::join('percetakan','pesanan.id_percetakan','percetakan.id_percetakan')
                                ->where('pesanan.id_percetakan',$toko->id_percetakan)
                                ->where('id_status_pesanan',5)
                                ->whereBetween('pesanan.tgl_pesan', [$tgl1, $tgl2])
                                ->count();       

            $arrTotBayar[] = $totalBayar;    
            $arrTotTrans[] = $totalTransaksi;                
        } 
        
        $hasil['percetakan'] = $percetakan;
        $hasil['totalBayar'] = $arrTotBayar;

        // return response($hasil['percetakan']);
           
        return view('shop_payment.penjualan-toko', compact('pesanan','percetakan','detail','tgl1','tgl2', 'arrTotTrans','arrTotBayar'));
    }
    public function cetakPenjualanToko(Request $request)
    {
        date_default_timezone_set("Asia/Jakarta");

        $tgl1 = $request->tgl1;
        $tgl2 = $request->tgl2;

        $percetakan = Percetakan::all();
        $pesanan = Order::select('pesanan.tgl_pesan','pesanan.id_percetakan','pesanan.id_pesanan',
                    'ongkir','total_harga','id_status_pesanan')
                    ->join('percetakan','pesanan.id_percetakan','percetakan.id_percetakan')
                    ->where('id_user',Auth::User()->id)
                    ->where('id_status_pesanan',5)
                    ->whereBetween('pesanan.tgl_pesan', [$tgl1, $tgl2])
                    ->paginate(10); 
        $detail = Order::select('pesanan.tgl_pesan','pesanan.id_percetakan','pesanan.id_pesanan',
                    'ongkir','total_harga','id_status_pesanan')
                    ->join('percetakan','detail_pesanan.id_percetakan','percetakan.id_percetakan')
                    ->join('pesanan','detail_pesanan.id_pesanan','pesanan.id_pesanan')
                    ->where('id_user',Auth::User()->id)
                    ->where('id_status_pesanan',5)
                    ->whereBetween('pesanan.tgl_pesan', [$tgl1, $tgl2]);
        
        foreach($percetakan as $toko)
        {
            $totalBayar = Order::join('percetakan','pesanan.id_percetakan','percetakan.id_percetakan')
                                ->where('pesanan.id_percetakan',$toko->id_percetakan)
                                ->where('id_status_pesanan',5)
                                ->whereBetween('pesanan.tgl_pesan', [$tgl1, $tgl2])
                                ->sum('total_harga'); 
            
            $totalTransaksi = Order::join('percetakan','pesanan.id_percetakan','percetakan.id_percetakan')
                                ->where('pesanan.id_percetakan',$toko->id_percetakan)
                                ->where('id_status_pesanan',5)
                                ->whereBetween('pesanan.tgl_pesan', [$tgl1, $tgl2])
                                ->count();       

            $arrTotBayar[] = $totalBayar;    
            $arrTotTrans[] = $totalTransaksi;                
        } 
        
        $hasil['percetakan'] = $percetakan;
        $hasil['totalBayar'] = $arrTotBayar;

        // return response($hasil['percetakan']);
        $pdf = PDF::loadView('shop_payment.cetak-laporanPenjualanToko', compact('pesanan','percetakan','detail','tgl1','tgl2', 'arrTotTrans','arrTotBayar'))->setpaper('A4','landscape');
        return $pdf->stream('Penjualan-Toko.pdf');
           
    }

    public function AdminFree(Request $request)
    {
        date_default_timezone_set("Asia/Jakarta");

        $tgl1 = $request->tgl1;
        $tgl2 = $request->tgl2;

        $biayaAdmin = Order::select('pesanan.tgl_pesan','pesanan.id_percetakan','pesanan.id_pesanan',
                    'pajak','id_status_pesanan','pesanan.created_at')
                    ->join('percetakan','pesanan.id_percetakan','percetakan.id_percetakan')
                    ->where('id_status_pesanan',5)
                    ->whereBetween('pesanan.tgl_pesan', [$tgl1, $tgl2])
                    ->paginate(10); 
        $total = Order::select('pesanan.tgl_pesan','pesanan.id_percetakan','pesanan.id_pesanan',
                    'pajak','id_status_pesanan','pesanan.created_at')
                    ->join('percetakan','pesanan.id_percetakan','percetakan.id_percetakan')
                    ->where('id_status_pesanan',5)
                    ->whereBetween('pesanan.tgl_pesan', [$tgl1, $tgl2])
                    ->paginate(10); 

        return view('shop_payment.adminFree', compact('biayaAdmin','total','tgl1','tgl2'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function cekPembayaranToko(Request $request){
        date_default_timezone_set("Asia/Jakarta");

        $tgl1 = $request->tgl1;
        $tgl2 = $request->tgl2;
        $percetakan = percetakan::select('id_percetakan','nama_bank','no_telp','nama_toko',
                                    'no_rek','nama_pemilik')
                                ->join('users','percetakan.id_user','users.id')
                                ->join('rekening','users.id','rekening.id_user')
                                ->join('bank','rekening.id_bank','bank.id_bank')
                                ->get();
        $payment = ShopPayment::select('shop_payment.id_percetakan','nama_toko','shop_payment.created_at',
                                        'no_rek_penerima','no_rek_pengirim','bukti_transfer','jml_transfer')
                                ->join('percetakan','shop_payment.id_percetakan','percetakan.id_percetakan')
                                ->whereBetween('shop_payment.created_at', [$tgl1, $tgl2])
                                ->get();
        $shop_pay = ShopPayment::select('id','shop_payment.id_percetakan','percetakan.nama_toko','no_rek_pengirim','no_rek_penerima','jml_transfer','bukti_transfer','status','shop_payment.created_at')
                                ->join('percetakan','shop_payment.id_percetakan','percetakan.id_percetakan')
                                ->whereBetween('shop_payment.created_at', [$tgl1, $tgl2])
                                ->get();
        $jml_tf = Order::select('pesanan.tgl_pesan','pesanan.id_percetakan','id_status_pesanan','pesanan.id_pesanan','ongkir','total_harga')
                                ->join('percetakan','pesanan.id_percetakan','percetakan.id_percetakan')
                                // ->where('pesanan.id_percetakan',$id_percetakan)
                                ->where('id_status_pesanan',5)
                                ->whereBetween('pesanan.created_at', [$tgl1, $tgl2])
                                ->get(); 
        //  return response($payment);                       
        return view('shop_payment.cek-pembayaran-toko',compact('percetakan','payment','shop_pay','tgl1','tgl2', 'jml_tf'));
    }

    public function cekPembayaran(Request $request, $id_percetakan){
        date_default_timezone_set("Asia/Jakarta");

        $tgl1 = $request->tgl1;
        $tgl2 = $request->tgl2;
        $percetakan = Percetakan::select('id_percetakan','nama_bank','no_telp','nama_toko','no_rek','nama_pemilik')
                                ->join('users','percetakan.id_user','users.id')
                                ->join('rekening','users.id','rekening.id_user')
                                ->join('bank','rekening.id_bank','bank.id_bank') 
                                ->where('percetakan.id_percetakan',$id_percetakan)                           
                                ->first();
        $payment = ShopPayment::where('shop_payment.id_percetakan',$id_percetakan)
                                ->first();
        $shop_pay = ShopPayment::select('id','shop_payment.id_percetakan','percetakan.nama_toko','no_rek_pengirim','no_rek_penerima','jml_transfer','bukti_transfer','status','shop_payment.created_at')
                                ->join('percetakan','shop_payment.id_percetakan','percetakan.id_percetakan')
                                ->where('shop_payment.id_percetakan',$id_percetakan)
                                ->whereBetween('shop_payment.created_at', [$tgl1, $tgl2])
                                ->get();
        return view('shop_payment.cek-pembayaran',compact('percetakan','payment','shop_pay','tgl1','tgl2'));
    }

    public function transfer(Request $request, $id_percetakan)
    {
        date_default_timezone_set("Asia/Jakarta");

        $tgl1 = $request->tgl1;
        $tgl2 = $request->tgl2;
        // $percetakan = percetakan::findOrFail($id_percetakan);
        $jml_tf = Order::select('pesanan.tgl_pesan','pesanan.id_percetakan','id_status_pesanan','pesanan.id_pesanan','ongkir','total_harga')
                                ->join('percetakan','pesanan.id_percetakan','percetakan.id_percetakan')
                                ->where('pesanan.id_percetakan',$id_percetakan)
                                ->where('id_status_pesanan',5)
                                ->whereBetween('pesanan.created_at', [$tgl1, $tgl2])
                                ->get(); 
        $toko = percetakan::findOrFail($id_percetakan);
        $percetakan = percetakan::select('id_percetakan','nama_bank','no_telp','nama_toko','no_rek','nama_pemilik')
                                ->join('users','percetakan.id_user','users.id')
                                ->join('rekening','users.id','rekening.id_user')
                                ->join('bank','rekening.id_bank','bank.id_bank') 
                                ->where('percetakan.id_percetakan',$id_percetakan)                           
                                ->first();        
        $payment = ShopPayment::where('shop_payment.id_percetakan',$id_percetakan)
                            ->first();
        $rekening = AkunBank::select('id_rek','no_rek','rekening.id_bank','nama_bank','nama_pemilik')
                    ->join('bank','rekening.id_bank','bank.id_bank')
                    ->get();
        return view('shop_payment.transfer', compact('percetakan','toko','payment','rekening','jml_tf'));
    }

    
    public function store(Request $request, $id_percetakan)
    {
        $fileName ="";
            $bukti_transfer = $request->file('bukti_transfer');
            $extention = $bukti_transfer->getClientOriginalExtension(); // untuk ambil ektensi filenya
            $fileName = date('YmdHis') . "." . $extention;
            $uploadPath = "upload/bukti-pembayaran";
            $request->file('bukti_transfer')->move($uploadPath,$fileName);

        $shop_pay = ShopPayment::create([
            'id_percetakan' => $request['id_percetakan'],
            'no_rek_penerima' => $request['no_rek_penerima'],
            'no_rek_pengirim' => $request['no_rek_pengirim'],
            'jml_transfer' => $request['jml_transfer'],
            'bukti_transfer' => $fileName,
            'status' => "lunas"
        ]);
        return redirect('/shop_payment/cek-pembayaranToko')->with('status','Pembayaran Berhasil');
    }

    
}
