@extends('layouts.costumer')
@section('content')
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
          </div>
          <div class="col-sm-12 mt-3">
            <ol class="breadcrumb ">
              <li class="breadcrumb-item"><a  href="{{ url('/home') }}">Home</a></li>
              <li class="breadcrumb-item active">Keranjang Saya</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- <div class="callout callout-info">
              <h5><i class="fas fa-info"></i> Note:</h5>
              Silahkan hubungi penjual sebelum melakukan pembayaran
            </div> -->


            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <h3>Keranjang saya</h3></br>
              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                      <th></th>
                      <th></th>
                      <th>Toko</th>
                      <th>Produk</th>
                      <th>Harga</th>
                      <th>Jumlah</th>
                      <th>total</th>
                      <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($keranjang as $ker )
                    <tr>
                        <td scope="row" align="center"><a href="{{ url("/user/keranjang/delete", $ker->id_keranjang) }}" 
                            onclick="return confirm('Apakah Anda ingin menghapus data?')" class="btn btn-white"> <i class="fas fa-window-close"></i></a>
                        </td>
                        <td><img class="img-thumbnail" src="{{ asset('/public/uploads/'.$ker->gambar) }}" width="80"/></td>
                        <td><a href="{{ url("/user/lihatproduk", $ker->id_percetakan) }}" >{{$ker->nama_toko}}</a></td>
                        <td>{{$ker->nama_produk}}</td>
                        <td>Rp.{{number_format($ker->harga)}}</td>
                        <td>{{$ker->jumlah}}</td>
                        <td>Rp.{{number_format($ker->total)}}</td>
                        <td>
                            <a href="{{ url("/user/editkeranjang", $ker->id_keranjang) }}" class="btn btn-primary"><i class="fas fa-edit"></i> Update</a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                    @forelse($keranjang as $index=>$cart)
                    @empty
                    <tr>
                      <td colspan="8"> <h6 class="text-center">Empty Cart</h6> </td>
                    </tr>
                      
                    @endforelse
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                </div>
                <!-- /.col -->
                <div class="col-6 mt-3">
                  <div class="table-responsive">
                    <table class="table">
                    <tr>
                        <th>Total:</th>
                        <td>Rp.{{number_format($keranjang->sum('total'))}}</td>
                      </tr>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12 mt-3">
                  <div class="ml-3 mr-3" style="padding-right: 20px;">
                  <a href="{{url('/checkout')}}" class="btn btn-success float-right"> Checkout </a>  
                  </div>
                  <!-- <a href="{{url('/home')}}" class="btn btn-success float-right"> Lanjutkan Belanja </a>  -->
                  </div>
                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->

</div>
@endsection



