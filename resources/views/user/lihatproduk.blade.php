@extends('layouts.costumer')

@section('content')
<div class="container"></br>
<div class="row">
          <div class="col-md-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-8">
                    <div class="col-6">
                    @section('content')
                    <section id="kategori" class="py-1 text-center bg-white">
                        <div class="container">
                            </br>
                          <div class="row">
                                @foreach ($lihat as $data)
                                <div class="col-md-3 text-center">
                                    <div class="card" style="width:  13rem;">
                                        <a href="{{ url("/user/detailproduk", $data->id_produk) }}" style="text-center">
                                          <img class="img-thumbnail" src="{{ asset('/public/uploads/'.$data->gambar) }}"style="height: 150px;" />
                                        <div class="card-body">
                                            <h6 class="text-center">{{ $data->nama_produk }}<br><h6 class="text-center">{{ $data->bahan }}</h6></h6></a>                                        </div>
                                    </div>
                                </div>
                                @endforeach
                          </div>
                        </div>
                      </section>
                    @endsection
                    </div>
                   
                    <!-- /.chart-responsive -->
                  </div>
                  <!-- /.col -->
                  
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
</div>
@endsection