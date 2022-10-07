@extends('layouts.costumer')
@section('content')
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
        @foreach($detail as $dt)
          {{csrf_field()}}
          <div class="col-sm-6">
            
          </div>
          @endforeach
          <!-- <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">E-commerce</li>
            </ol>
          </div> -->
        </div>
        
      </div><!-- /.container-fluid -->
   </section>
<div class="col-lg-12" align="center">
<section class="content" >
      <!-- Default box -->
      <div class="card card-solid col-lg-12"  style="max-width: 80%; align: center">
        <div class="card-body">
          <div class="row">
            <div class="col-6 col-sm-5">
              <h5 class="my-3"></h5>
                <img class="img-thumbnail" src="{{ asset('/public/uploads/'.$dt->gambar) }}"  width="500px" height="350px"/>
            </div>
            @foreach($detail as $dt)
            {{csrf_field()}}
            <div class="col-12 col-sm-6" align="left">
              <h2 class="my-3">{{$dt->nama_toko}} </h2>
              <h4 class="my-3">{{$dt->nama_produk}} {{$dt->bahan}}</h4>
              <h4 class="my-3">Rp.{{number_format($dt->harga)}}/{{$dt->satuan}}</h4>
              <h6 class="my-3">{{$dt->estimasi_pengerjaan}} Pengerjaan</h6>
              <h6 class="my-3">stok : {{$dt->stok}}</h6>
              <h5 class="my-3">Deskripsi</h5>
              <p>{{$dt->keterangan}}</p>
              <form method="POST" action="/detailproduk" >
              @csrf
              <div class="row">
              <div class="col-6 ">
                  <input type="hidden" class="form-control @error('id_produk') is-invalid @enderror" id="id_produk" 
                  name="id_produk" value="{{$dt->id_produk}}">
                  @error('id_produk')
                      <div class="invalid-feedback">{{$message}}</div>
                  @enderror
              </div>
              <div class="col-6">
                  <label for="harga" ></label>
                  <input type="hidden" class="form-control @error('harga') is-invalid @enderror" id="harga" 
                  name="harga" value="{{$dt->harga}}">
                  @error('harga')
                      <div class="invalid-feedback">{{$message}}</div>
                  @enderror
              </div>
              <div class="col-6">
                  <label for="jumlah" >Jumlah</label>
                  <input type="number" class="form-control @error('jumlah') is-invalid @enderror" id="jumlah" 
                  name="jumlah" value="{{old('jumlah')}}">
                  @error('jumlah')
                      <div class="invalid-feedback">{{$message}}</div>
                  @enderror
              </div></br>
              @if($dt->id_kategori == 4)
              <div class="col-6">
                  <label for="ukuran" >Ukuran</label>
                  <input type="text" class="form-control @error('ukuran') is-invalid @enderror" id="ukuran" 
                  name="ukuran" value="{{old('ukuran')}}">
                  @error('ukuran')
                      <div class="invalid-feedback">{{$message}}</div>
                  @enderror
              </div>
              @elseif($dt->id_kategori == 6)
              <div class="col-6">
                  <label for="ukuran" >Ukuran</label>
                  <select name="ukuran" class="form-control">
                    <option value="besar-bulat">besar-bulat</option>
                    <option value="sedang-bulat">sedang-bulat</option>
                    <option value="kecil-bulat">kecil-bulat</option>
                    <option value="besar-persegi">besar-persegi</option>
                    <option value="sedang-persegi">sedang-persegi</option>
                    <option value="kecil-persegi">kecil-persegi</option>
                  </select>
              </div>
              @else
              <div class="col-6">
                  <input type="hidden" class="form-control @error('ukuran') is-invalid @enderror" id="ukuran" 
                  name="ukuran" value="1x1">
                  @error('ukuran')
                      <div class="invalid-feedback">{{$message}}</div>
                  @enderror
              </div>
              @endif
              <div class="col-12 mt-3">
                <div>
                <button type="submit" class="btn btn-primary btn-flat"><i class="fas fa-cart-plus fa-lg mr-2"></i>Add to Cart</button>
                <!-- <a href="{{ url("/user/order") }}" class="btn btn-success my-3 "></i>Pesan Sekarang</a> -->
                </div>
              </div>
              </form>
              </div>
            </div>
          @endforeach
          </div>
        <!-- /.card-body -->
      </div>
    <!-- /.card -->
</section>

</div>
@endsection