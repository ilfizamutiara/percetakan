@extends('layouts.costumer')

@section('title','Form Pembayaran')

@section('content')
<div class="content"> 
    <div class="col-lg-12 mt-lg-3">
        <!-- Default box -->
        <div class="card card-solid">
            <div class="card-header">
                <h3><strong>ID ORDER #{{$pesanan->id_pesanan}} </strong></h3>
            </div>
            <div class="card-body">
                <div class="row mt-3 mb-5">
                    <div class="col-6">
                        <label for="address">Alamat Penerima</label>
                        <p>Nama: {{$pesanan->nama}} </br>No HP: {{$pesanan->no_hp}} </br>Email: {{$pesanan->email}} 
                        </br>Alamat: {{$pesanan->alamat}} <br>{{$pesanan->city_name}}, {{$pesanan->name}},{{$pesanan->kode_pos}}</p>
                    </div>
                    <div class="col-6 ">
                        <label class="label">Details</label>
                        <p>#{{$pesanan->id_pesanan}} </br>waktu pemesanan: {{$pesanan->created_at}} </br>Status Pembayaran: {{$pesanan->status}}  </p>

                    </div>

                </div>
                <h3><a class="nav-link" href="{{ url('/user/lihatproduk', $pesanan->id_percetakan) }}">{{$pesanan->nama_toko}}</a></h3>
                <table class="table table-striped table-bordered table-hover table-light col-auto" >
                      <thead class="table-success">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Produk</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Ukuran</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Total</th>

                        </tr>
                    </thead>
                    <tbody>
                    @foreach($detail as $dt)  
                        <tr>
                            <td > <img class="img-thumbnail" src="{{ asset('/public/uploads/'.$dt->gambar) }}" width="100"> </td>
                            <td >{{$dt->nama_produk}}</td>
                            <td >{{$dt->jumlah}}</td>
                            <td >{{$dt->ukuran}}</td>
                            <td >Rp.{{number_format($dt->harga)}}</td>
                            <td >Rp.{{number_format($dt->jumlah*$dt->harga)}}</td>
                        </tr>
                    @endforeach
                    
                    </tbody>
                    
                </table>
                <div class="col-5 mt-3 float-right">
                    <div class="table-responsive">
                        <table class="table  ">
                            <tr>
                                <th>Total Harga :</th>
                                <td>RP.{{number_format($pesanan->total_harga)}}</td>
                            </tr>
                            <tr>
                                <th>Biaya Ongkir : </th>
                                <td>Rp.{{number_format($pesanan->ongkir)}}</td>
                            </tr>
                            <tr>
                                <th>Biaya Penanganan : </th>
                                <td>Rp.{{number_format($pesanan->pajak)}}</td)>
                            </tr>
                            <tr>
                                <th>Total Bayar : </th>
                                <td>Rp.{{number_format($pesanan->total_bayar)}}</td>
                            </tr>
                        </table>
                        @if($pesanan->status == "Dikirim")
                        <form class="form-group" action="{{ url('/user/riwayat', $pesanan->id_pesanan) }}" method="POST"  style="float: right">
                        @csrf                         
                            <div class="text">
                                <button type="submit" class="btn btn-success">Pesanan Diterima</button>
                            </div>
                        </form>
                        @endif
                        @if($pesanan->status == "Belum bayar")
                        <form class="form-group" action="{{ url('/riwayat', $pesanan->id_pesanan) }}" method="POST"  style="float: right">
                        @csrf                         
                            <div class="text">
                                <button type="submit" class="btn btn-danger">Batalkan Pesanan</button>
                            </div>
                        </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection 