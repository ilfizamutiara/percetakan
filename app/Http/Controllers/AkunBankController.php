<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AkunBank;
use App\Models\percetakan;
use App\Models\User;
use App\Models\Bank;
use Auth;

class AkunBankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $akun = AkunBank::select('id_rek','id_user','nama_bank','no_rek','nama_pemilik')
                        ->join('bank','rekening.id_bank','bank.id_bank')
                        ->join('users','rekening.id_user','users.id')
                        ->where('id_user', '=', Auth::User()->id)
                        ->get();
        return view('akunbank.index', compact('akun'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $akun = AkunBank::all();
        $bank = Bank::all();
        return view('akunbank.create', compact('akun','bank'))->with('Status','Data berhasil ditambahkan!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::select('id')
                        ->where('id','=', Auth::User()->id)
                        ->first();
                        
        $akun = AkunBank::create([
            'id_rek' => $request['id_rek'],
            'id_user' => $user->id,
            'id_bank' => $request['id_bank'],
            'no_rek' => $request['no_rek'],
            'nama_pemilik' => $request['nama_pemilik'],
        ]);
        return redirect('/akunbank')->with('status','Akun Bank berhasil ditambah!');
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
    public function edit($id_rek)
    {
        $akun = AkunBank::find($id_rek);
        $bank = Bank::all();
        return view("akunbank.edit", compact('akun','bank'))->with("akun", $akun);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_rek)
    {
        $akun  = AkunBank::find($id_rek);
        $akun->id_bank = $request->id_bank;
        $akun->no_rek = $request->no_rek;
        $akun->nama_pemilik = $request->nama_pemilik;
        $akun->update();
        return redirect('/akunbank')-> with('status', 'Akun Bank berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_rek)
    {
            $akun = AkunBank::find($id_rek);
            $akun->delete();
            return redirect('/akunbank')-> with('status', 'Data Akun Bank berhasil dihapus!');
    }
}
