@extends('layouts.costumer')
@section('content')
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{$dt->nama_toko}}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">E-commerce</li>
            </ol>
          </div>
        </div>
        
      </div><!-- /.container-fluid -->
   </section>
<div class="col-lg-12" align="center">
<section class="content" >
      <!-- Default box -->
      <div class="card card-solid col-lg-12"  style="max-width: 80%; align: center">
        <div class="card-body">
          <div class="row">
            <div class="col-5 col-sm-5">
              <h3 class="d-inline-block d-sm-none"></h3>

              <div class="col-8">
                <img class="img-thumbnail" src="{{ asset('/public/uploads/'.$detail->gambar) }}"  width="270px" height="350px"/>
              </div>
            </div>
            <div class="col-12 col-sm-6" align="left">
            <h6 class="my-3"><b>Harga : </b> Rp.{{$detail->harga}}/{{$detail->satuan}}</h6>
            <form method="POST" action="{{ route('tambahkeranjang') }}" >
            @csrf
            <div class="col-6">
                <input type="hidden" class="form-control @error('id_produk') is-invalid @enderror" id="id_produk" 
                 name="id_produk" value="{{$detail->id_produk}}">
                @error('id_produk')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div></br>
            <div class="col-6">
                <label for="harga" ></label>
                <input type="hidden" class="form-control @error('harga') is-invalid @enderror" id="harga" 
                 name="harga" value="{{$detail->harga}}">
                @error('harga')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div></br>
            <div class="col-6">
                <label for="jumlah" >Jumlah</label>
                <input type="text" class="form-control @error('jumlah') is-invalid @enderror" id="jumlah" 
                 name="jumlah" value="{{old('jumlah')}}">
                @error('jumlah')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div></br>
            <div class="col-6">
                <label for="ukuran" >Ukuran</label>
                <input type="text" class="form-control @error('ukuran') is-invalid @enderror" id="ukuran" 
                 name="ukuran" value="{{old('ukuran')}}">
                @error('ukuran')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div></br>
            <button type="submit" class="btn btn-primary ">Proses</button>

            </form>
          </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>

</div>
@endsection