@extends('layouts.admin')

@section('title','Transfer Percetakan')

@section('content')
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item "><a href="{{url('shop_payment')}}">Laporan Pembayaran</a></li>
            </ol>
          </div>
        </div>
        
      </div><!-- /.container-fluid -->
   </section>
<div class="col-lg-12" align="center">
<div class="content">
<div class="card card-info card-outline" style="max-width: 60%; align: center">
        <div class="col-12">
        <div class="card-header">
            <h1 class="mt-3">Transfer</h1>
        </div>
            <form method="POST" action="{{url('shop_payment/cek-pembayaran',$percetakan->id_percetakan)}}" align="left" enctype="multipart/form-data" > 
                @csrf
                <div class="card-header">
                <div class="card-body">
                <div class="col-6">
                    <input type="hidden" class="form-control @error('id_percetakan') is-invalid @enderror" id="id_percetakan" 
                     name="id_percetakan" value="{{$percetakan->id_percetakan}}">
                    @error('id_percetakan')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div></br>
                <div class="col-6">
                    <label for="no_rek_penerima" > Rekening Penerima</label>
                    <input type="text" class="form-control @error('no_rek_penerima') is-invalid @enderror" id="no_rek_penerima" 
                     name="no_rek_penerima" value="{{$percetakan->nama_bank}} - {{$percetakan->no_rek}} - {{$percetakan->nama_pemilik}}">
                    @error('no_rek_penerima')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div></br>
                <div class="col-6">
                    <label for="no_rek_pengirim" >Rekening Pengirim</label>
                    <input type="text" class="form-control @error('no_rek_pengirim') is-invalid @enderror" id="no_rek_pengirim" 
                     name="no_rek_pengirim" value="{{old('no_rek_pengirim')}}">
                    @error('no_rek_pengirim')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div></br>
                <div class="col-6">
                    <label for="jml_transfer" >Jumlah Transfer</label>
                    <input type="text" class="form-control @error('jml_transfer') is-invalid @enderror" id="jml_transfer" 
                     name="jml_transfer" value="Rp.{{number_format(($jml_tf->sum('total_harga'))+($jml_tf->sum('ongkir')))}}">
                    @error('jml_transfer')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div></br>
                <div class="col-6">
                    <label for="bukti_transfer" >Bukti Pembayaran</label>
                    <input type="file" class="form-control @error('bukti_transfer') is-invalid @enderror" id="bukti_transfer" 
                    name="bukti_transfer"/>
                    @error('bukti_transfer')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div></br>
                
                <button type="submit" class="btn btn-success float-right" >Proses<div class="ripple-container"></div></button>
            </form>
            </div>
        </div>
    </div>
</div>
</div>

@endsection 