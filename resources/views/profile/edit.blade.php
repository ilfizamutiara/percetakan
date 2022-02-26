@extends('layouts.costumer')
@section('content')
<div class="content">
      <!-- Default box -->
        <div class="row mt-5">
            <div class="col-3 ">
                <div class="card-profile">
                    <div class="card-body box-profile">
                        <div class="text-center mb-3">
                        @if(Auth::user()->foto == null)
                          <img class="profile-user-img img-fluid img-circle" src="{{url('dist/img/tanpa_nama.jpg')}}" width="150px"/>
                        @else
                          <img class="img-gambar" src="{{ asset('/upload/pelanggan-foto/'.Auth::user()->foto) }}" width="150px"></br>
                        @endif
                        </div>
                        <h3 class="profile-username text-center">{{Auth::user()->username}}</h3>
                        <p class="text-muted text-center"></p>
                        <ul class="nav nav-pills nav-sidebar " data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="{{ route('profile/edit') }}" class="nav-link @if(Route::currentRouteName()=='DataUser') active @endif">
                                <i class="nav-icon fa fa-store"></i>
                                <p>Profil</p>
                            </a>
                            <a href="{{ url('/user/riwayat') }}" class="nav-link @if(Route::currentRouteName()=='percetakan') active @endif">
                                <i class="nav-icon fa fa-store"></i>
                                <p>Pesanan saya</p>
                            </a>
                        </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /.card -->
            <div class="col-9 ">
                <div class="card card-solid">
                <div class="card-header">
                    Update Profile
                </div>
                    <div class="card-body">
                        <div class="col-9 ">
                            <form method="POST" action="{{ route('profile.update') }}" align="left" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="username"  class="col-sm-3 col-form-label">Username </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" 
                                    name="username" value="{{ old('username', $user->username) }}">
                                    @error('username')
                                        <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nama"  class="col-sm-3 col-form-label">Nama </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" 
                                    name="nama" value="{{ old('nama', $pelanggan->nama) }}">
                                    @error('nama')
                                        <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" 
                                    name="email" value="{{ old('email', $user->email) }}">
                                    @error('email')
                                        <div class="invalid-feedback">{{$message}}</div>
                                    @enderror                        
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="jenis_kelamin" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                <div class="col-sm-9">
                                <input type="radio" name="jenis_kelamin" value="Perempuan" id="jenis_kelamin" {{$pelanggan->jenis_kelamin == 'Perempuan'? 'checked' : ''}}> Perempuan</t>
                                <input type="radio" name="jenis_kelamin" value="Laki-Laki" id="jenis_kelamin"  {{$pelanggan->jenis_kelamin == 'Laki-Laki'? 'checked' : ''}}> Laki-Laki                      
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="no_hp" class="col-sm-3 col-form-label">No HP</label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" 
                                    name="no_hp" value="{{old('no_hp', $pelanggan->no_hp)}}">
                                    @error('no_hp')
                                        <div class="invalid-feedback">{{$message}}</div>
                                    @enderror                        
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" 
                                    name="alamat" value="{{old('alamat', $pelanggan->alamat)}}">
                                    @error('alamat')
                                        <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="id_province" class="col-sm-3 col-form-label">Provinsi</label>
                                <div class="col-sm-9">
                                    <select name="id_province" class="form-control">
                                    <option value="">-- Pilih --</option>
                                    @foreach($province as $prov)
                                        <option value="{{$prov->id_province}}" @if($prov->id_province == $user->id_province) selected @endif >
                                            {{$prov->name}}
                                        </option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="id_city" class="col-sm-3 col-form-label">Kota</label>
                                <div class="col-sm-9">
                                    <select name="id_city" class="form-control">
                                    <option value="">--- pilih ---</option>
                                    @foreach($city as $kota)
                                        <option value="{{$kota->id_city}}" @if($kota->id_city == $user->id_city) selected @endif>
                                        {{$kota->city_name}}
                                        </option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <div class="offset-sm-2 col-sm-10">
                                <button type="submit" class="btn btn-danger float-lg-right">Submit</button>
                                </div>
                            </div>
                            </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection
