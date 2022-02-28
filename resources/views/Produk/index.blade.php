@extends('layouts.admin')

@section('title','Produk')

@section('content')
<div class="container">
<div class="container-fluid">
<div class="card card-info card-outline">
        <div class="col-12">
        <div class="card-header">
            <h1 class="mt-3">Daftar Produk</h1> 
        </div>
        
        <div class="card-header">
          <div class="row">
            <div class="col-6">
            <a href="produk/create" class="btn btn-success my-3"><i class="fas fa-plus"> Produk </i></a> 
            </div>
            <div class="col-6">
              <form class="col-6" action="/produk" method="GET" >
              <div class="input-group input-group-sm">
                <input type="text" class="form-control" placeholder ="Search" value="{{ Request::get('keyword') }}" id="keyword" name="keyword">            
                <div class="input-group-append">
                  <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                </div>
              </div>
              </form>   
            </div>
          </div>
            
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
                        <th scope="col">Nama Produk</th>
                        <th scope="col">Satuan</th>
                        <th scope="col">Bahan</th>
                        <th scope="col">Harga </th>
                        <th scope="col">Stok </th>
                        <th scope="col">Gambar</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($produk as $pr)
                    <tr>
                        <td scope="row">{{$loop->iteration}}</td>
                        <td>{{$pr->nama_produk}}</td>
                        <td>{{$pr->satuan}}</td>
                        <td>{{$pr->bahan}}</td>
                        <td>Rp.{{number_format($pr->harga)}}</td>
                        <td>{{$pr->stok}}</td>
                        <td><img class="img-thumbnail" src="{{ asset('/public/uploads/'.$pr->gambar) }}" width="150"/></td>
                        <td>
                            <a href="{{ url("/produk/edit", $pr->id_produk) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a> | 
                              @method('delete') 
                              @csrf 
                            <a href="{{ url("/produk/delete", $pr->id_produk) }}" 
                            onclick="return confirm('Apakah Anda ingin menghapus data?')" class="btn btn-danger"> <i class="fas fa-trash-alt"></i></a>
                        </td>
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