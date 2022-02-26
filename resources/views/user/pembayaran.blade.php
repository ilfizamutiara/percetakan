@extends('layouts.costumer')

@section('title','Form Pembayaran')

@section('content')
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Pembayaran</li>
            </ol>
          </div>
        </div>
        
      </div><!-- /.container-fluid -->
   </section>
<div class="col-lg-12" align="center">
<div class="content">
<div class="card card-info card-outline" style="max-width: 60%; ">
        <div class="col-12">
        <div class="card-header">
            <h1 class="mt-3">Konfirmasi Pembayaran</h1>
        </div>
            <form method="POST" action="{{ url('user/pembayaran',$pesanan->id_pesanan) }}" align="left" enctype="multipart/form-data" > 
                @csrf
                <div class="card-header">
                <div class="card-body">
                <div class="col-6 mt-3">
                    <label for="metode_pembayaran" >Rekening</label>
                    <input type="text" class="form-control @error('metode_pembayaran') is-invalid @enderror" id="metode_pembayaran" 
                     name="metode_pembayaran" value="{{$pesanan->metode_pembayaran}} "readonly>
                    @error('id_pesanan')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-6 mt-3">
                    <label for="id_pesanan" >Kode Pesanan</label>
                    <input type="text" class="form-control @error('id_pesanan') is-invalid @enderror" id="id_pesanan" 
                     name="id_pesanan" value="{{$pesanan->id_pesanan}}" readonly>
                    @error('id_pesanan')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-6 mt-3">
                    <label for="total_bayar" >Total Tagihan</label>
                    <input type="text" class="form-control @error('total_bayar') is-invalid @enderror" id="total_bayar" 
                     name="total_bayar" value="Rp.{{number_format($pesanan->total_bayar)}}"readonly>
                    @error('total_bayar')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-6 mt-3">
                    <label for="bukti_bayar" >Bukti Pembayaran</label>
                    <input type="file" class="form-control @error('bukti_pembayaran') is-invalid @enderror" id="bukti_bayar" 
                    name="bukti_bayar"/>
                    @error('bukti_bayar')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                
                <button type="submit" class="btn btn-success float-right" >Proses<div class="ripple-container"></div></button>
            </form>
            </div>
        </div>
    </div>
</div>
</div>

@endsection 