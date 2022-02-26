@extends('layouts.costumer')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12 mt-3 mb-3">
      <div class="card">
      <!-- /.card-header -->
        <div class="card-body">
          <div class="row">
            <div class="col-md-8">
              <div class="col-6">
                @section('content')
                  <section id="produk" class="py-2 text-center bg-white mt-3">
                    <div id="carouselExampleIndicators" class="carousel slide " data-ride="carousel">
                      <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                      </ol>
                      <div class="carousel-inner">
                        <div class="carousel-item active">
                          <img src="dist/img/slide1.png" class="d-block w-100" alt="gambar">
                        </div>
                        <div class="carousel-item">
                          <img src="dist/img/slide2.png" class="d-block w-100" alt="gambar">
                        </div>
                        <div class="carousel-item">
                          <img src="dist/img/slide3.png" class="d-block w-100" alt="gambar">
                        </div>
                          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                          </a>
                          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                          </a>
                      </div>
                    </div>
                  </section>
                  <section id="produk" class="py-1 text-center bg-white mt-3">
                  <h3>Terlaris</h3>
                    <div class="row mt-3 ml-3 ">
                      <?php 
                       $i = 0;
                      ?>
                      @foreach ($terlaris as $data)
                        <div class="produk ml-3 border-0" style="width:  12rem; ">
                          <a href="{{ url("/user/detailproduk", $data->id_produk) }}" style="text-center">
                            <img class="img-thumbnail" src="{{ asset('/public/uploads/'.$data->gambar) }}" style="height: 150px; width: 200px;"/>
                              <div class="card-body" style="height: 130px;">
                                <h6 class="text-center">{{ $data->nama_produk }}</h6>
                                <p class="text-center">RP.{{number_format($data->harga ) }}</p>
                                <p class="float-right">{{ $jmlTerlaris[$i]->jumlah }} terjual </p>                                
                              </div>
                          </a>
                        </div>  
                        <?php 
                          $i++;
                        ?>
                      @endforeach
                    <h3>Produk</h3>
                    <div class="row mt-3 ml-3 ">
                      @foreach ($produk as $data)
                        <div class="produk ml-3 border-0" style="width:  12rem; ">
                          <a href="{{ url("/user/detailproduk", $data->id_produk) }}" style="text-center">
                            <img class="img-thumbnail" src="{{ asset('/public/uploads/'.$data->gambar) }}" style="height: 150px; width: 200px;"/>
                              <div class="card-body" style="height: 130px;">
                                <h6 class="text-center">{{ $data->nama_produk }}</h6>
                                <p class="text-center">RP.{{number_format($data->harga ) }}</p>
                              </div>
                          </a>
                        </div>
                      @endforeach
                    </div>
                  </section>
                @endsection
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection