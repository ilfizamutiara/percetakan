<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\produk;
use App\Models\satuan_produk;
use App\Models\percetakan;
use App\Models\Keranjang;
use Auth;
use DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index(Request $request){
        $filterKeyword = $request->keyword;
        $terlaris= produk::select('produk.id_produk','nama_toko','satuan','nama_produk','harga','keterangan','gambar')
                            ->join('satuan_produk','produk.id_satuan_produk','=','satuan_produk.id_satuan_produk')
                            ->join('percetakan','produk.id_percetakan','percetakan.id_percetakan')
                            ->join('detail_pesanan','produk.id_produk','detail_pesanan.id_produk')
                            ->where('nama_produk','like',"%".$filterKeyword."%")
                            ->where('nama_toko','like',"%".$filterKeyword."%")
                            ->distinct()->orderBy('id_produk')->get();                    
                         
        $jmlTerlaris= DB::table('detail_pesanan')
                        ->selectRaw('COUNT(id_produk) AS jumlah')
                        ->groupBy('id_produk')
                        ->orderBy('id_produk')->get();

        $produk= produk::select('produk.id_produk','nama_toko','satuan','nama_produk','harga','keterangan','gambar')
                            ->join('satuan_produk','produk.id_satuan_produk','=','satuan_produk.id_satuan_produk')
                            ->join('percetakan','produk.id_percetakan','percetakan.id_percetakan')
                            ->where('nama_produk','like',"%".$filterKeyword."%")
                            ->get();
        // return $detail;
        return view('home',compact('produk','terlaris','jmlTerlaris'));
        // return response($jmlTerlaris);
    }

    public function beranda(){
        $produk= produk::select('id_produk','nama_toko','satuan','nama_produk','harga','keterangan','gambar')
                            ->join('satuan_produk','produk.id_satuan_produk','=','satuan_produk.id_satuan_produk')
                            ->join('percetakan','produk.id_percetakan','percetakan.id_percetakan')
                            ->get();
        return view('welcome',compact('produk'));
    }
    
}
