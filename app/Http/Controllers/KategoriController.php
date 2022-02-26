<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Kategori;
use App\Models\produk;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori = Kategori::all();
        return view ('kategori.index',compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Kategori::all();
        return view('kategori.create',compact('kategori'));
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
            'kategori' => 'required'
        ]);

        Kategori::create($request->all());
        return redirect('/kategori');
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
    public function edit($id_kategori)
    {
        $kategori = Kategori::findOrFail($id_kategori);
        return view("kategori.edit", compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_kategori)
    {
        $kategori = Kategori::find($id_kategori);
        $kategori->kategori = $request->kategori;
        $kategori->update();
        return redirect('/kategori')-> with('status', 'Data Kategori berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_kategori)
    {
        $cek = produk::select('kategori')
                          ->where('id_kategori','=',$id_kategori)
                          ->count();
        if($cek==0){
            $kategori = Kategori::find($id_kategori);
            $kategori->delete();
            return redirect('/kategori')-> with('status', 'Data Kategori berhasil dihapus!');
        }
        else{
            return redirect('/kategori')-> with('status', 'Data Sedang digunakan!');
        }
    }
}
