<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\percetakan;
use App\Models\User;
use Validator;
use Storage;
use Illuminate\Support\Arr;



class RegisterPercetakanController extends Controller
{
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => 'required', 'string', 'email', 'max:255',
            'password' => 'required', 'string', 'min:8', 'confirmed',
            'foto' => 'required|image|mimes:jpeg,jpg,png,svg|max:2048',

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    public function create()
    {
        $user = User::all();
        $percetakan = percetakan::all();
        return view('registerpercetakan', compact('user','percetakan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if($request['password']==$request['password_confirmation']){
            $fileName ="";
            if($request->file('foto')->isValid()) {
                $gambarFile = $request->file('foto');
                $extention = $gambarFile->getClientOriginalExtension(); // untuk ambil ektensi filenya
                $fileName = date('YmdHis') . "." . $extention;
                $uploadPath = "upload/percetakan-foto";
                $request->file('foto')->move($uploadPath,$fileName);
                // $percetakan['foto'] = $fileName;  // ni buat apa?? 
                
                // gambarnya disimpan di /public/upload/product-gambar

                
            }

            $user = User::create([
                'username' => $request['username'],
                'email' => $request['email'],
                'id_role' => "2",
                'id_province' => "32",
                'kode_pos' =>$request['kode_pos'],
                'id_city' =>"421",
                'foto' => $fileName,
                'password' => Hash::make($request['password']),
                
            ]);
            $percetakan = percetakan::create([
                'id_user' =>$user['id'],
                'nama_toko' =>$request['nama_toko'],
                'no_telp' =>$request['no_telp'],
                'alamat_toko' => $request['alamat_toko'],
                
            ]);
            $user->assignRole('percetakan');
            return redirect('dashboardPercetakan');
        }
        else{
            $user = User::all();
            return redirect('registerpercetakan',compact('user'));  
        }
    }
}
