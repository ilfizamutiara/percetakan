@extends('layouts.admin')

@section('title','Form Tambah Data Percetakan')

@section('content')
<div class="content">
<div class="card card-info card-outline">
        <div class="col-12">
        <div class="card-header">
            <h1 class="mt-3">Form Tambah Akun Percetakan </h1>
        </div>
            <form method="POST" action="/percetakan"  enctype="multipart/form-data"> 
                @csrf
                <div class="card-header">
                <div class="card-body">
                <div class="col-6">
                    <label for="nama_toko" >Nama Toko</label>
                    <input type="text" class="form-control @error('nama_toko') is-invalid @enderror" id="nama_toko" 
                    placeholder="Masukkan Nama Toko" name="nama_toko" value="{{old('nama_toko')}}">
                    @error('nama_toko')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div></br>
                <div class="col-6">
                    <label for="username" >Username </label>
                    <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" 
                    placeholder="Masukkan Username " name="username" value="{{old('username')}}">
                    @error('username')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div></br>
                <div class="col-6">
                    <label for="email" >Email</label>
                    <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" 
                    placeholder="Masukkan email" name="email" value="{{old('email')}}">
                    @error('email')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div></br>
                <div class="col-6">
                    <label for="jabatan" >Alamat Toko </label>
                    <input type="text" class="form-control @error('alamat_toko') is-invalid @enderror" id="alamat_toko" 
                    placeholder="Masukkan Alamat Toko " name="alamat_toko" value="{{old('alamat_toko')}}">
                    @error('alamat_toko')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div></br>
                <div class="col-6">
                    <label for="kode_pos" >Kode Pos</label>
                    <input type="text" class="form-control @error('kode_pos') is-invalid @enderror" id="kode_pos" 
                    placeholder="Masukkan Kode Pos " name="kode_pos" value="{{old('kode_pos')}}">
                    @error('kode_pos')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div></br>
                <div class="col-6">
                    <label for="no_telp" >No Telp</label>
                    <input type="text" class="form-control @error('no_telp') is-invalid @enderror" id="no_telp" 
                    placeholder="Masukkan No Telp" name="no_telp" value="{{old('no_telp')}}">
                    @error('no_telp')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div></br>
                <div class="col-6">
                    <label for="foto" >Foto</label>
                    <input type="file" class="form-control @error('foto') is-invalid @enderror" id="foto" 
                    name="foto"/>
                    @error('foto')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div></br>
                <div class="col-6">
                    <label for="password" >Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" 
                    placeholder="Masukkan password" name="password" value="{{old('password')}}">
                    @error('password')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div></br>

                
                <div class="col-6">
                    <label for="password_confirmation" >Confirm Password</label>
                    <input type="password" class="form-control @error('password_confirmation') is-invalid && {{old('Confirm Password')}}=={{old('password')}} @enderror" 
                    id="password_confirmation" 
                    placeholder="Masukkan password" name="password_confirmation" value="{{old('Confirm Password')}}" >
                    @error('password_confirmation')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div></br>
                
                
                <!--
                <div class="col-6">
                    <label for="password_confirmation" value="{{ __('Confirm Password') }}">Konfirmasi Password</label>
                    <input id="password_confirmation" class="block mt-1 w-full form-control" type="password" name="password_confirmation" required autocomplete="new-password" />
                </div>
                </div>
                -->
                
                <button type="submit" class="btn btn-block bg-gradient-primary btn-xs">Proses<div class="ripple-container"></div></button>
            </form>
            </div>
        </div>
    </div>
</div>

@endsection 