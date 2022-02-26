@extends('layouts.admin')

@section('title','Akun BANK')

@section('content')
<div class="content">
<div class="card card-info card-outline">
        <div class="col-12">
        <div class="card-header">
            <h1 class="mt-3">Form Akun Bank </h1>
        </div>
            <form method="POST" action="/akunbank" > 
                @csrf

                <div class="card-header">
                <div class="card-body">
                <div class="col-6 mt-3">
                <div class="col-6 mt-3">
                    <input type="hidden" class="form-control @error('id_rek') is-invalid @enderror" id="id_rek" 
                    name="id_rek" value="{{old('id_rek')}}">
                    @error('id_rek')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                    <label for="id_bank" >Bank</label>
                    <select name="id_bank" class="form-control">
                        @foreach($bank as $bn)
                            <option value="{{$bn->id_bank}}">{{$bn->nama_bank}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-6 mt-3">
                    <label for="nama_pemilik" >Nama</label>
                    <input type="text" class="form-control @error('nama_pemilik') is-invalid @enderror" id="nama_pemilik" 
                     name="nama_pemilik" value="{{old('nama_pemilik')}}">
                    @error('nama_pemilik')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>

                <div class="col-6 mt-3 mb-3">
                    <label for="no_rek" >No Rekening </label>
                    <input type="text" class="form-control @error('no_rek') is-invalid @enderror" id="no_rek" 
                     name="no_rek" value="{{old('no_rek')}}">
                    @error('no_rek')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                
                <button type="submit" class="btn btn-primary ">Proses<div class="ripple-container"></div></button>
            </form>
            </div>
        </div>
    </div>
</div>

@endsection 