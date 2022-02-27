<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminFrees;

class AdminFreesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adminFrees = AdminFrees::all();
        return view('AdminFrees.index',compact('adminFrees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $adminFrees = AdminFrees::all();
        return view('AdminFrees.create',compact('adminFrees'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        AdminFrees::create($request->all());
        return redirect('/AdminFrees');
    }

 
}
