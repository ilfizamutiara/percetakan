@extends('layouts.costumer')
@section('content')
<div class="content">
    <div class="col-lg-12 mt-lg-3" >
      <!-- Default box -->
        <form method="GET" action="{{ url('checkout/shipping') }}" align="left" enctype="multipart/form-data">
        @csrf
            <div class="card card-solid">
                <div class="card-header">
                    <h3><strong>Checkout</strong></h3>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="card card-solid mt-3 ml-2">
                            <div class="card-header"style="background-color:#009688 ">
                            <h4 style="color:#ffff"><strong>Alamat</strong></h3>
                            </div>
                            <div class="card-body">
                                <p>Nama : {{$pelanggan->nama}} <br> No HP : {{$pelanggan->no_hp}} <br> Alamat : {{$pelanggan->alamat}} <br>
                                {{$user->city_name}}, {{$user->name}},{{$user->kode_pos}}</p>
                            </div>
                        </div>
                        <div class="card card-solid  ml-2">
                            <div class="card-header">
                                <h3><strong>Pengiriman Pengiriman ({{$kurirPengiriman}})</strong></h3>
                                <!-- ({{$kurirPengiriman}}) -->
                            </div>
                            <div class="card-body">
                                    <input type="hidden" class="form-control @error('kurir') is-invalid @enderror" id="kurir" 
                                    name="kurir" value="{{$kurirPengiriman}}">
                                <div class="col-12 mb-3">
                                    <select name="ongkir" class="form-control" id="ongkir"  selected="selected">
                                        <option value="0" >Pilih Jenis Pengiriman</option>
                                        @foreach($d as $des)
                                        <option value="{{$des["cost"][0]["value"]}}" >{{$des["service"]}} * Rp.{{number_format($des["cost"][0]["value"])}} * {{$des["cost"][0]["etd"]}} Hari</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="card card-solid  ml-2">
                            <div class="card-header"style="background-color:#009688 ">
                            <h4 style="color:#ffff"><strong>Pembayaran</strong></h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    @foreach($met_bayar as $mp)
                                    <div class="col-sm-10">
                                        <table class="table table-striped stacktable"><tr> <td><input type="radio" name="metode_pembayaran" value="{{$mp->nama_bank}} - {{$mp->no_rek}} - {{$mp->nama_pemilik}}" id="metode_pembayaran" ></td> <td>{{$mp->nama_bank}}</td> <td>{{$mp->no_rek}}</td>  <td>{{$mp->nama_pemilik}}</td>  </tr></table>  
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 ">
                        <div class="card card-solid  mt-3 ml-2 mr-2">
                            <div class="card-header"style="background-color:#009688 ">
                            <h4 style="color:#ffff"><strong>Daftar Belanja</strong></h3>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped stacktable">
                                <thead style="background-color:#009688">
                                    <tr>
                                        <th>Toko</th>
                                        <th>Produk</th>
                                        <th>Harga</th>
                                        <th>Jumlah</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($keranjang as $ker)
                                    <tr>
                                        <td>{{$ker->nama_toko}}</td>
                                        <td>{{$ker->nama_produk}}</td>
                                        <td>Rp.{{number_format($ker->harga)}}</td>
                                        <td>{{$ker->jumlah}}</td>
                                        <td id="subTotal">Rp.{{number_format($ker->total)}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                                </table>
                                <div class="col-6 mt-3 float-right">
                                    <div class="table-responsive">
                                        <table class="total table stacktable ">
                                            <tr>
                                                <th>Total Belanja</th>
                                                <td>:</td>
                                                <td id="totbel" onkeyup="sum();">Rp.{{number_format($keranjang->sum('total'))}}</td>
                                            </tr>
                                            <tr>
                                                <th>Biaya Ongkir </th>
                                                <td>:</td>
                                                <td id="tampil" onkeyup="sum();">Rp.0</td>
                                            </tr>
                                            <tr>
                                                <th>Biaya Admin </th>
                                                <td>:</td>
                                                <td id="pajak">Rp.{{number_format($adminFree->persentase*($keranjang->sum('total'))/100)}}</td>
                                            </tr>
                                            <tr>
                                                <th>Total Bayar </th>
                                                <td>:</td>
                                                    <td id="totbay" onkeyup="sum();">Rp.{{number_format($adminFree->persentase*($keranjang->sum('total'))/100+($keranjang->sum('total')))}}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>    
                        <button type="submit" class="btn btn-success col-12 mb-3">Order</button>
 
                    </div>
                </div>
            </div>
        </form>
    </div>

    
</div>
@stop
@section('js')
<script>
    $('#ongkir').on('change',function(){

        var ongkir = document.getElementById("ongkir").value;
        var jml = {{$jmlToko}};
        var pajak = {{$adminFree->persentase*($keranjang->sum('total'))/100}};
        var totBeli = {{$keranjang->sum('total')}};
        var totBayar = jml*ongkir+pajak+totBeli;

        document.getElementById("tampil").innerHTML=jml + " x Rp. " + ongkir + " = Rp. " + jml*ongkir;
        document.getElementById("totbay").innerHTML = "Rp. " + totBayar;
    });

  
</script>
@stop

