<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Percetakan;
use App\Models\Pelanggan;
use App\Models\Toko;
use App\Models\User;
use App\Models\City;
use App\Models\Province;

use Validator;
use Auth;
use Storage;
use Illuminate\Support\Arr;

class ProfilController extends Controller
{

    public function edit(Request $request){
        // $user = User::where('id',Auth::user()->id)->first();
        $city = City::all();
        $province = Province::all();
        $user = User::select('id','username','email','users.id','users.id_city','users.id_province','kota.city_name','province.name','kode_pos')
                    ->join('kota','users.id_city','kota.id_city')
                    ->join('province','kota.id_province','province.id_province')
                    ->where('users.id',Auth::User()->id)
                    ->first();

        $pelanggan = Pelanggan::where('id_user',Auth::user()->id)->first();

        return view('profile.edit', compact('user','pelanggan','city','province'));

    }

    public function update(Request $request)
    {

        $user = User::where('id',Auth::user()->id)->update([
            'username' => $request->username,
            'email' =>$request->email,
            'id_province' => $request->id_province,
            'id_city' => $request->id_city,
        ]);
        // $request->user()->update(
        //     $request->all()
        // );
        $pelanggan = Pelanggan::where('id_user',Auth::user()->id)->update([
                    'nama' => $request->nama,
                    'jenis_kelamin' =>$request->jenis_kelamin,
                    'alamat' => $request->alamat,
                    'no_hp' => $request->no_hp,
                    // 'foto' => $fileName,
        ]);

        return redirect()->route('profile/edit');
    }

 
}
