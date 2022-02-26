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
<body class="hold-transition login-page"  style="background-color:#009688" >
<nav class="navbar navbar-expand-md navbar-light " style="height: 110px; background-color:#ffffff; width:100%">
    <div class="container navbar">
      <!-- <h3 class="brand-text font-weight-white " style="color:#ffff;">DPRINT'S</h3> -->
      <img src="{{url('dist/img/logo.png')}}" class="svg-icon" width="20%">

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
        <li class="nav-item">
            <a href="index3.html" class="nav-link"></a>
          </li>
          <!-- <h1><strong>Login</strong></h1> -->
        </ul>
      </div>
    </div>
</nav>
<div class="login-x"></br></br></br></br>
  <div class="login-logo">
    <a href="" style="color:#ffffff; "><h1>Login</h1></a>
  </div></br>
  <!-- /.login-logo -->
  
      <form method="POST" action="{{ route('login') }}">
      @csrf
      <div class="input-group mb-3">
        <input id="username" type="username" class="form-control @error('username') is-invalid @enderror" placeholder="Username" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
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
        <div class="input-group mb-3">
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="current-password">
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
        <button type="submit" class="btn btn-primary btn-block" style="background-color:#3CB371;">Login</button>
        <div class="row">
          <div class="col-12">
            <div class="icheck-primary text-center">
              <h7>Belum memiliki akun? |</h7>
              <a href="{{ route('registerpercetakan') }}" class="text-center" style="color:#ffff;"><small> Daftar</small></a>            
            </div>
          </div>
        </div>
      </form>
    <!-- /.login-card-body -->
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