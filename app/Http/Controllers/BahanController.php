<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bahan;
use App\Models\produk;
use Validator;

class BahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bahan = Bahan::all();
        return view('bahan.index',['bahan' => $bahan]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bahan = Bahan::all();
        return view('bahan.create', compact('bahan'))->with('Status','Data berhasil ditambahkan!');
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
            'bahan' => 'required'
        ]);

        Bahan::create($request->all());
        return redirect('/bahan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_bahan)
    {
        $bahan = Bahan::findOrFail($id_bahan);
        return view('bahan.edit', compact('bahan'))->with('Status','Data berhasil ditambahkan!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_bahan)
    {
        $bahan = Bahan::find($id_bahan);
        $bahan->bahan = $request->bahan;
        $bahan->update();
        return redirect('/bahan')-> with('status', 'Data Bahan berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_bahan)
    {
        $cek = produk::select('bahan')
                          ->where('id_bahan','=',$id_bahan)
                          ->count();
        if($cek==0){
            $bahan = Bahan::find($id_bahan);
            $bahan->delete();
            return redirect('/bahan')-> with('status', 'Data Bahan berhasil dihapus!');
        }
        else{
            return redirect('/bahan')-> with('status', 'Data Sedang digunakan!');
        }

    }
}
