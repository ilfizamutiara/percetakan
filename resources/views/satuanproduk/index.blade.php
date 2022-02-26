@extends('layouts.admin')

@section('title','Satuan Produk')

@section('content')
<div class="content">
<div class="card card-info card-outline">
        <div class="col-12">
        <div class="card-header">
            <h1 class="mt-3">Satuan Produk</h1> 
        </div>
            <a href="satuanproduk/create" class="btn btn-success my-3"><i class="fas fa-plus"> Satuan Produk </i></a>

            @if (session ('status'))
                <div class="alert alert-success">
                    {{ session ('status')}}
                </div>
            @endif
            <table class="table">
                <thead class="table-success">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Satuan</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($satuan as $tk)
                    <tr>
                        <td scope="row">{{$loop->iteration}}</td>
                        <td>{{$tk->satuan}}</td>
                        <!-- disini nampilin gambar asset() dia manggil direktori /public-->
                        <td>
                            <a href="{{ url('/satuanproduk/edit', $tk->id_satuan_produk) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a> | 
                              @method('delete') 
                              @csrf 
                            <a href="{{ url('/satuanproduk/delete', $tk->id_satuan_produk) }}" 
                            onclick="return confirm('Apakah Anda ingin menghapus data?')" class="btn btn-danger"> <i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table> 
        </div>
    </div>
</div>

@endsection