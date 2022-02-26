@extends('layouts.admin')

@section('title','Kategori Produk')

@section('content')
<div class="content">
<div class="card card-info card-outline">
        <div class="col-12">
        <div class="card-header">
            <h1 class="mt-3">Kategori Produk</h1> 
        </div>
            <a href="kategori/create" class="btn btn-success my-3"><i class="fas fa-plus"> Kategori </i></a>

            @if (session ('status'))
                <div class="alert alert-success">
                    {{ session ('status')}}
                </div>
            @endif
            <table id="tabel1" class="display table">
                <thead class="table-success">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($kategori as $kt)
                    <tr>
                        <td scope="row">{{$loop->iteration}}</td>
                        <td>{{$kt->kategori}}</td>
                        <td>
                            <a href="{{ url('/kategori/edit', $kt->id_kategori) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a> | 
                              @method('delete') 
                              @csrf 
                            <a href="{{ url('/kategori/delete', $kt->id_kategori) }}" 
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
<script type="text/javascript">
  $(document).ready(function(){
    $("#tabel1").DataTable();
  });
</script>
@endsection