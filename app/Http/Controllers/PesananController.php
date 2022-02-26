<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailOrder;
use App\Models\Order;
use App\Models\StatusOrder;
use App\Models\percetakan;
use App\Models\pelanggan;
use App\Models\Produk;
use App\Models\Payment;
use App\Models\Delivery;

use Auth;

class PesananController extends Controller
{
  
    public function index()
    {
        $pesanan = Order::select('pesanan.id_pesanan','pesanan.id_percetakan','pesanan.total_bayar',
                                'tgl_pesan','nama','alamat','no_hp','status_pesanan.status','pesanan.created_at')
                              ->join('percetakan','pesanan.id_percetakan','percetakan.id_percetakan')
                              ->join('users','percetakan.id_user','users.id')
                              ->join('status_pesanan','pesanan.id_status_pesanan','=','status_pesanan.id')
                              ->orderBy('status','desc')
                              ->where('percetakan.id_user','=', Auth::User()->id)
                              ->get();
        return view('pesanan.index',compact('pesanan'));
    }

    public function indexAdmin()
    {
        $pesanan = Order::select('pesanan.id_pesanan','pesanan.id_percetakan','pesanan.total_bayar','nama_toko',
                                'tgl_pesan','nama','alamat','no_hp','status_pesanan.status','pesanan.created_at')
                              ->join('percetakan','pesanan.id_percetakan','percetakan.id_percetakan')
                              ->join('users','percetakan.id_user','users.id')
                              ->join('status_pesanan','pesanan.id_status_pesanan','=','status_pesanan.id')
                              ->orderBy('status','desc')
                              ->get();
        return view('pesanan.indexAdmin',compact('pesanan'));
    }

    public function pesanandiproses()
    {
        $diproses = Order::select('pesanan.id_pesanan','pesanan.id_percetakan','pesanan.id_status_pesanan',
                                'tgl_pesan','nama','alamat','no_hp','status_pesanan.status','pesanan.created_at')
                              ->join('status_pesanan','pesanan.id_status_pesanan','=','status_pesanan.id')
                              ->join('percetakan','pesanan.id_percetakan','percetakan.id_percetakan')
                              ->join('users','percetakan.id_user','users.id')
                              ->where('pesanan.id_status_pesanan','=',3)
                              ->where('percetakan.id_user','=', Auth::User()->id)
                              ->get();
        return view('pesanan.proses',compact('diproses'));
    }

    public function pesanandiprosesAdmin()
    {
        $diproses = Order::select('pesanan.id_pesanan','pesanan.id_percetakan','nama_toko','pesanan.id_status_pesanan',
                                'tgl_pesan','nama','alamat','no_hp','status_pesanan.status','pesanan.created_at')
                              ->join('status_pesanan','pesanan.id_status_pesanan','=','status_pesanan.id')
                              ->join('percetakan','pesanan.id_percetakan','percetakan.id_percetakan')
                              ->join('users','percetakan.id_user','users.id')
                              ->where('pesanan.id_status_pesanan','=',3)
                              ->get();
        return view('pesanan.prosesAdmin',compact('diproses'));
    }

    public function pesanandikirim()
    {
        $dikirim = Order::select('pesanan.id_pesanan','pesanan.id_percetakan','pesanan.id_status_pesanan',
                                    'tgl_pesan','nama','alamat','no_hp','status_pesanan.status')
                                ->join('status_pesanan','pesanan.id_status_pesanan','=','status_pesanan.id')
                                ->join('percetakan','pesanan.id_percetakan','percetakan.id_percetakan')
                                ->join('users','percetakan.id_user','users.id')
                                ->where('pesanan.id_status_pesanan','=',4)
                                ->where('id_user',Auth::User()->id)
                                ->get();
        $kirim = Order::select('id_pesanan','pesanan.id_percetakan','pesanan.id_status_pesanan',
                                    'tgl_pesan','nama','alamat','no_hp','status_pesanan.status')
                                ->join('status_pesanan','pesanan.id_status_pesanan','=','status_pesanan.id')
                                ->join('percetakan','pesanan.id_percetakan','percetakan.id_percetakan')
                                ->join('users','percetakan.id_user','users.id')
                                ->where('pesanan.id_status_pesanan','=',4)
                                ->where('id_user',Auth::User()->id)
                                ->first();
        return view('pesanan.dikirim',compact('dikirim','kirim'));
    }

    public function pesanandikirimAdmin()
    {
        $dikirim = Order::select('pesanan.id_pesanan','pesanan.id_percetakan','pesanan.id_status_pesanan','nama_toko',
                                    'tgl_pesan','nama','alamat','no_hp','status_pesanan.status','pesanan.created_at')
                                ->join('status_pesanan','pesanan.id_status_pesanan','=','status_pesanan.id')
                                ->join('percetakan','pesanan.id_percetakan','percetakan.id_percetakan')
                                ->join('users','percetakan.id_user','users.id')
                                ->where('pesanan.id_status_pesanan','=',4)
                                ->get();
        return view('pesanan.dikirimAdmin',compact('dikirim'));
    }


    public function pesananselesai()
    {
        $selesai = Order::select('pesanan.id_pesanan','pesanan.id_percetakan','pesanan.id_status_pesanan',
                                    'tgl_pesan','nama','alamat','no_hp','status_pesanan.status')
                                ->join('status_pesanan','pesanan.id_status_pesanan','=','status_pesanan.id')
                                ->join('percetakan','pesanan.id_percetakan','percetakan.id_percetakan')
                                ->join('users','percetakan.id_user','users.id')
                                ->where('pesanan.id_status_pesanan','=',5)
                                ->where('id_user',Auth::User()->id)
                                ->get();
        return view('pesanan.selesai',compact('selesai'));
    }

    public function pesanandibatalkan()
    {
        $dibatalkan = Order::select('pesanan.id_pesanan','pesanan.id_percetakan','pesanan.id_status_pesanan',
                                    'tgl_pesan','nama','alamat','no_hp','status_pesanan.status','nama_toko','pesanan.created_at')
                                ->join('status_pesanan','pesanan.id_status_pesanan','=','status_pesanan.id')
                                ->join('percetakan','pesanan.id_percetakan','percetakan.id_percetakan')
                                ->join('users','percetakan.id_user','users.id')
                                ->where('pesanan.id_status_pesanan','=',6)
                                ->where('id_user',Auth::user()->id)
                                ->get();
        $batal = Order::select('pesanan.id_pesanan','pesanan.id_percetakan','pesanan.id_status_pesanan','total_bayar',
                                'tgl_pesan','nama','alamat','no_hp','status_pesanan.status','nama_toko','pesanan.created_at')
                            ->join('status_pesanan','pesanan.id_status_pesanan','=','status_pesanan.id')
                            ->join('percetakan','pesanan.id_percetakan','percetakan.id_percetakan')
                            ->join('users','percetakan.id_user','users.id')
                            ->where('pesanan.id_status_pesanan','=',6)
                            ->get();
        return view('pesanan.dibatalkan',compact('dibatalkan','batal'));
    }

    public function pesananselesaiAdmin()
    {
        $selesai = Order::select('pesanan.id_pesanan','pesanan.id_percetakan','pesanan.id_status_pesanan','total_bayar',
                                    'tgl_pesan','nama','alamat','no_hp','status_pesanan.status','nama_toko','pesanan.created_at')
                                ->join('status_pesanan','pesanan.id_status_pesanan','=','status_pesanan.id')
                                ->join('percetakan','pesanan.id_percetakan','percetakan.id_percetakan')
                                ->join('users','percetakan.id_user','users.id')
                                ->where('pesanan.id_status_pesanan','=',5)
                                ->get();
        return view('pesanan.selesaiAdmin',compact('selesai'));
    }

