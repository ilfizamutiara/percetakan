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
            <div class="row mt-3 mb-5">
                <div class="col-6">
                    <p>Username: {{$pesanan->username}} </br> Nama: {{$pesanan->nama}} </br>
                        Alamat: {{$pesanan->alamat}} </br>No HP: {{$pesanan->no_hp}} </br>Email: {{$pesanan->email}} </br>
                </div>
                <div class="col-6 ">
                    <p>ID Pesanan: {{$pesanan->id_pesanan}} </br>waktu pemesanan: {{$pesanan->created_at}} </br>Subtotal harga: Rp.{{number_format($pesanan->total_harga)}} </br>Total bayar:  Rp.{{number_format($pesanan->total_bayar)}} </p>
                </div>
            </div>
            <table class="table table-striped table-bordered table-hover table-light col-auto mt-3" >
                <h2>{{$pesanan->nama_toko}}</h2>
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
                @foreach($detailorder as $detail)
                    <tr>
                        <td > <img class="img-thumbnail" src="{{ asset('/public/uploads/'.$detail->gambar) }}" width="100"> </td>
                        <td >{{$detail->nama_produk}} </td>
                        <td >{{$detail->jumlah}}</td>
                        <td >{{$detail->ukuran}}</td>
                        <td >Rp.{{number_format($detail->harga)}}</td>
                        <td >Rp.{{number_format($detail->jumlah*$detail->harga)}}</td>
                    </tr>
                @endforeach
                </tbody>      
            </table> <br><br>
            <a href="{{ url("/pesanan/editproses", $pesanan->id_pesanan) }}" class="btn btn-success float-right">Proses</i></a>  
        </div>
    </div>
</div>
</div>
@endsection