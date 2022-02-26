@extends('layouts.admin')

@section('title','Laporan Pembayaran Toko')

@section('content')
<div class="container-fluid">
    <div class="card card-info ">
        <div class="col-12">
        <div class="card-header">
            <h1 class="mt-3 md-3"> Pembayaran Toko</h1> 
        </div>
            @if (session ('status'))
                <div class="alert alert-success">
                    {{ session ('status')}}
                </div>
            @endif
            <table class="table table-striped table-bordered table-hover table-light"  >
                <thead class="table-success">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Percetakan</th>
                        <th scope="col">No HP</th>
                        <th scope="col">Bank </th>
                        <th scope="col">No Rekening</th>
                        <th scope="col">Rekening Penerima </th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($percetakan as $sp)
                    <tr>
                        <td scope="row">{{$loop->iteration}}</td>
                        <td>{{$sp->nama_toko}}</td>
                        <td>{{$sp->no_telp}}</td>
                        <td>{{$sp->nama_bank}}</td>
                        <td>{{$sp->no_rek}}</td>
                        <td>{{$sp->nama_pemilik}}</td>
                        <td><a href="{{url('/shop_payment/cek-pembayaran',$sp->id_percetakan)}}" class="btn btn-primary">Lihat</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table> 
        </div>
    </div>
</div>
@stop
@section('js')
<script>
  $(function () {
    $("#produk").DataTable({
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
@endsection