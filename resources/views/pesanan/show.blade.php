@extends('layouts.admin')

@section('title','datapesanan')

@section('content')
<div class="content">
<div class="card card-info card-outline">
        <div class="col-12"> 
            <div class="card-header">
                <h3>Details</h3>
            </div>
                <div class="card-body">
                <table class="table ">
                    <tr>
                        <td>Nama</td>
                        <td>{{$payment->nama}}</td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>{{$payment->alamat}}, {{$payment->kode_pos}}</td>
                    </tr>
                    <tr>
                        <td>Metode Pembayaran</td>
                        <td>{{$payment->metode_pembayaran}}</td>
                    </tr>
                    <tr>
                        <td>Nominal Transfer</td>
                        <td>Rp.{{number_format($payment->total_bayar)}}</td>
                    </tr>
                    @if($payment->id_status_pesanan == 1)
                    <tr>
                        <td>Status Pembayaran</td>
                        <td>Belum Bayar</td>
                    </tr>
                    @else
                    <tr>
                        <td>Bukti Pembayaran</td>
                        <td > <img class="img-thumbnail" src="{{ asset('/upload/bukti-pembayaran/'.$payment->bukti_bayar) }}" width="100"> </td>
                    </tr>
                    @endif
                </table>
                <table class="table table-striped table-bordered table-hover table-light col-auto mt-3" >
                        <thead class="table-success">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama Produk</th>
                                <th scope="col">Jumlah</th>
                                <th scope="col">Ukuran</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Subtotal</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($details as $detail)
                            <tr>
                                <td > <img class="img-thumbnail" src="{{ asset('/public/uploads/'.$detail->gambar) }}" width="100"> </td>
                                <td >{{$detail->nama_produk}}
                                <td >{{$detail->jumlah}}</td>
                                <td >{{$detail->ukuran}}</td>
                                <td >Rp.{{number_format($detail->harga)}}</td>
                                <td >Rp.{{number_format($detail->jumlah*$detail->harga)}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table> <br>
                    @if(Auth::User()->id == 1 && $payment->id_status_pesanan == 2)
                    <a href="{{ url("/pesanan/edit", $payment->id_pesanan) }}" class="btn btn-success  float-right">Proses</a> 
                    @endif
                </div><br><br>
    </div>
</div>
</div>
@endsection