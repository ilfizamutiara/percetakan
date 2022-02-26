@extends('layouts.admin')

@section('title','Form Edit Data Produk')

@section('content')
<div class="content">
<div class="card card-info card-outline">
        <div class="col-12" width="50%" align="center">
        <div class="card-header">
            <h1 class="mt-3">Status Pesanan</h1>
        </div>
            <form method="POST" align="left" action="{{ url('/pesanan', $pesanan->id_pesanan) }}"> 
                @csrf
                <div class="card-header">
                <div class="card-body">
                <div class="col-6">
                    <label for="id_pesanan" >No Pesanan </label>
                    <input type="text" class="form-control @error('id_pesanan') is-invalid @enderror" id="id_pesanan" 
                     name="id_pesanan" value="{{$pesanan->id_pesanan}}" readonly>
                    @error('id_pesanan')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div></br>
                <div class="col-6">
                    <label for="no_resi" >No Resi</label>
                    <input type="text" class="form-control @error('no_resi') is-invalid @enderror" id="no_resi" 
                     name="no_resi" value="{{old('no_resi')}}" >
                    @error('id_pesanan')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div></br>

   
                <button type="submit" class="btn-success my-3">Kirim</button>
            </form>
            </div>
        </div>
    </div>
</div>

@endsection 