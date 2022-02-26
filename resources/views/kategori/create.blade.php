@extends('layouts.admin')

@section('title','Kategori')

@section('content')
<div class="content">
<div class="card card-info card-outline">
        <div class="col-12">
        <div class="card-header">
            <h6 class="mt-3">Tambah Kategori</h6>
        </div>
            <form method="POST" action="/kategori"> 
                @csrf</br>
                <div class="col-6">
                    <label for="kategori" >Kategori Produk</label>
                    <input type="text" class="form-control @error('kategori') is-invalid @enderror" id="kategori" 
                placeholder="Masukkan Kategori Produk" name="kategori" value="{{old('kategori')}}">
                    @error('kategori')
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