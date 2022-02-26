@extends('layouts.admin')

@section('title','Edit Akun Bank')

@section('content')
<div class="content">
<div class="card card-info card-outline">
        <div class="col-12">
        <div class="card-header">
            <h1 class="mt-3">Edit Akun Bank</h1>
        </div>
            <form method="POST"  action="{{ url('/akunbank', $akun->id_rek) }}" > 
                @csrf
                <div class="card-header">
                <div class="card-body">
                <div class="col-6 mt-3">
                    <label for="id_bank" >Bank</label>
                    <select name="id_bank" class="form-control">
                        @foreach($bank as $bn)
                            <option value="{{$bn->id_bank}}" {{$bn->id_bank == $akun->id_bank ? 'selected' : ''}}>{{$bn->nama_bank}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-6 mt-3 ">
                    <label for="nama_pemilik" > Nama Pemilik</label>
                    <input type="text" class="form-control @error('nama_pemilik') is-invalid @enderror" id="nama_pemilik" 
                     name="nama_pemilik" value="{{$akun->nama_pemilik}}">
                    @error('nama_pemilik')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                
                <div class="col-6 mt-3 mb-3">
                    <label for="no_rek" >No Rekening </label>
                    <input type="text" class="form-control @error('no_rek') is-invalid @enderror" id="no_rek" 
                     name="no_rek" value="{{$akun->no_rek}}">
                    @error('no_rek')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                
                <button type="submit" class="btn btn-primary ">Proses</button>
            </form>
            </div>
        </div>
    </div>
</div>

@endsection 