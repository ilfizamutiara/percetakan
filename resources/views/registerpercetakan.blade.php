<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>D-print  | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page" style="background-color:#009688" >
<div class="col-md-8">
  <div class="card card-outline card-primary mt-5 ">
    <div class="card-body">
    <img src="{{url('dist/img/logo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle text-center" 
      style="margin-top: 20px; width: 200px; margin-left: 330px; margin-bottom: 10px;">
      <form action="/registerpercetakan" method="post" enctype="multipart/form-data">
      @csrf
      <div class="row">
        <div class="col-6 mt-3">
        <div class="col-5">
            <label for="username">Username</label>
      </div>
      <div class="input-group mb-3">
          <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" placeholder="Username" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
              @error('username')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
        </div>
      <div class="col-5">
        <label for="nama_toko">Nama</label>
      </div>
      <div class="input-group mb-3">
        <input id="nama_toko" type="text" class="form-control @error('nama_toko') is-invalid @enderror" placeholder="Nama" name="nama_toko" value="{{ old('nama_toko') }}" required autocomplete="nama_toko">
        @error('nama_toko')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
            </span>
        @enderror
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-user"></span>
          </div>
        </div>
      </div>
      <div class="col-5">
        <label for="email">Email</label>
      </div>
      <div class="input-group mb-3">
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email">
        @error('email')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
            </span>
        @enderror
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-envelope"></span>
          </div>
        </div>
      </div>
      <div class="col-5">
        <label for="no_telp">No HP</label>
      </div>
      <div class="input-group mb-3">
        <input id="no_telp" type="text" class="form-control" placeholder="No HP" name="no_telp" required autocomplete="new-password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-fax"></span>
            </div>
          </div>
        </div>
        <div class="col-5">
        <label for="foto">Foto</label>
      </div>
      <div class="input-group mb-3">
        <div class="col md-2">
        <img class="image" src="{{url('dist/img/toko.png')}}" width="150px"/></br>
        </div>
        <div>
        <input type="file" class="form-control @error('foto') is-invalid @enderror" id="foto"name="foto"/>
        </div>
        @error('foto')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
            </span>
        @enderror
        
      </div>
      </div>
      <div class="col-6 mt-3">
      <div class="col-5">
        <label for="alamat_toko">Alamat</label>
      </div>
      <div class="input-group mb-3">
        <input id="alamat_toko" type="text" class="form-control @error('alamat_toko') is-invalid @enderror" placeholder="Alamat" name="alamat_toko" required autocomplete="alamat_toko">
          @error('alamat_toko')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-home"></span>
          </div>
        </div>
      </div>
      <div class="col-5">
        <label for="kode_pos">Kode Pos</label>
      </div>
      <div class="input-group mb-3">
        <input id="kode_pos" type="text" class="form-control @error('kode_pos') is-invalid @enderror" placeholder="Kode Pos" name="kode_pos" value="{{ old('kode_pos') }}" required autocomplete="kode_pos">
        @error('kode_pos')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
            </span>
        @enderror
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-home"></span>
          </div>
        </div>
      </div>
      <div class="col-5">
        <label for="password">Password</label>
      </div>
      <div class="input-group mb-3">
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="new-password">
          @error('password')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-lock"></span>
          </div>
        </div>
      </div>
      <div class="col-5">
        <label for="confirm_password">Konfirmasi Password</label>
      </div>
      <div class="input-group mb-3">
        <input id="password-confirm" type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation" required autocomplete="new-password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
      </div>
    </div>
      </div>
      </div>
      <div class="row">
          <div class="col-6 mt-3 float-right">
          </div>
          <div class="col-5 mt-3 float-right">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
      </div></br></br>
        
        </div>
      </form>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>

<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>