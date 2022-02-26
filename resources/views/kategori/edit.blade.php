@extends('layouts.admin')

@section('title','Form Edit Kategori Produk')

@section('content')
<div class="content">
<div class="card card-info card-outline">
        <div class="col-12">
        <div class="card-header">
            <h1 class="mt-3"> Edit Data Kategori Produk </h1>
        </div>
            <form method="POST"  action="{{ url('/kategori', $kategori->id_kategori) }}"> 
                @csrf
                <div class="card-header">
                <div class="card-body">
                <div class="col-6">
                    <label for="kategori" >Kategori Produk</label>
                    <input type="text" class="form-control @error('kategori') is-invalid @enderror" id="kategori" 
                     name="kategori" value="{{$kategori->kategori}}">
                    @error('kategori')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div></br>
               
                
                <button type="submit" class="btn btn-primary ">Proses</button>
            </form>
            </div>
        </div>
    </div>
</div>

@endsection 