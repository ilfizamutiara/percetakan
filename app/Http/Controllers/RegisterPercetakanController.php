<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\percetakan;
use App\Models\User;
use Validator;
use Storage;
use Illuminate\Support\Arr;

use Illuminate\Validation\Rules\Password;



class RegisterPercetakanController extends Controller
{
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    // protected function validator(array $data)
    // {
    //     return Validator::make($data, [
    //         'email' => ['required','string','email','max:255'],
    //         'username' => ['required','regex:/^[.\w]+$/'],
    //         'password' => ['required','string','confirmed',Password::min(8)
    //         ->mixedCase()
    //         ->numbers()],
    //         'foto' => 'required','image','mimes:jpeg,jpg,png,svg','max:2048'
    //     ]);
    // }

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
        $this->validate($request, [
            'email' => ['required','string','email','max:255'],
            'username' => ['required','regex:/^[.\w]+$/'],
            'password' => ['required','string','confirmed',Password::min(8)
            ->mixedCase()
            ->numbers()],
            'kode_pos' => ['required','int'],
            'foto' => 'image','mimes:jpeg,jpg,png,svg','max:2048'
            ]);

        if($request['password']==$request['password_confirmation']){
            if($request['foto']==null){
                $user = User::create([
                    'username' => $request['username'],
                    'email' => $request['email'],
                    'id_role' => "2",
                    'id_province' => "32",
                    'kode_pos' =>$request['kode_pos'],
                    'id_city' =>"421",
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
                $fileName ="";
                if($request->file('foto')->isValid()) {
                    $gambarFile = $request->file('foto');
                    $extention = $gambarFile->getClientOriginalExtension();
                    $fileName = date('YmdHis') . "." . $extention;
                    $uploadPath = "upload/percetakan-foto";
                    $request->file('foto')->move($uploadPath,$fileName);
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
        }
        else{
            $user = User::all();
            return redirect('registerpercetakan');  
        }
    }
}
