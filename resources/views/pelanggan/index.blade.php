@extends('layouts.admin')

@section('title','Pelannggan')

@section('content')
<div class="content">
<div class="card card-info card-outline">
        <div class="col-12">
        <div class="card-header">
            <h1 class="mt-3">Daftar Pelanggan</h1> 
        </div>
            @if (session ('status'))
                <div class="alert alert-success">
                    {{ session ('status')}}
                </div>
            @endif
            <table class="table">
                <thead class="table-success">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama </th>
                        <th scope="col">Email </th>
                        <th scope="col">Jenis kelamin</th>
                        <th scope="col">No HP</th>
                        <th scope="col">Alamat</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pelanggan as $pel)
                    <tr>
                        <td scope="row">{{$loop->iteration}}</td>
                        <td>{{$pel->nama}}</td>
                        <td>{{$pel->email}}</td>
                        <td>{{$pel->jenis_kelamin}}</td>
                        <td>{{$pel->no_hp}}</td>
                        <td>{{$pel->alamat}}</td>
                        
                    </tr>
                    @endforeach
                </tbody>
            </table> 
        </div>
    </div>
</div>

@endsection