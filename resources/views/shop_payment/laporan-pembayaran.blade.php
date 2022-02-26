@extends('layouts.admin')

@section('title','Laporan Pembayaran')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col">
      <div class="card card-primary card-outline">
        <div class="card-header">
        <form method="get" action="{{ url('shop_payment/laporan-pembayaran')  }}" >
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
            <form class="form-group" action="{{ url('shop_payment/cetak-laporanPembayaran')  }}" method="GET" enctype="multipart/form-data" style="float: right">
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
            </form>
          </div>
        <div class="card-body ">
          <div class="row">
              <div class="col-12 mt-5">
                <div class="table-responsive">
                  <table class="table table-bordered">
                  <p>Periode : {{Carbon\Carbon::parse($tgl1)->translatedFormat('j F Y')}} - {{Carbon\Carbon::parse($tgl2)->translatedFormat(' j F Y')}}</p>
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Tanggal <i class="nav-icon fas fa-sort"></i></th>
                        <th>Nama Toko</th>
                        <th>Rekening Pengirim</th>
                        <th>Rekening Penerima</th>
                        <th>Jumlah Transfer</th>
                        <th>Bukti Pembayaran</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($shop_pay as $sp )
                      <tr>
                          <td scope="row">{{$loop->iteration}}</td>
                          <td>{{date('d-m-Y', strtotime($sp->created_at))}}</td>
                          <td>{{$sp->nama_toko}}</td>
                          <td>{{$sp->no_rek_pengirim}}</td>
                          <td>{{$sp->no_rek_penerima}}</td>
                          <td>{{$sp->jml_transfer}}</td>
                          <td><img class="img-thumbnail" src="{{ asset('/upload/bukti-pembayaran/'.$sp->bukti_transfer) }}" width="150"/></td>
                          <td>{{($sp->status)}}</td>
                      </tr>
                      @endforeach
                      </tbody>
                      
                  </table>
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