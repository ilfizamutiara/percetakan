@extends('layouts.admin')

@section('title','Form Edit Data Percetakan')

@section('content')
<div class="content">
<div class="card card-info card-outline">
        <div class="col-12">
        <div class="card-header">
            <h1 class="mt-3">Form Edit Data Percetakan</h1>
        </div>
            <form method="post" action="{{ url('percetakan', $user->id) }}"  enctype="multipart/form-data"> 
            @method('PUT')    
            @csrf
                <!-- @method('PUT') -->
                <div class="card-header">
                <div class="card-body">
                <div class="col-6">
                    <label for="nip" >Nama Toko </label>
                    <input type="text" class="form-control @error('nama_toko') is-invalid @enderror" id="nama_toko" 
                   name="nama_toko" value="{{$percetakan->nama_toko}}">
                    @error('nama_toko')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div></br>
                <div class="col-6">
                    <label for="username" >Username </label>
                    <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" 
                    name="username" value="{{$user->username}}">
                    @error('username')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div></br>
                <div class="col-6">
                    <label for="email" >Email</label>
                    <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" 
                     name="email" value="{{$user->email}}">
                    @error('email')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div></br>
                <div class="col-6">
                    <label for="no_telp" >No Telp</label>
                    <input type="text" class="form-control @error('no_telp') is-invalid @enderror" id="no_telp" 
                     name="no_telp" value="{{$percetakan->no_telp}}">
                    @error('no_telp')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div></br>
                <div class="col-6">
                    <label for="alamat_toko" >Alamat Toko </label>
                    <input type="text" class="form-control @error('alamat_toko') is-invalid @enderror" id="alamat_toko" 
                    name="alamat_toko" value="{{$percetakan->alamat_toko}}">
                    @error('alamat_toko')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div></br>
                <div class="col-6">
                    <label for="kode_pos" >Kode Pos </label>
                    <input type="text" class="form-control @error('kode_pos') is-invalid @enderror" id="kode_pos" 
                    name="kode_pos" value="{{$user->kode_pos}}">
                    @error('kode_pos')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div></br>
                <div class="col-6">
                    <label for="foto" >Gambar</label>
                    <div class="input-group">
                        <img class="img-gambar" src="{{ asset('/upload/percetakan-foto/'.$user->foto) }}" width="150px"/>
                </div></br>  
                <div class="col-6">
                    <input type="file" class="form-control @error('foto') is-invalid @enderror" id="foto" 
                    name="foto"/>
                    @error('foto')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div></br>
                <button type="submit" class="btn-primary my-3">Update</button>
            </form>
            </div>
        </div>
    </div>
</div>

@endsection 