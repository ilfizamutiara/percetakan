@extends('layouts.costumer')

@section('content')
<div class="col-lg-12" align="center">
<section class="content"></br>

      <!-- Default box -->
      <div class="card card-solid col-lg-12"  style="max-width: 100%; align: center">
        <div class="card-body">
          <div class="row mt-4">
            <nav class="w-100">
              <div class="nav nav-tabs" id="product-tab" role="tablist">
                <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#belumbayar" role="tab" aria-controls="product-desc" aria-selected="true">Pesanan belum dibayar</a>
                <a class="nav-item nav-link  " id="product-comments-tab" data-toggle="tab" href="#diproses" role="tab" aria-controls="product-comments" aria-selected="false">Pesanan diproses</a>
                <a class="nav-item nav-link" id="product-rating-tab" data-toggle="tab" href="#dikirim" role="tab" aria-controls="product-rating" aria-selected="false">Pesanan Dikirim</a>
                <a class="nav-item nav-link" id="product-rating-tab" data-toggle="tab" href="#selesai" role="tab" aria-controls="product-rating" aria-selected="false">Selesai</a>
                <a class="nav-item nav-link" id="product-rating-tab" data-toggle="tab" href="#dibatalkan" role="tab" aria-controls="product-rating" aria-selected="false">Dibatalkan</a>
              </div>
            </nav>
            <div class="tab-content p-3" id="nav-tabContent">
              <div class="tab-pane fade show active" id="belumbayar" role="tabpanel" aria-labelledby="product-desc-tab"> 
                <table class="table table-striped table-bordered table-hover table-light col-auto" >
                      <thead class="table-success">
                        <tr>
                            <th scope="col">ID Pesanan</th>
                            <th scope="col">Toko</th>
                            <th scope="col">Total Bayar</th>
                            <th scope="col">Status</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($pesanan as $pesan)  
                    @if($pesan->id_status_pesanan == 1 || $pesan->id_status_pesanan == 2)
                        <tr>
                            <td >{{$pesan->id_pesanan}}</td>
                            <td>{{$pesan->nama_toko}}</td>
                            <td >Rp.{{number_format($pesan->total_bayar)}}</td>
                            @if($pesan->id_status_pesanan == 1)
                            <td>{{$pesan->status}}</td>
                            <td ><a href="{{ url('/user/detailpesanan', $pesan->id_pesanan) }}" class="btn btn-primary">Detail </a> 
                            <a href="{{ url('/user/pembayaran', $pesan->id_pesanan) }}" class="btn btn-danger">Bayar sekarang</a> </td>
                            @else
                            <td>
                            <button  class="badge badge-primary">Tunggu konfirmasi</button>
                            <td ><a href="{{ url('/user/detailpesanan', $pesan->id_pesanan) }}" class="btn btn-primary">Detail </a>  
                            </td>
                            @endif
                            </tr>
                    @endif
                    @endforeach
                    </tbody>
                </table>
              </div>
              <div class="tab-pane fade show " id="diproses" role="tabpanel" aria-labelledby="product-desc-tab"> 
                <table class="table table-striped table-bordered table-hover table-light col-auto" >
                      <thead class="table-success">
                        <tr>
                            <th scope="col">ID Pesanan</th>
                            <th scope="col">Toko</th>
                            <th scope="col">Total Bayar</th>
                            <th scope="col">Status</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($pesanan as $pesan)  
                    @if($pesan->id_status_pesanan == 3)
                        <tr>
                            <td >{{$pesan->id_pesanan}}</td>
                            <td>{{$pesan->nama_toko}}</td>
                            <td >Rp.{{number_format($pesan->total_bayar)}}</td>
                            <td>{{$pesan->status}}</td>
                            <td ><a href="{{ url('/user/detailpesanan', $pesan->id_pesanan) }}" class="btn btn-primary">Detail </a> </td>
                        </tr>
                    @endif
                    @endforeach
                    </tbody>
                </table>
              </div>
              <div class="tab-pane fade show " id="dikirim" role="tabpanel" aria-labelledby="product-desc-tab"> 
              <form class="form-group" action="{{ url('/user/riwayat', $order->id_pesanan) }}" method="POST" >
              @csrf 
                <table class="table table-striped table-bordered table-hover table-light col-auto" >
                      <thead class="table-success">
                        <tr>
                            <th scope="col">ID Pesanan</th>
                            <th scope="col">Toko</th>
                            <th scope="col">Total Bayar</th>
                            <th scope="col">Status</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($pesanan as $pesan)  
                    @if($pesan->id_status_pesanan == 4)
                        <tr>
                            <td >{{$pesan->id_pesanan}}</td>
                            <td>{{$pesan->nama_toko}}</td>
                            <td >Rp.{{number_format($pesan->total_bayar)}}</td>
                            <td>{{$pesan->status}}</td>
                            <td ><a href="{{ url('/user/detailpesanan', $pesan->id_pesanan) }}" class="btn btn-primary">Detail </a>
                                                    
                              <button type="submit" class="btn btn-danger">Pesanan Diterima</button>
                            </td>
                        </tr>
                              
                    @endif
                    @endforeach
                    </tbody>
                </table>
                </form>

              </div>
              <div class="tab-pane fade show " id="selesai" role="tabpanel" aria-labelledby="product-desc-tab"> 
                <table class="table table-striped table-bordered table-hover table-light col-auto" >
                      <thead class="table-success">
                        <tr>
                            <th scope="col">ID Pesanan</th>
                            <th scope="col">Toko</th>
                            <th scope="col">Total Bayar</th>
                            <th scope="col">Status</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($pesanan as $pesan)  
                    @if($pesan->id_status_pesanan == 5)
                        <tr>
                            <td >{{$pesan->id_pesanan}}</td>
                            <td>{{$pesan->nama_toko}}</td>
                            <td >Rp.{{number_format($pesan->total_bayar)}}</td>
                            <td>{{$pesan->status}}</td>
                            <td ><a href="{{ url('/user/detailpesanan', $pesan->id_pesanan) }}" class="btn btn-primary">Detail </a> </td>
                        </tr>
                    @endif
                    @endforeach
                    </tbody>
                </table>
              </div>
              <div class="tab-pane fade show " id="dibatalkan" role="tabpanel" aria-labelledby="product-desc-tab"> 
                <table class="table table-striped table-bordered table-hover table-light col-auto" >
                      <thead class="table-success">
                        <tr>
                            <th scope="col">ID Pesanan</th>
                            <th scope="col">Toko</th>
                            <th scope="col">Total Bayar</th>
                            <th scope="col">Status</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($pesanan as $pesan)  
                    @if($pesan->id_status_pesanan == 6)
                        <tr>
                            <td >{{$pesan->id_pesanan}}</td>
                            <td>{{$pesan->nama_toko}}</td>
                            <td >Rp.{{number_format($pesan->total_bayar)}}</td>
                            <td>{{$pesan->status}}</td>
                            <td ><a href="{{ url('/user/detailpesanan', $pesan->id_pesanan) }}" class="btn btn-primary">Detail </a> </td>
                        </tr>
                    @endif
                    @endforeach
                    </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
</div>
@endsection