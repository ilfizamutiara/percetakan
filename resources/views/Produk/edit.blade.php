@extends('layouts.admin')

@section('title','Form Edit Data Produk')

@section('content')
<div class="content">
<div class="card card-info card-outline">
        <div class="col-12">
        <div class="card-header">
            <h1 class="mt-3">Form Edit Data Produk </h1>
        </div>
            <form method="POST"  action="{{ url('/produk', $produk->id_produk) }}" enctype="multipart/form-data"> 
                @csrf
                <div class="card-header">
                <div class="card-body">
                <div class="col-6 mt-3">
                    <label for="nama_produk" >Nama  Produk</label>
                    <input type="text" class="form-control @error('nama_produk') is-invalid @enderror" id="nama_produk" 
                    name="nama_produk" value="{{$produk->nama_produk}}">
                    @error('nama_produk')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-6 mt-3">
                    <label for="id_kategori" > Kategori</label>
                    <select name="id_kategori" class="form-control">
                        <option value="">--- pilih ---</option>
                        @foreach($kategori as $kt)
                            <option value="{{$kt->id_kategori}}" {{$kt->id_kategori == $produk->id_kategori ? 'selected' : ''}}>
                            {{$kt->kategori}}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-6 mt-3">
                    <label for="id_satuan_produk" >Satuan Produk</label>
                    <select name="id_satuan_produk" class="form-control">
                        <option value="">--- pilih ---</option>
                        @foreach($satuan as $sat)
                            <option value="{{$sat->id_satuan_produk}}" {{$sat->id_satuan_produk == $produk->id_satuan_produk ? 'selected' : ''}}>
                            {{$sat->satuan}}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-6 mt-3">
                    <label for="id_bahan" >Bahan Produk</label>
                    <select name="id_bahan" class="form-control">
                        <option value="">--- pilih ---</option>
                        @foreach($bahan as $bn)
                            <option value="{{$bn->id_bahan}}" {{$bn->id_bahan == $produk->id_bahan ? 'selected' : ''}}>
                            {{$bn->bahan}}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-6 mt-3">
                    <label for="harga" >Harga </label>
                    <input type="text" class="form-control @error('harga') is-invalid @enderror" id="harga" 
                     name="harga" value="{{$produk->harga}}">
                    @error('harga')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-6 mt-3">
                    <label for="stok" >Stok </label>
                    <input type="text" class="form-control @error('stok') is-invalid @enderror" id="stok" 
                     name="stok" value="{{$produk->stok}}">
                    @error('stok')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-6 mt-3">
                    <label for="estimasi_pengerjaan" >Estimasi </label>
                    <input type="text" class="form-control @error('estimasi_pengerjaan') is-invalid @enderror" id="estimasi_pengerjaan" 
                     name="estimasi_pengerjaan" value="{{$produk->estimasi_pengerjaan}}">
                    @error('estimasi_pengerjaan')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-6 mt-3">
                    <label for="keterangan" >Keterangan Produk</label>
                    <textarea class="form-control " id="keterangan" 
                    name="keterangan" value="{{$produk->keterangan}}"></textarea>
                </div>

                <div class="col-6 mt-3">
                    <label for="gambar" >Gambar</label>
                    <div class="input-group">
                        <img class="img-gambar" src="{{ asset('/public/uploads/'.$produk->gambar) }}" width="150px"/>
                </div>  
                <div class="col-6 mt-3">
                    <input type="file" class="form-control @error('gambar') is-invalid @enderror" id="gambar" 
                    name="gambar"/>
                    @error('gambar')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                
                <button type="submit" class="btn-primary my-3">Proses</button>
            </form>
            </div>
        </div>
    </div>
</div>

@endsection 