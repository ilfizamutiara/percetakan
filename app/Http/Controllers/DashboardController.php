<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\percetakan;
use App\Models\pelanggan;
use App\Models\produk;
use App\Models\DetailProduk;
use App\Models\Keranjang;
use App\Models\DetailOrder;
use App\Models\Order;
use App\Models\provinsi;
use App\Models\kota;
use App\Models\kurir;
use App\Models\Upload;
use App\Models\City;
use App\Models\Province;
use App\Models\AkunBank;
use App\Models\AdminFrees;
use App\Models\Payment;

use DB;

use Storage;
use Illuminate\Support\Arr;
use GuzzleHttp\Client;

use Auth;


class DashboardController extends Controller
{
    public function cart(){
        $keranjang = Keranjang::select('id_keranjang','id_percetakan','keranjang.id_produk','keranjang.id_pelanggan',
                                'nama_produk','gambar','jumlah','ukuran','total')
                                ->join('produk','keranjang.id_produk','produk.id_produk')
                                ->join('pelanggan','keranjang.id_pelanggan','pelanggan.id_pelanggan')
                                ->join('users','pelanggan.id_user','users.id')
                                ->where('id_user',Auth::User()->id)
                                ->get();
        return view('/',compact('keranjang'));
    }

    public function index()
    {
        $daftartoko = percetakan::select('id_percetakan','id_user','username','email','nama_toko','alamat_toko','no_telp','users.foto')
            ->join('users','percetakan.id_user','=','users.id')
            ->orderBy('nama_toko', 'asc')
            ->get();
        return view('user.toko',compact('daftartoko'));
    }

    public function show($id_percetakan)
    {
        $lihat = produk::select('produk.id_produk','produk.id_bahan','bahan.bahan','percetakan.id_percetakan','produk.nama_produk','produk.harga','produk.stok','produk.estimasi_pengerjaan','produk.keterangan','produk.gambar')
                        ->join('percetakan','produk.id_percetakan','percetakan.id_percetakan') 
                        ->join('bahan','produk.id_bahan','bahan.id_bahan')           
                        ->where('produk.id_percetakan', '=', $id_percetakan)
                        ->orderBy('nama_produk', 'asc')
                        ->get();
            //return $lihat;
         return view('user.lihatproduk',compact('lihat'));
    }

    public function create($id_produk)
    {
        $keranjang = Keranjang::all();
        $detail = produk::select('id_produk','nama_toko','satuan','bahan.bahan','id_kategori','nama_produk','harga','keterangan','gambar','stok','estimasi_pengerjaan')
                            ->join('satuan_produk','produk.id_satuan_produk','=','satuan_produk.id_satuan_produk')
                            ->join('bahan','produk.id_bahan','bahan.id_bahan')           
                            ->join('percetakan','produk.id_percetakan','percetakan.id_percetakan')
                            ->where('id_produk','=', $id_produk)
                            ->get();

        return view('user.detailproduk', compact('keranjang','detail'));
    }

    public function addcart(Request $request)
    {
        $pelanggan = pelanggan::select('id_pelanggan','nama','no_hp','alamat')
                                ->where('id_user',Auth::User()->id)
                                ->first();

        $produk = produk::select('id_produk','produk.id_percetakan','nama_toko','satuan','nama_produk','produk.harga','keterangan','gambar')
                            ->join('satuan_produk','produk.id_satuan_produk','=','satuan_produk.id_satuan_produk')
                            ->join('percetakan','produk.id_percetakan','percetakan.id_percetakan')
                            ->where('id_produk','=', $request->id_produk)
                            ->first();
            
        if($request['ukuran']=="sedang-persegi" || $request['ukuran']=="sedang-bulat"){
            $total_harga = $request->jumlah*(($produk->harga)-5000);
        }
        elseif($request['ukuran']=="kecil-persegi" || $request['ukuran']=="kecil-bulat"){
            $total_harga = $request->jumlah*(($produk->harga)-10000);
        }
        else{
            $total_harga = $request->jumlah*$produk->harga;
        }

        $idPelangganInput = $pelanggan['id_pelanggan'];
        $idProdukInput = $produk['id_produk'];
        
        $cart = Keranjang::where([['id_pelanggan', $idPelangganInput], ['id_produk', $idProdukInput]])->get();
       
        if($cart->isEmpty()){
            $pesanan = Keranjang::create([
                'id_pelanggan' => $pelanggan['id_pelanggan'],
                'id_percetakan' => $produk['id_percetakan'],
                'id_produk' => $produk['id_produk'],
                'jumlah' => $request['jumlah'],
                'ukuran' => $request['ukuran'],
                'total'=>$total_harga,
            ]);
        }else{
                $idKeranjang = $cart[0]->id_keranjang;
                $jumlahKrj = $cart[0]->jumlah;
                $harga = $cart[0]->total;
                $totalJumlah = $request['jumlah'] + $jumlahKrj;
                $totalHarga = $harga/$jumlahKrj * $totalJumlah;

                $input['jumlah'] = $totalJumlah;
                $input['total'] = $totalHarga;

                $cartUpdate = Keranjang::where('id_keranjang', $idKeranjang)->first();
                $cartUpdate->update($input);
        }
        
        return redirect('user/keranjang');
    }

