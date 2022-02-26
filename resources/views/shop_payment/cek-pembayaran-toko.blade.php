@extends('layouts.admin')
@section('title','Produk')
@section('content')
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header" style="background-color:#009688 ">
                <form method="get" action="{{ url('shop_payment/cek-pembayaranToko')  }}" >
                  <div class="row "align-center>
                    <div class="col-4">
                        <label for="admin">Start Date</label>
                        <input class="form-control" type="date" value="{{$tgl1}}" name="tgl1">
                    </div>

                    <div class="col-4">
                        <label for="admin">End Date</label>
                        <input class="form-control" type="date" value="{{$tgl2}}" name="tgl2">
                    </div>                           
                    
                    <div class="col-2 pt-2 mt-4">
                      
                        <button type="submit" class="btn btn-default">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.card-header -->
              <div class="card-body ">
          <div class="row">
              <div class="col-12 mt-5">                
                <table id="tabel1" class="display table table-bordered">
                  <thead>
                      <tr>
                        <th>Nama Toko</th>
                        <th>Tanggal <i class="nav-icon fas fa-sort"></i></th>
                        <th>Rekening Pengirim</th>
                        <th>Rekening Penerima</th>
                        <th>Jumlah Transfer</th>
                        <th>Bukti Pembayaran</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach($percetakan as $toko)
                      <?php
                        $x=0;
                        $y=0;
                      ?>
                      
                      @foreach($payment as $pay)
                        @if($toko->id_percetakan == $pay['id_percetakan'])
                          <?php
                              $x = $x+1;
                          ?>                                                                        
                          <tr>
                            <td>{{$pay->nama_toko}}</td>
                              <td>{{$pay->created_at->format('d M Y - H:i')}} WIB</td>
                              <td>{{$pay->no_rek_pengirim}}</td>
                              <td>{{$pay->no_rek_penerima}}</td>
                              <td>{{$pay->jml_transfer}}</td>
                              <td><img class="img-thumbnail" src="{{ asset('/upload/bukti-pembayaran/'.$pay->bukti_transfer) }}" width="150"/></td>
                          </tr>                                                   
                
                        @else
                          <?php
                            $y = $y+1;
                          ?>
                        @endif
                      @endforeach  

                      @if($x==0)                                      
                        <tr>
                            <td>{{$toko->nama_toko}}</td>
                            <td></td>
                            <td></td>
                            <td>{{$toko->nama_bank}} - {{$toko->no_rek}} - {{$toko->nama_pemilik}}</td>
                            <td></td>
                            <td>
                                <form class="form-group" action="{{url('/shop_payment/transfer', $toko->id_percetakan)}}" method="GET" enctype="multipart/form-data" style="float: right">
                                  @csrf
                                  <div class="form-group">
                                      <input hidden="" class="form-control" type="date" value="{{$tgl1}}" name="tgl1">
                                  </div>
                                  <div class="form-group">
                                      <input hidden="" class="form-control" type="date" value="{{$tgl2}}" name="tgl2">
                                  </div>     
                                  <div class="text">
                                      <button type="submit" class="btn btn-success">Bayar sekarang</button>
                                  </div>
                                </form>
                         </tr>
                      @endif  
                      
                      <?php
                        $x = 0;
                        $y = 0;
                      ?>
                    @endforeach
                  </tbody>
                </table>
              </div>
              </div>
            </div>
          <div class="row float-right">
              
            </div>
          </div>
        </div>
              <!-- /.card-body -->
            </div>
       </div>
    </div>
  </div>
</section>
@stop
@section('js')
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      
      // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $("#tabel1").DataTable();
  });
</script>
@endsection
