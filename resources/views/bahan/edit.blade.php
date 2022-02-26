@extends('layouts.admin')

@section('title','Form Edit Data Produk')

@section('content')
<div class="content">
<div class="card card-info card-outline">
        <div class="col-12">
        <div class="card-header">
            <h1 class="mt-3"> Edit Data Bahan Produk </h1>
        </div>
            <form method="POST"  action="{{ url('/bahan', $bahan->id_bahan) }}"> 
                @csrf
                <div class="card-header">
                <div class="card-body">
                <div class="col-6">
                    <label for="bahan" >Bahan Produk</label>
                    <input type="text" class="form-control @error('bahan') is-invalid @enderror" id="bahan" 
                     name="bahan" value="{{$bahan->bahan}}">
                    @error('bahan')
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