    public function editkeranjang($id_keranjang)
    {
        $keranjang = Keranjang::select('id_keranjang','keranjang.id_produk','keranjang.id_pelanggan','keranjang.id_percetakan',
                                'nama_toko','satuan','bahan','nama_produk','harga','gambar','stok','estimasi_pengerjaan','keterangan','jumlah','ukuran','total')
                            ->join('produk','keranjang.id_produk','=','produk.id_produk')
                            ->join('satuan_produk','produk.id_satuan_produk','=','satuan_produk.id_satuan_produk')
                            ->join('bahan','produk.id_bahan','bahan.id_bahan')           
                            ->join('percetakan','keranjang.id_percetakan','percetakan.id_percetakan')
                            ->where('id_keranjang','=', $id_keranjang)
                            ->get();

        return view('user.editkeranjang', compact('keranjang'));
    }

    public function updatecart(Request $request, $id_keranjang)
    {
        $keranjang = Keranjang::select('id_keranjang','keranjang.id_produk','keranjang.id_pelanggan','keranjang.id_percetakan',
                            'nama_toko','satuan','bahan','nama_produk','harga','gambar','stok','estimasi_pengerjaan','keterangan','jumlah','ukuran','total')
                            ->join('produk','keranjang.id_produk','=','produk.id_produk')
                            ->join('satuan_produk','produk.id_satuan_produk','=','satuan_produk.id_satuan_produk')
                            ->join('bahan','produk.id_bahan','bahan.id_bahan')           
                            ->join('percetakan','keranjang.id_percetakan','percetakan.id_percetakan')
                            ->where('id_keranjang','=', $id_keranjang)
                            ->findOrFail($id_keranjang);
        $total_harga = $request->jumlah * $keranjang->harga;
        $keranjang = Keranjang::where('id_keranjang',$id_keranjang)->update([
            'jumlah' => $request->jumlah,
            'ukuran' => $request->ukuran,
            'total'=>$total_harga,
        ]);

        return redirect('user/keranjang');
    }

    public function tkeranjang(){
        // $percetakan = percetakan::select('id_percetakan','nama_toko')
        //                     ->get();
        // // $jumlah = 0;
        // $keranjang = Keranjang::all();
        $keranjang = Keranjang::select('id_keranjang','keranjang.id_pelanggan','keranjang.id_percetakan','keranjang.id_produk','percetakan.nama_toko',
                            'produk.gambar','produk.nama_produk','produk.harga','jumlah','ukuran','total')
                            ->join('produk','keranjang.id_produk','produk.id_produk')
                            ->join('percetakan','keranjang.id_percetakan','percetakan.id_percetakan')
                            ->join('pelanggan','keranjang.id_pelanggan','pelanggan.id_pelanggan')
                            ->join('users','pelanggan.id_user','users.id')
                            ->where('pelanggan.id_user', '=', Auth::user()->id)
                            // ->groupBy('keranjang.id_percetakan')
                            ->orderBy('nama_toko')
                            ->get();
            return view('user.keranjang',compact('keranjang'));
        
    }

    public function hapus($id_keranjang)
    {
        $keranjang = Keranjang::select('keranjang')
                                ->where('id_keranjang',$id_keranjang);
        $keranjang->delete();
        return redirect('user/keranjang')-> with('status', 'Data Percetakan berhasil dihapus!');

    }

    public function checkout(){
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
        // $order = Order::select('id_pesanan','id_status_pesanan','id_pelanggan','nama','no_hp',
        //                        'alamat','total_harga','ongkir','total_bayar','metode_pembayaran','metode_pengiriman')
        //                 ->first();
        $pelanggan = pelanggan::select('id_pelanggan','nama','no_hp','alamat')
                                ->where('id_user',Auth::User()->id)
                                ->first();
        return view('checkout.checkout',compact('keranjang','pelanggan','produk'));
    }

    //checkout/upload-file
    public function upload_file(){
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
        $upload = Upload::select('id_upload','id_keranjang','name_file','extension')
                        ->first();
        return view('checkout.upload_file',compact('upload','keranjang','produk'));
    }

    public function simpanFile(Request $request)
    {
       

        $fileName = ""; // ini untuk nyimpen nama file, ntar dimasukin ke database
            
        $dokumenFile = $request->file('name_file');
        $extention = $dokumenFile->getClientOriginalExtension(); // untuk ambil ektensi filenya
        $fileName = time().rand(100,999).".". $extention;
        $uploadPath = "upload/dokumen-file";
        $request->file('name_file')->move($uploadPath,$fileName);

        $cart = Keranjang::select('id_keranjang','pelanggan.id_pelanggan','keranjang.id_percetakan','keranjang.id_produk',
                                'percetakan.nama_toko','produk.gambar','produk.nama_produk','produk.harga','jumlah','ukuran','total')
                                ->join('produk','keranjang.id_produk','produk.id_produk')
                                ->join('percetakan','keranjang.id_percetakan','percetakan.id_percetakan')
                                ->join('pelanggan','keranjang.id_pelanggan','pelanggan.id_pelanggan')
                                ->join('users','pelanggan.id_user','users.id')
                                ->where('pelanggan.id_user', '=', Auth::user()->id)
                                ->get();
            foreach($cart as $data){
                $upload = Upload::create([
                    'id_keranjang' => $data['id_keranjang'],
                    'name_file' => $fileName,
                ]);

            }

        return redirect('checkout/pengiriman');
    }

    //checkout/pengiriman
    public function pengiriman (Request $request){
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
        $pelanggan = pelanggan::select('id_pelanggan','nama','no_hp','alamat')
                                ->where('id_user',Auth::User()->id)
                                ->first(); 
        $user = User::select('users.id','users.id_city','users.id_province','kota.city_name','province.name','kode_pos')
                        ->join('kota','users.id_city','kota.id_city')
                        ->join('province','kota.id_province','province.id_province')
                        ->where('users.id',Auth::User()->id)
                        ->first();
        $province = Province::get();
        $kurir = kurir::all();
        $city = City::get();
        
        return view('checkout.pengiriman',compact('keranjang','pelanggan','user','kurir','province','city','produk'));
    }

    public function getprovince(){
        $client = new Client();
        try{
            $response = $client->get('https://api.rajaongkir.com/starter/province',
                array(
                    'headers' =>array(
                        'key' => 'e015ed84d801e0a8bef8a683b5ba0100'
                    ) 
                )
            );
        }catch(RequestException $e){
            var_dump($e->getResponse()->getBody()->getContents());
        }

        $json = $response->getBody()->getContents();
        $array_result = json_decode($json, true);

        for($i = 0; $i < count($array_result["rajaongkir"]["results"]); $i++)
        {
            $province = new \App\Models\Province;
            $province->id_province = $array_result["rajaongkir"]["results"][$i]["province_id"];
            $province->name = $array_result["rajaongkir"]["results"][$i]["province"];
            $province->save();
        }

    }  
    public function getcity(){
        $client = new Client();
        try{
            $response = $client->get('https://api.rajaongkir.com/starter/city',
                array(
                    'headers' =>array(
                        'key' => 'e015ed84d801e0a8bef8a683b5ba0100'
                    )
                )
            );
        }catch(RequestException $e){
            var_dump($e->getResponse()->getBody()->getContents());
        }

        $json = $response->getBody()->getContents();
        $array_result = json_decode($json,true);

        // print_r( $array_result);
        // echo $array_result["rajaongkir"]["results"][0]["city_name"];
        for($i = 0; $i < count($array_result["rajaongkir"]["results"]); $i++)
        {
            $city = new \App\Models\City;
            $city->id_city = $array_result["rajaongkir"]["results"][$i]["city_id"];
            $city->city_name = $array_result["rajaongkir"]["results"][$i]["city_name"];
            $city->id_province = $array_result["rajaongkir"]["results"][$i]["province_id"];

            $city->save();
        }
    }

    public function checkshipping(){
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
        $pelanggan = pelanggan::select('id_pelanggan','nama','no_hp','alamat')
                                ->where('id_user',Auth::User()->id)
                                ->first(); 
        $user = User::select('users.id','users.id_city','users.id_province','kota.city_name','province.name','kode_pos')
                        ->join('kota','users.id_city','kota.id_city')
                        ->join('province','kota.id_province','province.id_province')
                        ->where('users.id',Auth::User()->id)
                        ->first();
        $province = Province::all();
        $title = "check Shipping";
        $city = City::get();

        return view('checkout.pengiriman', compact('title','city','pelanggan','user','province','keranjang'));
    }

    public function processShipping (Request $request){
        $province = Province::all();
        $city = City::all();
        $kurir = kurir::all();
        $title = "Check Shipping Result";
        $client = new Client();
        // $user = User::select('users.id','users.id_city','users.id_province','kota.city_name','province.name','kode_pos')
        //             ->join('kota','users.id_city','kota.id_city')
        //             ->join('province','kota.id_province','province.id_province')
        //             ->where('users.id',Auth::User()->id)
        //             ->first();
        $produk = produk::all();
        $keranjang = Keranjang::select('id_keranjang','pelanggan.id_pelanggan','keranjang.id_percetakan','keranjang.id_produk',
                            'percetakan.nama_toko','produk.gambar','produk.nama_produk','produk.berat','produk.harga','jumlah','ukuran','total')
                            ->join('produk','keranjang.id_produk','produk.id_produk')
                            ->join('percetakan','keranjang.id_percetakan','percetakan.id_percetakan')
                            ->join('pelanggan','keranjang.id_pelanggan','pelanggan.id_pelanggan')
                            ->join('users','pelanggan.id_user','users.id')
                            ->where('pelanggan.id_user', '=', Auth::user()->id)
                            ->orderBy('nama_toko','asc')
                            ->get(); 
        $weight = 0;
        $total = 0;
        foreach($keranjang as $cart){
            $weight += $cart->berat;
            $total += $cart->total;

        }

        $adminFree = AdminFrees::select('id','persentase')->first();
        $pajak = $total*$adminFree->persentase/100;

        // return $pajak;
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
        if($user){
            $x = User::select('users.id','users.id_city','users.id_province','kota.city_name','province.name','kode_pos')
                            ->join('kota','users.id_city','kota.id_city')
                            ->join('province','kota.id_province','province.id_province')
                            ->where('users.id',Auth::User()->id)
                            ->first();
        }
        $pelanggan = pelanggan::select('id_pelanggan','nama','no_hp','alamat')
                            ->where('id_user',Auth::User()->id)
                            ->first();
        
        $met_bayar = AkunBank::select('id_rek','id_user','rekening.id_bank','no_rek','nama_bank','nama_pemilik')
                            ->join('bank','rekening.id_bank','bank.id_bank')
                            ->where('id_user',1)
                            ->get();
        
        $jmlToko = DB::table('keranjang')
                ->join('pelanggan', 'keranjang.id_pelanggan', 'pelanggan.id_pelanggan')
                ->where('id_user',Auth::User()->id)
                ->distinct()
                ->count('id_percetakan');
        // return $user; 

        try{
            $response = $client->request('POST','https://api.rajaongkir.com/starter/cost',
                [
                    
                    'body' => 'origin=421'.
                              '&destination='.$x->id_city.
                              '&weight='.$weight.
                              '&courier=jne',
                    'headers' => [
                        'key' => 'e015ed84d801e0a8bef8a683b5ba0100',
                        'content-type' => 'application/x-www-form-urlencoded',
                    ]
                ]
            );
            $json = $response->getBody()->getContents();
        }catch(RequestException $e){
            var_dump($e->getResponse()->getBody()->getContents());
        }
        
        $array_result = json_decode($json,true);

        $origin = $array_result["rajaongkir"]["origin_details"]["city_name"];
        $destination = $array_result["rajaongkir"]["destination_details"]["city_name"];
        $d = $array_result["rajaongkir"]["results"][0]["costs"];
        $kurirPengiriman = $request->kurir;


        // return $value;
        return view('checkout/shipping',compact('title','keranjang','x','kurirPengiriman','pelanggan','province','city','d','adminFree','met_bayar','jmlToko'));
        // print_r( $array_result);
        // echo $array_result["rajaongkir"]["results"][0]["costs"][1]["cost"][0]["value"];
    }

    public function order(Request $request){
        date_default_timezone_set("Asia/Jakarta");
        $pelanggan = pelanggan::select('id_pelanggan','nama','no_hp','alamat','kode_pos','id_city','id_province')
                                ->join('users','pelanggan.id_user','users.id')
                                ->where('id_user',Auth::User()->id)
                                ->first();  
                                 

        $cart = Keranjang::select('id_keranjang','pelanggan.id_pelanggan','keranjang.id_percetakan','keranjang.id_produk',
                    'percetakan.nama_toko','produk.gambar','produk.nama_produk','produk.harga','jumlah','ukuran','total')
                    ->join('produk','keranjang.id_produk','produk.id_produk')
                    ->join('percetakan','keranjang.id_percetakan','percetakan.id_percetakan')
                    ->join('pelanggan','keranjang.id_pelanggan','pelanggan.id_pelanggan')
                    ->join('users','pelanggan.id_user','users.id')
                    ->where('pelanggan.id_user', '=', Auth::user()->id)
                    ->get();


        $total = 0;
        foreach($cart as $car){
            $total += $car->total;   
        }

        $keranjang = Keranjang::select('id_keranjang','pelanggan.id_pelanggan','keranjang.id_percetakan','keranjang.id_produk',
                    'percetakan.nama_toko','produk.gambar','produk.nama_produk','produk.harga','jumlah','ukuran','total')
                    ->join('produk','keranjang.id_produk','produk.id_produk')
                    ->join('percetakan','keranjang.id_percetakan','percetakan.id_percetakan')
                    ->join('pelanggan','keranjang.id_pelanggan','pelanggan.id_pelanggan')
                    ->join('users','pelanggan.id_user','users.id')
                    ->where('pelanggan.id_user', '=', Auth::user()->id)
                    ->first();

        $adminFree = AdminFrees::select('id','persentase')->first();

        $jmlToko = DB::table('keranjang')
                ->select('id_percetakan')
                ->join('pelanggan', 'keranjang.id_pelanggan', 'pelanggan.id_pelanggan')
                ->where('id_user',Auth::User()->id)
                ->distinct()->get();
        
                // return $pajak;
        
        // $id_percetakan =array();
        // foreach($cart as $car){
        //     $id_percetakan[] = $car->id_percetakan;
        //     $id_percetakan[] = $cetak;
        //     return $id_percetakan;
        //   }
        
        $input = $request->all();
        $status= "1";
        $now = date('Y-m-d h:m');
        $idCustomer = $pelanggan->id_pelanggan;
        // $idPercetakan = $keranjang['id_percetakan'];
        $id_percetakan = $keranjang['id_percetakan'];
        $ongkir = $request->input('ongkir');
        $presentase = $adminFree->persentase;
        // $pajak = $total*$presentase/100;
        // $tot_bayar = $total + $ongkir + $pajak;
        
        $idCek = 0;

        $query = Keranjang::where([
            ['id_pelanggan', $idCustomer]])->get(); 

        if($query){
            foreach($query as $x){
                $idPercetakan = $x->id_percetakan;
            
                $totHarga = DB::table('keranjang')
                    ->join('pelanggan', 'keranjang.id_pelanggan', 'pelanggan.id_pelanggan')
                    ->where('id_user',Auth::User()->id)
                    ->where('id_percetakan',$idPercetakan)
                    ->sum('total');

                $pajakAdmin = $totHarga*$presentase/100;

                if($idCek != $idPercetakan){
                    $idOrder = date('dmy'). rand(0, 999);
                    $input['id_pesanan'] = $idOrder; 
                    $input['id_percetakan'] = $idPercetakan; 
                    $input['id_status_pesanan'] = $status;
                    $input['nama'] = $pelanggan->nama;
                    $input['no_hp'] = $pelanggan->no_hp;
                    $input['alamat'] = $pelanggan->alamat;
                    $input['tgl_pesan'] = $now;
                    $input['id_pelanggan'] = $idCustomer; 
                    $input['id_city'] = $pelanggan->id_city;
                    $input['id_province'] = $pelanggan->id_province;
                    $input['kode_pos'] = $pelanggan->kode_pos;
                    $input['total_harga'] = $totHarga;
                    $input['ongkir']= $ongkir;
                    $input['pajak'] = $pajakAdmin;
                    $input['total_bayar'] = $totHarga + $ongkir + $pajakAdmin;
                    $input['kurir'] = $request->input('kurirPengiriman');
            
                    Order::create($input);
                    $idCek = $idPercetakan;

                    if($input){
                        $idProduk = $x['id_produk'];
                        $jumlah = $x['jumlah'];
                        $pesanan = $x['id_pesanan'];
                        $ukuran = $x['ukuran'];
                                    
                        $item['id_pesanan'] = $idOrder; 
                        $item['id_percetakan'] = $idPercetakan;
                        $item['id_produk'] = $idProduk;
                        $item['jumlah'] = $jumlah;
                        $item['ukuran'] = $ukuran;
                
                        DetailOrder::create($item);

                        $payment = Payment::create([
                            'id_pesanan' => $idOrder,
                        ]);
                        $dataStok = produk::select('stok')->where('id_produk', '=', $idProduk)->get();
                        foreach($dataStok as $ds){
                            $stok = $ds['stok'];
                            $newStok = $stok - $jumlah;
            
                        }    
                        produk::where('id_produk', $idProduk)->update(['stok' => $newStok]);
                    }
                }else{
                    $idProduk = $x['id_produk'];
                    $jumlah = $x['jumlah'];
                    $pesanan = $x['id_pesanan'];
                    $ukuran = $x['ukuran'];
                                
                    $item['id_pesanan'] = $idOrder; 
                    $item['id_percetakan'] = $idPercetakan;
                    $item['id_produk'] = $idProduk;
                    $item['jumlah'] = $jumlah;
                    $item['ukuran'] = $ukuran;
            
                    DetailOrder::create($item);

                    $payment = Payment::create([
                        'id_pesanan' => $idOrder,
                    ]);
                    $dataStok = produk::select('stok')->where('id_produk', '=', $idProduk)->get();
                    foreach($dataStok as $ds){
                        $stok = $ds['stok'];
                        $newStok = $stok - $jumlah;
        
                    }    
                    produk::where('id_produk', $idProduk)->update(['stok' => $newStok]);
                }
            }
            $query->each->delete();
        }
        
        // $pay = $input['id_pesanan'];
        // $payment = Payment::create([
        //     'id_pesanan' => $pay,
        // ]);
            $cartItem = Keranjang::select('id_keranjang','pelanggan.id_pelanggan','keranjang.id_percetakan','keranjang.id_produk',
                                'percetakan.nama_toko','produk.gambar','produk.nama_produk','produk.harga','jumlah','ukuran','total')
                                ->join('produk','keranjang.id_produk','produk.id_produk')
                                ->join('percetakan','keranjang.id_percetakan','percetakan.id_percetakan')
                                ->join('pelanggan','keranjang.id_pelanggan','pelanggan.id_pelanggan')
                                ->join('users','pelanggan.id_user','users.id')
                                ->where('pelanggan.id_user', '=', Auth::user()->id)
                                ->get();
            Keranjang::destroy($cartItem);

        return redirect('user/riwayat');
        // return response($jmlToko);
    }


    public function riwayat(){
        $pesanan = Order::select('id_pesanan','id_produk','id_percetakan','nama','alamat','no_hp','nama_produk','status_pesanan.status')
                              ->join('pesanan','detail_pesanan.id_pesanan','=','pesanan.id_pesanan')
                              ->join('status_pesanan','pesanan.id_status_pesanan','=','status_pesanan.id')
                              ->join('produk','detail_pesanan.id_produk','=','produk.id_produk')
                              ->get();
        return view('daftarpesanan.index',compact('pesanan'));
    }
}
