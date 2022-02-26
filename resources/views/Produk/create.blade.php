@extends('layouts.admin')

@section('title','Form Tambah Data Produk')

@section('content')
<div class="content">
<div class="card card-info card-outline">
        <div class="col-12">
        <div class="card-header">
            <h1 class="mt-3">Form Tambah Data Produk </h1>
        </div>
            <form method="POST" action="/produk" enctype="multipart/form-data"> 
                @csrf

                <div class="card-header">
                <div class="card-body">
                <div class="col-6 mt-3">
                    <input type="hidden" class="form-control @error('id_rek') is-invalid @enderror" id="id_rek" 
                    name="id_rek" value="{{old('id_rek')}}">
                    @error('id_rek')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-6 mt-3">
                    <input type="hidden" class="form-control @error('id_percetakan') is-invalid @enderror" id="id_percetakan" 
                    name="id_percetakan" value="{{Auth::user()->id}}">
                    @error('id_percetakan')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-6 mt-3">
                    <label for="nama_produk" >Nama Produk</label>
                    <input type="text" class="form-control @error('nama_produk') is-invalid @enderror" id="nama_produk" 
                    placeholder="Masukkan Nama Produk" name="nama_produk" value="{{old('nama_produk')}}">
                    @error('nama_produk')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-6 mt-3">
                    <label for="id_satuan_produk" >Satuan</label>
                    <select name="id_satuan_produk" class="form-control">
                        <option value="">--- pilih ---</option>
                        @foreach($satuan as $satuan)
                            <option value="{{$satuan->id_satuan_produk}}">{{$satuan->satuan}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-6 mt-3">
                    <label for="id_kategori" >Kategori</label>
                    <select name="id_kategori" class="form-control">
                        <option value="">--- pilih ---</option>
                        @foreach($kategori as $kt)
                            <option value="{{$kt->id_kategori}}">{{$kt->kategori}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-6 mt-3">
                    <label for="id_bahan" >Bahan</label>
                    <select name="id_bahan" class="form-control">
                        <option value="">--- pilih ---</option>
                        @foreach($bahan as $bahan)
                            <option value="{{$bahan->id_bahan}}">{{$bahan->bahan}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-6 mt-3">
                    <label for="harga" >Harga </label>
                    <input type="text" class="form-control @error('harga') is-invalid @enderror" id="harga" 
                    placeholder="Masukkan Harga " name="harga" value="{{old('harga')}}">
                    @error('harga')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-6 mt-3">
                    <label for="stok" >Stok </label>
                    <input type="text" class="form-control @error('stok') is-invalid @enderror" id="stok" 
                    placeholder="Masukkan Stok " name="stok" value="{{old('stok')}}">
                    @error('stok')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-6 mt-3">
                    <label for="berat" >Berat </label>
                    <input type="text" class="form-control @error('berat') is-invalid @enderror" id="berat" 
                    placeholder="Masukkan berat " name="berat" value="{{old('berat')}}">
                    @error('berat')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-6 mt-3">
                    <label for="estimasi_pengerjaan" >Estimasi </label>
                    <input type="text" class="form-control @error('estimasi_pengerjaan') is-invalid @enderror" id="estimasi_pengerjaan" 
                    placeholder="Masukkan Estimasi Pengerjaan " name="estimasi_pengerjaan" value="{{old('estimasi_pengerjaan')}}">
                    @error('estimasi_pengerjaan')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-6 mt-3">
                    <label for="keterangan" >Keterangan Produk</label>
                    <textarea class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" 
                    placeholder="Masukkan Keterangan Produk " name="keterangan" value="{{old('keterangan')}}"></textarea>
                    @error('keterangan')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>

                <div class="col-6 mt-3">
                    <label for="gambar" >Gambar</label>
                    <input type="file" class="form-control @error('gambar') is-invalid @enderror" id="gambar"name="gambar"/>
                    @error('gambar')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                
                <button type="submit" class="btn btn-primary float-right">Proses<div class="ripple-container"></div></button>
            </form>
            </div>
        </div>
    </div>
</div>

@endsection 