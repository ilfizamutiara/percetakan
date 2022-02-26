@extends('layouts.admin')

@section('title','Laporan Pembayaran')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col">
      <div class="card card-primary card-outline">
        <div class="card-header">
          <h3>Penjualan Toko</h3>
        <form method="get" action="{{ url('shop_payment/penjualan-toko')  }}" >
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
            <!-- <form class="form-group" action="{{ url('shop_payment/cetak-laporanPenjualanToko')  }}" method="GET"  style="float: right">
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
          <div class="row">
              <div class="col-12 mt-5">
                  <p>{{Carbon\Carbon::parse($tgl1)->translatedFormat('j F Y')}} - {{Carbon\Carbon::parse($tgl2)->translatedFormat(' j F Y')}}</p>
                    <div class="row" style="padding-left: 18px;">
                      <div>
                      <table class="table table-bordered" style="padding:0;">
                      <thead>
                      <th>No</th>
                        <th>Nama Toko</th>
                      </thead>
                      <tbody>
                      @foreach($percetakan as $toko )
                      <tr>
                      <td scope="row">{{$loop->iteration}}</td>
                          <td> <a href="{{url('shop_payment/details',$toko->id_percetakan)}}">{{$toko->nama_toko}}</a> </td>
                      
                          </tr>
                    @endforeach
                      </tbody>
                      </table>
                      </div>
                      <div>
                        <table class="table table-bordered" style="padding:0;">
                        <thead>
                      <th>Total transaksi</th>
                      </thead>
                      <tbody>
                      @foreach($arrTotTrans as $totTrans)
                    <tr>
                          <td>{{$totTrans}}</td>
                    </tr>
                    @endforeach
                      </tbody>
                        </table>
                      </div>
                      <div>
                        <table class="table table-bordered" style="padding:0;">
                        <thead>
                      <tr>
                        <th>Total Pembayaran</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($arrTotBayar as $totBayar)
                    <tr>
                          <td>Rp.{{number_format($totBayar)}}</td>
                    </tr>
                    @endforeach
                    
                      </tbody>
                      
                  </table>
                      </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row float-right">
          <div class="col col-lg-12 col-md-12 mt-3 ">
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection