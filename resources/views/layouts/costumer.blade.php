<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>D-PRINT | Dashboard</title>

  <link rel="stylesheet" href="{{url('/plugins/select2/css/select2.min.css')}}">

  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="shortcut icon" href="{{url('templates/app-assets/images/ico/favicon.ico')}}" type="image/x-icon">
  <link rel="stylesheet" href="{{url('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{url('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{url('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{url('plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{url('dist/css/AdminLTE.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{url('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{url('plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{url('plugins/summernote/summernote-bs4.min.css')}}">
  @section('css')
  <link rel="stylesheet" href="{{asset('asset\dist\air-datepicker\dist\css\datepicker.css')}}">
@stop
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"> 

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.bundle.min.js"></script> 

<!-- Select2 -->
  <link rel="stylesheet" href="{{url('/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<!-- 

@section('js')
<script src="{{asset('asset\dist\air-datepicker\dist\js\datepicker.js')}}">

</script> -->


</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
<html lang="en">
<head>
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Top Navigation</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{url('/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{url('/dist/css/adminlte.min.css')}}">
  <link href=" {{ mix('css/app.css') }}" rel="stylesheet">
<script src="{{ mix('js/app.js') }}"></script>

</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

  <!-- Navbar -->
<nav class="navbar navbar-expand-md navbar-aqua " style="height: 100px;background-color:#009688 ">
<div class="container navbar">
      <!-- <h3 class="brand-text font-weight-white " style="color:#ffff;">DPRINT'S</h3> -->
      <img src="{{url('dist/img/logo.png')}}" class="brand-image" width="20%">

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="index3.html" class="nav-link"></a>
          </li>
          <li class="nav-item">
            <a href="index3.html" class="nav-link"></a>
          </li>
          <li class="nav-item">
            <a class="btn btn-custom" style="color:#ffff;" href="{{ url('/home') }}" >Beranda</a>
          </li>
          <li class="nav-item">
            <a class="btn btn-custom" style="color:#ffff;" href="{{ url('/user/toko') }}" >Toko</a>
          </li>
          <li class="nav-item">
            <a class="btn btn-custom" style="color:#ffff;" href="{{ url('/user/riwayat') }}" >Pesanan Saya</a>
          </li>
        </ul>

        <!-- SEARCH FORM -->
        <form class="col-6" action="/home" method="GET" >
          <div class="input-group input-group-sm">
          <input type="text" class="form-control" value="{{ Request::get('keyword') }}" id="keyword" name="keyword">            
          <div class="input-group-append">
              <button class="btn btn-navbar" type="submit">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
        </form>

       <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                  <!-- Notifications Dropdown Menu -->
        <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" href="{{url('/user/keranjang')}}"style="color:#000000;">
            <i class="fas fa-shopping-cart"></i>
          </a>
        </li>

          <li class="nav-item dropdown">
          <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" style="color:#ffff;" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">{{ Auth::user()->username }} <span class="caret"></span></a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              <li><a href="{{ route('profile/edit') }}" class="dropdown-item">Profil</a></li>
              <li><a class="dropdown-item" href="{{ route('logout') }}"
              onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
              {{ __('Logout') }}</a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
              </form>
            </li>
            </ul>                                                        
          </li> 
      </ul> 
    </div>
  </div>

</div>
</nav>
    <div class="content">
      <div class="container-fluid">
        @yield('content')
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->

</div>
<!-- ./wrapper -->

<!-- jQuery -->
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="{{url('plugins/jquery/jquery.min.js')}}"></script>
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{url('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="{{url('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{url('plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{url('plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{url('plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{url('plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{url('plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{url('plugins/moment/moment.min.js')}}"></script>
<script src="{{url('plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{url('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{url('plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{url('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{url('dist/js/adminlte.js')}}"></script>
<!-- Bootstrap Material Design -->
<script src="{{url('dist/js/popper.min.js')}}"></script>
<!-- <script>$(document).ready(function() { $('body').bootstrapMaterialDesign(); });</script> -->
<!-- AdminLTE for demo purposes -->
<script src="{{url('dist/js/demo.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{url('dist/js/pages/dashboard.js')}}"></script>
<!-- Select2 -->
<script src="{{url('/plugins/select2/js/select2.full.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function(){
      $('.select2').select2();
    });
</script>
@yield('js')
</body>
</html>
