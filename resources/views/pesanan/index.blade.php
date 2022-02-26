@extends('layouts.admin')
@section('title','Produk')
@section('content')
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header" style="background-color:#009688 ">
                <h1 class="card-title" style="color:#ffff">Daftar Pesanan Masuk </h1>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="tabel1" class="display table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Tanggal transaksi <i class="nav-icon fas fa-sort"></i></th>
                    <th>ID Pesanan</th>
                    <th>Nama</th>
                    <th>No HP</th>
                    <th>Total Bayar</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($pesanan as $pr)
                  @if($pr->status == 'Dibayar')
                    <tr>
                        <td scope="row">{{$loop->iteration}}</td>
                        <td>{{date('d F Y h:m',strtotime($pr->created_at))}}</td>
                        <td>{{$pr->id_pesanan}}</td>
                        <td>{{$pr->nama}}</td>
                        <td>{{$pr->no_hp}}</td>
                        <td>Rp.{{number_format($pr->total_bayar)}}</td>
                        <td><span class="badge badge-success">{{$pr->status}}</span></td>
                        <td><a href="{{ url("/pesanan/show", $pr->id_pesanan) }}" class="btn btn-warning"><i class="fas fa-eye"></i></a>
                          <a href="{{ url("/pesanan/edit", $pr->id_pesanan) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>  </td>
                    </tr>
                    @endif
                    @endforeach

                </table>
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