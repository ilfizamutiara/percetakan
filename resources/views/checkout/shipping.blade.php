@extends('layouts.costumer')
@section('content')
<div class="content">
    <!-- <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
            </div>
            <div class="col-sm-12 mt-3">
                <ol class="breadcrumb ">
                    <li class="breadcrumb-item float-right"><a  href="{{ url('/home') }}">Home</a></li>
                    <li class="breadcrumb-item float-right active">checkout</li>
                </ol>
            </div>
        </div>
    </div> -->
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
                            <div class="card-header">
                                <h3><strong>Alamat</strong></h3>
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
                                <select name="ongkir" class="form-control" id="ongkir"  selected="selected">
                                    <option value="0" >Pilih Jenis Pengiriman</option>
                                    @foreach($d as $des)
                                    <option value="{{$des["cost"][0]["value"]}}" >{{$des["service"]}} * Rp.{{number_format($des["cost"][0]["value"])}} * {{$des["cost"][0]["etd"]}} Hari</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="card card-solid  ml-2">
                            <div class="card-header">
                                <h3><strong>Pembayaran</strong></h3>
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
                            <div class="card-header">
                                <h3><strong>Daftar Belanja</strong></h3>
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
                                                <th>Pajak </th>
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

    // $(".total").keyup(function(){
    //     var totbel = parseInt($("#totbel").val())
    //     var pajak = parseInt($("#pajak").val())
    //     // var ongkir = parseInt($("#biongkir").val())

    //     var totbay = totbel + pajak ;
    //     $("#totbay").attr("value",totbay)
    // });

            // $(document).ready(function(){
            //     total();
            //     $('#totbel').on('change',(function() {
            //         total();
            //     });
            //     $('#tampil').on('change',(function() {
            //         total();
            //     });   
            //     $('#pajak').on('change',(function() {
            //         total();
            //     });               
            // });

            // function total()
            // {
            //     var sum = 0;
            //     $('.total').each(function() {
            //         var totbel = $(this).find('#totbel').val();
            //         var ongkir = $(this).find('#tampil').val();
            //         var pajak = $(this).find('#pajak').val();
            //         var amount = (totbel+ongkir+pajak)
            //         sum+=amount;
            //         $(this).find('#totbay').text(''+amount);
            //     });
            //     $('.total').text(sum);
            // }

    // function sum(){
    //     var totbel = parseInt(document.getElementById('totbel')).value;
    //     var   ongkir = parseInt(document.getElementById('ongkir')).value;
    //     var   pajak = parseInt(document.getElementById('pajak')).value;
            
    //     var totbayar = totbel + ongkir + pajak;
    //     document.getElementById('totbay') = totbayar;
    // }

//     $('#ongkir').on('change',function(){

// var ongkir = document.getElementById("ongkir").value
//     document.getElementById("tampil").innerHTML="Rp. "+ongkir


// });

//     var totbel = document.getElementById("totbel"),
//             ongkir = document.getElementById("ongkir"),
//             pajak = document.getElementById("pajak").value
            
//         var totbay = totbel + ongkir + pajak;
    // $('#ongkir').on('click',function(){
    //     var ongkir = parseInt($(this).attr("ongkir"));
    //     $('#tampil').text('Rp. '+format_rupiah(ongkir));
    // });
        
                
    // function format_rupiah(ongkir){
    //     var  reverse = ongkir.toString().split('').reverse().join(''),
    //          ribuan = reverse.match(/\d{1,3}/g);
    //      return ribuan	= ribuan.join('.').split('').reverse().join('');
    // }
</script>
@stop

