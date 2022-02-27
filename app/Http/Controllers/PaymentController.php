<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Order;
use Validator;
use Storage;
use Illuminate\Support\Arr;


class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id_pesanan)
    {
        $pesanan = Order::select('id_pesanan','total_bayar','metode_pembayaran')
        ->where('id_pesanan',$id_pesanan)
        ->first();
        $bayar = Payment::all();
        return view ('user.pembayaran',compact('bayar','pesanan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function validator(array $data)
    {
        return Validator::make($data, [
            'bukti_bayar' => 'required|image|mimes:jpeg,pdf,jpg,png,svg|max:2048'
        ]);
    }

    public function store(Request $request, $id_pesanan)
    {
            $pesanan = Order::find($id_pesanan);
            $pesanan->id_status_pesanan = "2";
            $pesanan->update();
            $pesanan = Order::select('id_pesanan','total_bayar','id_status_pesanan')
                            ->where('pesanan.id_pesanan',$id_pesanan)
                            ->first();

            $fileName ="";


        if($request->file('bukti_bayar')->isValid())
        {
            $buktibayar = $request->file('bukti_bayar');
            $extention = $buktibayar->getClientOriginalExtension(); // untuk ambil ektensi filenya
            $fileName = date('YmdHis') . "." . $extention;
            $uploadPath = "upload/bukti-pembayaran";
            $request->file('bukti_bayar')->move($uploadPath,$fileName);

        }
            $payment = Payment::where('id_pesanan',$id_pesanan)->update([
                'bukti_bayar' => $fileName,
            ]);
        
        return redirect('/user/riwayat')->with('status','Pembayaran berhasil dilakukan!');
    }

}
