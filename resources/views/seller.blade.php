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
<body class="hold-transition login-page"  >
<nav class="navbar navbar-expand-md navbar-light " style="height: 100px; background-color:#009688; width:100%">
    <div class="container navbar">
      <!-- <h3 class="brand-text font-weight-white " style="color:#ffff;">DPRINT'S</h3> -->
      <img src="dist/img/logo.png" class="svg-icon" width="20%">

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
        <li class="nav-item">
            <a href="index3.html" class="nav-link"></a>
          </li>
          <h1><strong>Seller</strong></h1>
        </ul>
      </div>
    </div>
</nav>
<div class="content mt-3 " style="width: 100%;">
  <div class="container-fluid">
    <div class="card card-solid col-lg-12" align="center" >
      <div class="card-body mb-lg-5"></br></br>
        <div class="text-center mb-3 mt-lg-5">
          <img class="img-gambar img-fluid img-circle" src="dist/img/logo.png" width="150px">
        </div>
        <h3 class="profile-username text-center mb-3 mt-3">Selamat Datang di D'PrInt!</h3>
        <p class="text-muted text-center mt-4">Untuk mulai berjualan, daftarkan toko Anda dengan <br>melengkapi informasi yang diperlukan.</p>
          <a class="btn btn-primary mt-3"  style="background-color:#009688" href="{{ route('registerpercetakan') }}" >Mulai Pendaftaran</a>
          <!-- <p class="text-muted text-center">Atau <br>Sudah memiliki Akun?</p> 
          <a class="btn btn-primary " style="background-color:#009688" href="{{ route('login') }}" >Login</a>         -->
      </div>
    </div>
      <!-- /.container-fluid -->
  </div>
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