    public function show($id_pesanan)
    {

        $payment = Payment::select('id_konfirmasi','konfirmasi_pembayaran.id_pesanan','pesanan.id_status_pesanan','pesanan.nama','alamat','kode_pos','pesanan.total_bayar',
                                'bukti_bayar','pesanan.metode_pembayaran','total_tagihan')
                              ->join('pesanan','konfirmasi_pembayaran.id_pesanan','pesanan.id_pesanan')
                              ->where('konfirmasi_pembayaran.id_pesanan','=',$id_pesanan)
                              ->first();
        $details = DetailOrder::select('id_pesanan','jumlah','ukuran','harga','gambar','nama_produk')
                            ->join('produk','detail_pesanan.id_produk','produk.id_produk')
                            ->where('id_pesanan','=',$id_pesanan)
                            ->get();
         return view('pesanan.show',compact('payment','details'));
    }
    public function showproses($id_pesanan)
    {
        $pesanan = Order::select('pesanan.id_pesanan','username','pesanan.nama','pesanan.no_hp',
                                    'ongkir','metode_pembayaran','nama_toko','pesanan.alamat','email','total_harga','total_bayar','pesanan.created_at')
                        ->join('pelanggan','pesanan.id_pelanggan','pelanggan.id_pelanggan')
                        ->join('detail_pesanan','pesanan.id_pesanan','detail_pesanan.id_pesanan')
                        ->join('produk','detail_pesanan.id_produk','produk.id_produk')
                        ->join('percetakan','produk.id_percetakan','percetakan.id_percetakan')
                        ->join('users','pelanggan.id_user','users.id')
                        ->join('status_pesanan','pesanan.id_status_pesanan','status_pesanan.id')
                        ->where('pesanan.id_pesanan', '=', $id_pesanan)
                        ->first();
        $detailorder = Order::select('pesanan.id_pesanan','percetakan.id_percetakan','username',
                                    'produk.id_produk','gambar','harga','produk.nama_produk','pesanan.nama','pesanan.no_hp',
                                    'ongkir','total_harga','total_bayar','metode_pembayaran','pesanan.alamat','status_pesanan.status','jumlah','ukuran')
                        ->join('detail_pesanan','pesanan.id_pesanan','detail_pesanan.id_pesanan')
                        ->join('produk','detail_pesanan.id_produk','produk.id_produk')
                        ->join('percetakan','produk.id_percetakan','percetakan.id_percetakan')
                        ->join('pelanggan','pesanan.id_pelanggan','pelanggan.id_pelanggan')
                        ->join('users','pelanggan.id_user','users.id')
                        ->join('status_pesanan','pesanan.id_status_pesanan','status_pesanan.id')
                        ->where('pesanan.id_pesanan', '=', $id_pesanan)
                        ->orderBy('nama_produk', 'asc')
                        ->get();
        
         return view('pesanan.showproses',compact('detailorder','pesanan'));
    }

    public function editpesan($id_pesanan)
    {
            $pesanan = Order::select('id_pesanan','id_status_pesanan')
                            ->where('pesanan.id_pesanan', '=', $id_pesanan)
                            ->first();
            $status = StatusOrder::select('id','status')
                            ->get();
                //return $lihat;
             return view('pesanan.edit',compact('pesanan','status'));
    }

    public function updatepesan(Request $request, $id_pesanan)
    {
        $order  = Order::find($id_pesanan);
        $order->id_status_pesanan = $request->id_status_pesanan;
        $order->update();

        return redirect('/pesanan')-> with('status', 'Status berhasil diupdate!');
    }
    public function updateproses(Request $request, $id_pesanan)
    {
        $order  = Order::find($id_pesanan);
        $order->id_status_pesanan = "3";
        $order->update();

        return redirect('/pesanan/prosesAdmin')-> with('status', 'Status berhasil diupdate!');
    }
     

    public function editkirim($id_pesanan)
    {
            $pesanan = Order::select('id_pesanan')
                            ->where('pesanan.id_pesanan', '=', $id_pesanan)
                            ->first();
            $resi = Delivery::all();

            
                //return $lihat;
             return view('pesanan.editproses',compact('pesanan','resi'));
    }
    public function updatekirim(Request $request, $id_pesanan)
    {
        $order  = Order::find($id_pesanan);
        $order->id_status_pesanan = "4";
        $order->update();

        $pesan = Order::select('id_pesanan','pesanan.id_percetakan')
        ->where('id_pesanan',$id_pesanan)
        ->first();


        $delivery = Delivery::create([
        'id_pesanan' => $pesan['id_pesanan'],
        'id_percetakan' => $pesan['id_percetakan'],
        'no_resi' => $request['no_resi'],
        ]);
        
        
        return redirect('/pesanan/dikirim')-> with('status', 'Status berhasil diupdate!');
    }

    public function updatePesananDiterima(Request $request, $id_pesanan){
        $pesan = Order::findOrFail($id_pesanan);
        $pesanan = Order::where('id_pesanan',$id_pesanan)->update([
            'id_status_pesanan' => "5",
        ]);

        return redirect('pesanan/dikirim');

    }

    public function edit($id)
    {
            $detailorder = Order::select('pesanan.id_pesanan','percetakan.id_percetakan',
                                        'produk.id_produk','produk.nama_produk','pesanan.nama','pesanan.no_hp',
                                        'pesanan.ongkir','pesanan.total_harga','pesanan.total_bayar','pesanan.metode_pengiriman',
                                        'pesanan.metode_pembayaran',)
                            ->join('percetakan','id_percetakan','percetakan.id_percetakan')            
                            ->join('produk','id_produk','produk.id_produk')  
                            ->where('id_pesanan', '=', $id_pesanan)
                            ->orderBy('nama_produk', 'asc')
                            ->get();
                //return $lihat;
             return view('pesanan.show',compact('detailorder'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
