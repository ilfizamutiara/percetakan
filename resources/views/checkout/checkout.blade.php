@extends('layouts.costumer')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
            </div>
            <div class="col-sm-12 mt-3">
                <ol class="breadcrumb ">
                    <li class="breadcrumb-item float-right"><a  href="{{ url('/home') }}">Home</a></li>
                    <li class="breadcrumb-item float-right active">Orderan Saya</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="col-lg-12" align="center">
      <!-- Default box -->
    <div class="row">
    <div class="col-6 ">
      <div class="card card-solid">
        <div class="card-body">
          <form method="POST" action="{{ url('checkout/pengiriman') }}" align="left" enctype="multipart/form-data">
            @csrf
            @foreach($keranjang as $ker)
            <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  {{$ker->nama_produk}}
                </h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool"><a href="{{ url("/user/keranjang/delete", $ker->id_keranjang) }}" 
                            onclick="return confirm('Apakah Anda ingin menghapus data?')" class="btn btn-white"> <i class="fas fa-times"></i></a>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-12">
                  <input type="file" class="form-control @error('dokumen') is-invalid @enderror" id="dokumen" 
                     name="dokumen" value="{{old('dokumen')}}">
                    @error('dokumen')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                  </div></br>
                </div>
                <!-- /.row -->
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
        @endforeach
        <button type="submit" class="btn btn-primary btn-flat float-right">Next</button>
        </form>
      </div>
    </div>
        </div>
      <!-- /.card -->
      <div class="col-6 ">
      <div class="card card-solid">
        <div class="card-body">
            <div class="col-12 table-responsive">
            
                  <table class="table table-striped stacktable">
                    <thead style="background-color:#009688">
                    <h3 >Daftar Belanja</h3>
                    <tr>
                      <th>Toko</th>
                      <th>Produk</th>
                      <th>Harga</th>
                      <th>Jumlah</th>
                      <th>Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($keranjang as $ker)
                    <tr>
                        <td>{{$ker->nama_toko}}</td>
                        <td>{{$ker->nama_produk}}</td>
                        <td>Rp.{{number_format($ker->harga)}}</td>
                        <td>{{$ker->jumlah}}</td>
                        <td>Rp.{{number_format($ker->total)}}</td>
                    </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div>
                <div class="row">
                <!-- accepted payments column -->
                <div class="col-7">
                </div>
                <!-- /.col -->
                <div class="col-5 mt-3">
                  <div class="table-responsive">
                    <table class="table stacktable">
                    <tr>
                        <th>Total:</th>
                        <td>Rp.{{number_format($keranjang->sum('total'))}}</td>
                      </tr>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>

          </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>

    </section>

</div>
@endsection
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
@section('scripts')
<script type="text/javascript">
    $(document).ready(function() {
        $"input[name='total_bayar']").keyup(function(e){
            var jumlah = parseInt($("input[name='jumlah']").val());
            var ongkir = parseInt($("input[name='ongkir']").val());
            var total_bayar = jumlah + ongkir;
            $(".total_bayar").text(total_bayar);
        })
    });
</script>
@endsection
