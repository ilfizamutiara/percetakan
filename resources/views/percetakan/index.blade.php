@extends('layouts.admin')

@section('title','Percetakan')

@section('content')
<div class="content">
<div class="card card-info card-outline">
        <div class="col-12">
        <div class="card-header">
            <h1 class="mt-3">Daftar Percetakan</h1> 
        </div>
            <a href="percetakan/create" class="btn btn-success my-3"><i class="fas fa-plus"> Akun Percetakan </i></a>

            @if (session ('status'))
                <div class="alert alert-success">
                    {{ session ('status')}}
                </div>
            @endif
            <table class="table">
                <thead class="table-success">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Toko</th>
                        <th scope="col">Email</th>
                        <th scope="col">No Telp</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Aksi</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach($percetakan as $tk)
                    <tr>
                        <td scope="row">{{$loop->iteration}}</td>
                        <td>{{$tk->nama_toko}}</td>
                        <td>{{$tk->email}}</td>
                        <td>{{$tk->no_telp}}</td>
                        <td>
                        @if($tk->foto == null)
                        <img class="img-thumbnail" src="{{ asset('/dist/img/toko.png') }}" width="300"/>
                        @else
                        <img class="img-thumbnail" src="{{ asset('/upload/percetakan-foto/'.$tk->foto) }}" width="300"/>
                        @endif                        
                        </td>
                        <!-- disini nampilin gambar asset() dia manggil direktori /public-->
                        <td>
                            <a href="{{ url('/percetakan/edit', $tk->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a> | 
                              @method('delete') 
                              @csrf 
                            <a href="{{ url("/percetakan/delete", $tk->id) }}" 
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