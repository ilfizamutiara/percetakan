<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\satuan_produk;
use App\models\produk;
use Validator;

class SatuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $satuan = satuan_produk::all();
        return view('satuanproduk.index',['satuan' => $satuan]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $satuan = satuan_produk::all();
        return view('satuanproduk.create', compact('satuan'))->with('Status','Data berhasil ditambahkan!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
                'satuan' => 'required'
        ]);

        satuan_produk::create($request->all());
        return redirect('/satuanproduk');
    }

    public function edit($id_satuan_produk)
    {
        $satuan = satuan_produk::findOrFail($id_satuan_produk);
        return view("satuanproduk.edit", compact('satuan'))->with("satuan", $satuan);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_satuan_produk)
    {
        $satuan = satuan_produk::find($id_satuan_produk);
        $satuan->satuan = $request->satuan;
        $satuan->update();
        return redirect('/satuanproduk')-> with('status', 'Data Satuan berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_satuan_produk)
    {
        $cek = produk::select('satuan_produk')
                          ->where('id_satuan_produk','=',$id_satuan_produk)
                          ->count();
        if($cek==0){
            $satuan = satuan_produk::find($id_satuan_produk);
            $satuan->delete();
            return redirect('/satuanproduk')-> with('status', 'Data Satuan berhasil dihapus!');
        }
        else{
            return redirect('/satuanproduk')-> with('status', 'Data Sedang digunakan!');
        }
    }
}
