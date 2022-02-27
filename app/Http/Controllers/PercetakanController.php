<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Percetakan;
use App\Models\Toko;
use App\Models\User;
use Validator;
use Auth;
use Storage;
use Illuminate\Support\Arr;



class PercetakanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $percetakan = Percetakan::select('id_percetakan','id','username','email','nama_toko','alamat_toko','no_telp','users.foto')
            ->join('users','percetakan.id_user','=','users.id')
            ->orderBy('nama_toko', 'asc')
            ->get();
        return view('percetakan.index',['percetakan' => $percetakan]);
        
    }
    public function validator(array $data)
    {
        return Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required_with:password_confirmation|same:password_confirmation', 'string', 'min:8', 'confirmed'],
            'gambar' => ['required|image|mimes:jpeg,jpg,png,svg|max:2048'],
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $percetakan = Percetakan::select('username','nama_toko','alamat_toko','no_telp','email','foto')
                                ->join('users','percetakan.id_user','users.id')
                                ->get();
        return view('percetakan.create', compact('percetakan'));
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

            $fileName = ""; // ini untuk nyimpen nama file, ntar dimasukin ke database
            
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
                'id_user' =>  $user->id,
                'nama_toko' => $request['nama_toko'],
                'alamat_toko' => $request['alamat_toko'],
                'no_telp' => $request['no_telp'],
                
            ]);
            
            $user->assignRole('percetakan');
            return redirect('/percetakan');
        }
        else{
            $percetakan = Percetakan::all();
            $user = User::all();
            return redirect('percetakan.create',compact('user','percetakan'))-> with('status', 'Data Percetakan berhasil ditambahkan!');  
        }
    }

    public function edit($id)
    {
        $user = User::where('id',$id)->first();
        $percetakan = Percetakan::where('id_user',$id)->first();
        return view('percetakan.edit', compact('user','percetakan'));  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $fileName = "";        
            if($request->hasFile('foto')){
                if($request->file('foto')->isValid()) {
                    $gambarFile = $request->file('foto');
                    $extention = $gambarFile->getClientOriginalExtension();
                    $fileName = date('YmdHis') . "." . $extention;
                    $uploadPath = "upload/percetakan-foto";
                    $request->file('foto')->move($uploadPath,$fileName);
                    //  $percetakan['foto'] = $fileName;
    
                }
            }
            if(empty($request->foto)){
                $user = User::where('id',$id)->update([
                    'email' => $request->email,
                    'username' => $request->username,
                    'foto' => $fileName,
                ]);
                
            }else{
                $user = User::where('id',$id)->update([
                    'email' => $request->email,
                    'username' => $request->username,
                    'foto' => $fileName,
                ]);
            }
            $percetakan = Percetakan::where('id_user',$id)->update([
                'nama_toko' => $request->nama_toko,
                'alamat_toko' => $request->alamat_toko,
                'no_telp' => $request->no_telp,
                ]);
            

        return redirect('/percetakan')-> with('status', 'Data Percetakan berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $percetakan = Percetakan::select('percetakan')
                                ->where('id_user',$id);
        $percetakan->delete();
        $user = User::find($id);
        $user->delete();
        return redirect('/percetakan')-> with('status', 'Data Percetakan berhasil dihapus!');

    }
}
