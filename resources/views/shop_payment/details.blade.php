@extends('layouts.admin')

@section('title','Akun BANK')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col">
      <div class="card card-primary card-outline">
        <div class="card-header">
        <form method="get" action="{{ url('/shop_payment/details',$percetakan->id_percetakan)  }}" >
              <div class="row "align-center>
                <div class="col-4">
                    <label for="admin">Start Date</label>
                    <input class="form-control" type="date" value="{{$tgl1}}" name="tgl1">
                </div>

                <div class="col-4">
                    <label for="admin">End Date</label>
                    <input class="form-control" type="date" value="{{$tgl2}}" name="tgl2">
                </div>                           
                
                <div class="col-2 pt-2 mt-4">
                  
                    <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
              </div>
            </form>
            <!-- <form class="form-group" action="{{ route('cetakLaporanPenjualan') }}" method="GET" enctype="multipart/form-data" style="float: right">
              @csrf
              <div class="form-group">
                   <input hidden="" class="form-control" type="date" value="{{$tgl1}}" name="tgl1">
              </div>
               <div class="form-group">
                   <input hidden="" class="form-control" type="date" value="{{$tgl2}}" name="tgl2">
               </div>                            
               <div class="text">
                   <button type="submit" class="btn btn-success">Cetak</button>
               </div>
            </form> -->
          </div>
        <div class="card-body ">
        <h2 class=" text-center"> <strong>Laporan Penjualan</strong></h2>
          <p class="text-center " >Periode : {{Carbon\Carbon::parse($tgl1)->translatedFormat('j F Y')}} - {{Carbon\Carbon::parse($tgl2)->translatedFormat(' j F Y')}}</p>
          <div class="row">
            <div class="col-12 mt-5">
              <div class="table-responsive">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Tanggal</th>
                      <th>ID Pesanan</th>
                      <th>Subtotal</th>
                      <th>Ongkir</th>
                      <th>Total</th>
                    </tr>
                  </thead>
                  @foreach($pesanan as $data)
                  <tbody>
                      <td scope="row">{{$loop->iteration}}</td>
                      <td>{{Carbon\Carbon::parse($data->created_at)->translatedFormat(' j F Y')}}</td>
                      <td>{{$data->id_pesanan}}</td>
                      <td>Rp.{{number_format($data->total_harga)}}</td>
                      <td>Rp.{{number_format($data->ongkir)}}</td>
                      <td>Rp.{{number_format(($data->total_harga)+($data->ongkir))}}</td> 
                  </tbody>
                  @endforeach
                  <thead>
                    <tr>
                      <th></th>
                      <th>Total</th>
                      <th>Rp.{{number_format($pesanan->sum('total_harga'))}}</th>
                      <th>Rp.{{number_format($pesanan->sum('ongkir'))}}</th>
                      <th>Rp.{{number_format(($pesanan->sum('total_harga'))+($pesanan->sum('ongkir')))}}</th> 
                    </tr>
                  </thead>
                </table>
              </div>
            </div>
          </div>
          <div class="row float-right">
          <div class="col col-lg-12 col-md-12 mt-3 ">
              <table class="table table-bordered">
                <tbody>
                  <tr>
                    <td>Total Penjualan</td>
                    <td>Rp.{{number_format($pesanan->sum('total_harga'))}}</td>
                  </tr>
                  <tr>
                    <td>Total Transaksi</td>
                    <td>{{$pesanan->count('id_pesanan')}} transaksi</td>
                  </tr>
                  <!-- <tr>
                    <td>Total Item Terjual</td>
                    <td>{{$detail->sum('jumlah')}} item</td>
                  </tr> -->
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection