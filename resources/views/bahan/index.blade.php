@extends('layouts.admin')

@section('title','Bahan Produk')

@section('content')
<div class="content">
<div class="card card-info card-outline">
        <div class="col-12">
        <div class="card-header">
            <h1 class="mt-3">Bahan Produk</h1> 
        </div>
            <a href="bahan/create" class="btn btn-success my-3"><i class="fas fa-plus"> Bahan Produk </i></a>

            @if (session ('status'))
                <div class="alert alert-success">
                    {{ session ('status')}}
                </div>
            @endif
            <table id="tabel1" class="display table">
                <thead class="table-success">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Bahan</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bahan as $bn)
                    <tr>
                        <td scope="row">{{$loop->iteration}}</td>
                        <td>{{$bn->bahan}}</td>
                        <!-- disini nampilin gambar asset() dia manggil direktori /public-->
                        <td>
                            <a href="{{ url('/bahan/edit', $bn->id_bahan) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a> | 
                              @method('delete') 
                              @csrf 
                            <a href="{{ url('/bahan/delete', $bn->id_bahan) }}" 
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