@extends('layouts.costumer')
@section('content')
<div class="container"></br>

    <div class="col-lg-12" align="center">
      @foreach($daftartoko as $dt)
      {{csrf_field()}}
                <div class="card card-info card-outline" style="max-width: 70%; font-family:Apple Color Emoji;" >
                <div class="row no-gutters">
                    <div class="col-md-4"></br>
                    @if($dt->foto == null)
                    <img class="img-thumbnail" src="{{ asset('/dist/img/toko.png') }}" width="300"/>
                    @else
                    <img class="img-thumbnail" src="{{ asset('/upload/percetakan-foto/'.$dt->foto) }}" width="300"/>
                    @endif
                    </div>
                    <div class="col-md-8">
                        <div class="card-body" align="left">
                        <h5 class=" card-text col-12 float"><strong>{{ $dt->nama_toko}}</strong></h5>
                          <h6 class="card-text col-12 float" ></br>{{$dt->alamat_toko}}</h6>
                          <h6 class="card-text col-12 float" >{{$dt->email}}</h6>
                          <h6 class="card-text col-12 float" >{{$dt->no_telp}}</h6></br>
                          <a href="{{ url("/user/lihatproduk", $dt->id_percetakan) }}" class="btn btn-primary float-right">kunjungi</a>
                        </div>
                    </div>
                </div>
                </div>
            @endforeach
          </div>
    </div>
    
    
<div>

@endsection

