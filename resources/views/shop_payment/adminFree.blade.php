@extends('layouts.admin')

@section('title','Akun BANK')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col">
      <div class="card card-primary card-outline">
        <div class="card-header">
        <form method="get" action="{{ route('shop_payment/adminFree')  }}" >
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
            
          </div>
        <div class="card-body ">
        <h2 class=" text-center"> <strong>Biaya Admin</strong></h2>
          <p class="text-center " >Periode : {{Carbon\Carbon::parse($tgl1)->translatedFormat('j F Y')}} - {{Carbon\Carbon::parse($tgl2)->translatedFormat(' j F Y')}}</p>
          <div class="row">
            <div class="col-12 mt-5">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Tanggal</th>
                      <th>ID Pesanan</th>
                      <th>Biaya Penanganan</th>
                    </tr>
                  </thead>
                  @foreach($biayaAdmin as $biaya)
                  <tbody>
                      <td scope="row">{{$loop->iteration}}</td>
                      <td>{{Carbon\Carbon::parse($biaya->created_at)->translatedFormat('j F Y')}} </td>
                      <td>{{$biaya->id_pesanan}}</td>
                      <td>Rp.{{number_format($biaya->pajak)}}</td>
                  </tbody>
                  @endforeach
                  <thead>
                    <tr>
                      <th>Total</th>
                      <th></th>
                      <th></th>
                      <th>Rp.{{number_format($total->sum('pajak'))}}</th> 
                    </tr>
                  </thead>
                </table>
            </div>
          </div>
          <div class="row float-right">
         
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection