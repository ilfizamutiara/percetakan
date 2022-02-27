<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\User;
class DataUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=User::select('users.id','users.username','users.email','roles.name','users.created_at')
                    ->join('roles','users.id_role','=','roles.id')
                    ->get();
        return view('DataUser.index',compact('user'));
    }

   
}
