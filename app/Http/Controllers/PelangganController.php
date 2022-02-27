<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\pelanggan;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pelanggan = pelanggan::select('nama','email','jenis_kelamin','alamat','no_hp','foto')
            ->join('users','pelanggan.id_user','users.id')
            ->get();
        return view('pelanggan.index',['pelanggan' => $pelanggan]);
    }

 
}
