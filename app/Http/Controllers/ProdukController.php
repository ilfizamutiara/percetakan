<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\produk;
use App\Models\percetakan;
use App\Models\Kategori;
use App\Models\satuan_produk;
use App\Models\User;
use App\Models\Bahan;
use App\Models\DetailOrder;
use Auth;
use Storage;
use Illuminate\Support\Arr;


class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filterKeyword = $request->keyword;
        $produk= produk::select('id_produk','produk.id_percetakan','bahan','produk.id_kategori','kategori','nama_produk','satuan','harga','stok','estimasi_pengerjaan','keterangan','gambar')
                            ->join('satuan_produk','produk.id_satuan_produk','=','satuan_produk.id_satuan_produk')
                            ->join('bahan','produk.id_bahan','bahan.id_bahan')
                            ->join('kategori','produk.id_kategori','kategori.id_kategori')
                            ->join('percetakan','produk.id_percetakan','percetakan.id_percetakan')
                            ->join('users','percetakan.id_user','users.id')
                            ->where('percetakan.id_user', '=', Auth::user()->id)
                            ->where('nama_produk','like',"%".$filterKeyword."%")
                            ->get(); 
        return redirect('/produk');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $produk = produk::select('id_produk','nama_toko','nama_produk','harga','deskripsi')
        //                 ->join('toko', 'produk.id_toko','=','toko.id_toko')
        //                 ->get();
        $produk = produk::all();
        $satuan = satuan_produk::all();
        $bahan = Bahan::all();
        $kategori = Kategori::all();
        return view('produk.create', compact('produk','satuan','bahan','kategori'))->with('Status','Data berhasil ditambahkan!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function validator(array $data)
    {
        return Validator::make($data, [
            'nama_produk' => 'required|max:255',
            'harga' => 'required',
            'keterangan' => 'required',
            'gambar' => 'required|image|mimes:jpeg,jpg,png,svg|max:2048'
        ]);
    }

    public function store(Request $request)
    {

        $fileName ="";
        $user = percetakan::select('id_percetakan')
                        ->where('id_user',Auth::User()->id)
                        ->first();
        if($request->file('gambar')->isValid()) {
            $gambarFile = $request->file('gambar');
            $extention = $gambarFile->getClientOriginalExtension();
            $fileName = "product-gambar/" . date('YmdHis') . "." . $extention;
            $uploadPath = env('UPLOAD_PATH') . "/product-gambar";
            $request->file('gambar')->move($uploadPath,$fileName);

        }
        $produk = produk::create([
            'id_percetakan' => $user['id_percetakan'],
            'id_satuan_produk' => $request['id_satuan_produk'],
            'id_bahan' => $request['id_bahan'],
            'id_kategori' => $request['id_kategori'],
            'nama_produk' => $request['nama_produk'],
            'harga' => $request['harga'],
            'stok' => $request['stok'],
            'berat' => $request['berat'],
            'estimasi_pengerjaan' => $request['estimasi_pengerjaan'],
            'keterangan' => $request['keterangan'],
            // 'foto' => $request['foto'],
            'gambar' => $fileName,
        ]);
        return redirect('/produk')->with('status','Produk berhasil ditambah!');
        // $produk = produk::create($input);
        // return redirect('/produk');
    }

    public function edit($id_produk)
    {
        $produk = produk::findOrFail($id_produk);
        $satuan = satuan_produk::all();
        $bahan = Bahan::all();
        $kategori = Kategori::all();
        return view("produk/edit", compact('produk','satuan','bahan','kategori'))->with("produk", $produk);
    }

    public function update(Request $request, $id_produk)
    {
        $dataproduk = produk::findOrFail($id_produk);

        $fileName ="";
        $user = percetakan::select('id_percetakan')
                        ->where('id_user',Auth::User()->id)
                        ->first();
        
        if($request->hasFile('gambar')){
            if($request->file('gambar')->isValid()) {
                Storage::disk('upload')->delete($dataproduk->gambar);
                $gambarFile = $request->file('gambar');
                $extention = $gambarFile->getClientOriginalExtension();
                $fileName = "product-gambar/" . date('YmdHis') . "." . $extention;
                $uploadPath = env('UPLOAD_PATH') . "/product-gambar";
                $request->file('gambar')->move($uploadPath,$fileName);
            }
        }
        if(empty($request->gambar)){
            $produk = produk::where('id_produk',$id_produk)->update([
                'id_satuan_produk' => $request->id_satuan_produk,
                'id_bahan' => $request->id_bahan,
                'id_kategori' => $request->id_kategori,
                'nama_produk' => $request->nama_produk,
                'harga' => $request->harga,
                'stok' => $request->stok,
                'estimasi_pengerjaan' => $request->estimasi_pengerjaan,
                'keterangan' => $request->keterangan,
            ]);
        }else{
            $produk = produk::where('id_produk',$id_produk)->update([
                'id_satuan_produk' => $request->id_satuan_produk,
                'id_bahan' => $request->id_bahan,
                'id_kategori' => $request->id_kategori,
                'nama_produk' => $request->nama_produk,
                'harga' => $request->harga,
                'stok' => $request->stok,
                'estimasi_pengerjaan' => $request->estimasi_pengerjaan,
                'keterangan' => $request->keterangan,
                'gambar' => $fileName,
            ]);
        }

        return redirect('/produk')-> with('status', 'Data Produk berhasil diupdate!');
    }

    public function destroy($id_produk)
    {
        $cek = DetailOrder::select('produk')
                          ->where('id_produk','=',$id_produk)
                          ->count();
        if($cek==0){
            $produk = produk::find($id_produk);
            $produk->delete();
            return redirect('/produk')-> with('status', 'Data Produk berhasil dihapus!');
        }else{
            return redirect('/produk')-> with('status', 'Data Sedang digunakan!');
        }
    }
}
