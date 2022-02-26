@extends('layouts.admin')

@section('title','Akun BANK')

@section('content')
<div class="container">
<div class="container-fluid">
<div class="card card-info card-outline">
        <div class="col-12">
        <div class="card-header">
            <h1 class="mt-3">Akun BANK</h1> 
        </div>
        <div class="card-header">
             <a href="akunbank/create" class="btn btn-success my-3"><i class="fas fa-plus"> Akun BANK </i></a>
                
            @if (session ('status'))
                <div class="alert alert-success">
                    {{ session ('status')}}
                </div>
            @endif
            <table class="table table-striped table-bordered table-hover table-light"  >
                <thead class="table-success">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">BANK</th>
                        <th scope="col">Nama</th>
                        <th scope="col">No Rekening </th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($akun as $pr)
                    <tr>
                        <td scope="row">{{$loop->iteration}}</td>
                        <td>{{$pr->nama_bank}}</td>
                        <td>{{$pr->nama_pemilik}}</td>
                        <td>{{$pr->no_rek}}</td>
                        <td>
                            <a href="{{ url("/akunbank/edit", $pr->id_rek) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a> | 
                              @method('delete') 
                              @csrf 
                            <a href="{{ url("/akunbank/delete", $pr->id_rek) }}" 
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