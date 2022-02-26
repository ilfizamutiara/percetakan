@extends('layouts.admin')

@section('title','form satuan')

@section('content')
<div class="content">
<div class="card card-info card-outline col-12">
        <div class="col-lg-12 ">
        <div class="card-header">
            <h1 class="mt-3">form tambah satuan</h1>
        </div>
            <form method="POST" action="/satuanproduk"> 
                @csrf
                <div class="col-6 mt-3">
                    <label for="satuan" >Satuan Produk</label>
                    <input type="text" class="form-control @error('satuan') is-invalid @enderror" id="satuan" 
                    placeholder="Masukkan Satuan Produk" name="satuan" value="{{old('satuan')}}">
                    @error('satuan')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div></br>
                
                <button type="submit" class="btn btn-block bg-gradient-primary col-6 mb-3 float-center ">Proses<div class="ripple-container"></div></button>
            </form>
            </div>
        </div>
    </div>
</div>

@endsection 