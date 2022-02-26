@extends('layouts.admin')
@section('title','Produk')
@section('content')
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
            <div class="card-header" style="background-color:#009688 ">
                <h1 class="card-title" style="color:#ffff">Daftar Pesanan Dikirim </h1>
              </div>
              <!-- /.card-header -->
              <div class="card-body"> 
              
                <table id="tabel1" class="display table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>ID Pesanan</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>No HP</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($dikirim as $pr)
                  <tr>
                        <td scope="row">{{$loop->iteration}}</td>
                        <td>{{$pr->id_pesanan}}</td>
                        <td>{{$pr->nama}}</td>
                        <td>{{$pr->alamat}}</td>
                        <td>{{$pr->no_hp}}</td>
                        <td>
                        <a href="{{ url("/pesanan/dikirim") }}" class="btn btn-warning"><i class="fas fa-eye"></i></a>
                        <form class="form-group" action="{{ url('/pesanan/dikirim', $pr->id_pesanan) }}" method="POST" >
                        @csrf 
                        <button type="submit" class="btn btn-success"> Pesanan Diterima</button></form></td>
                    </tr>
                  @endforeach
                  </tbody>
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