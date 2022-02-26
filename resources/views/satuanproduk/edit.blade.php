@extends('layouts.admin')

@section('title','Form Edit Data Produk')

@section('content')
<div class="content">
<div class="card card-info card-outline">
        <div class="col-12">
        <div class="card-header">
            <h1 class="mt-3">Form Edit Data Produk </h1>
        </div>
            <form method="POST"  action="{{ url('/satuanproduk', $satuan->id_satuan_produk) }}"> 
                @csrf
                <div class="card-header">
                <div class="card-body">
                <div class="col-6">
                    <label for="satuan" >Satuan Produk</label>
                    <input type="text" class="form-control @error('satuan') is-invalid @enderror" id="satuan" 
                    placeholder="Masukkan Satuan Produk" name="satuan" value="{{$satuan->satuan}}">
                    @error('satuan')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div></br>
               
                
                <button type="submit" class="btn-primary my-3">Proses</button>
            </form>
            </div>
        </div>
    </div>
</div>

@endsection 