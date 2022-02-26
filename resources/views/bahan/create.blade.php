@extends('layouts.admin')

@section('title','form bahan')

@section('content')
<div class="content">
<div class="card card-info card-outline">
        <div class="col-12">
        <div class="card-header">
            <h6 class="mt-3">form tambah bahan</h6>
        </div>
            <form method="POST" action="/bahan"> 
                @csrf</br>
                <div class="col-6">
                    <label for="bahan" >Bahan Produk</label>
                    <input type="text" class="form-control @error('bahan') is-invalid @enderror" id="bahan" 
                placeholder="Masukkan Bahan Produk" name="bahan" value="{{old('bahan')}}">
                    @error('bahan')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div></br>
                
                <button type="submit" class="btn btn-primary float-right my-3">Proses<div class="ripple-container"></div></button>
            </form>
            </div>
        </div>
    </div>
</div>

@endsection 