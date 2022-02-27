<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Percetakan;
use App\Models\Pelanggan;
use App\Models\Order;

class DashboardAdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $percetakan = Percetakan::all()
                        ->count();
        $pelanggan = Pelanggan::all()
                        ->count();
        $order = Order::all()
                        ->count();
        return view('dashboardAdmin',compact('percetakan','pelanggan','order'));
    }
}
