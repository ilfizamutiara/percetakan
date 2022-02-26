<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>D-PRINT | Dashboard</title>

  <link rel="stylesheet" href="{{url('/plugins/select2/css/select2.min.css')}}">

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
  <!-- Bootstrap Material Design style -->
  <!-- <link rel="stylesheet" href="{{url('dist/css/bootstrap-material-design.min.css')}}"> -->
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


@section('js')
<script src="{{asset('asset\dist\air-datepicker\dist\js\datepicker.js')}}"></script>
<script type="text/javascript" src="jquery-3.1.0.min.js"></script>
<script type="text/javascript" src="plugins/DataTabel/media/js/jquery"></script>
<link rel="stylesheet" type="text/css" href="plugins/DataTabel/media/css/jquery.dataTables.min.css">
@stop
@yield('js')



</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light " style="height: 80px;">
      <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <ul class="navbar-nav">
      <li class="nav-item">
      <div class="info">
        </div>
      </li>
    </ul>
<!--     
    <form class="form-inline ml-4">
      <div class="input-group input-group-sm">
        <input class="form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form> -->
    <ul class="navbar-nav ml-auto">
    <li class="nav-item dropdown">

    <a id="dropdownSubMenu1"  href="#" data-toggle="dropdown" style=" margin-right: 50px;" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">{{ Auth::user()->username }} <span class="caret"></span></a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
            @if(Auth::user()->id_role ==2)
              <li><a href="{{url('profile')}}" class="dropdown-item">Profil</a></li>
            @endif
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
    <!--
    <ul class="navbar-nav">
      <li class="nav-item">
    <div class="image">cost
       <img src="dist/img/user2-160x160.jpg" class="brand-image img-circle elevation-3" alt="User Image" width="50%">
    </div>
      </li>
    </ul>
    -->

  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color:#008B8B">
    <!-- Brand Logo -->
    

    <!-- Sidebar -->
    <div class="sidebar">
      <img src="{{url('dist/img/logo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle" 
      style="margin-top: 20px; width: 200px; margin-left: 20px; margin-bottom: 10px;">

      <!-- Sidebar Menu -->
      <nav class="mt-2 ">
        @if(Auth::user()->id_role ==1)
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <!-- Add icons to the links using the .nav-icon class
                  with font-awesome or any other icon font library -->
              <li class="nav-item menu-open">
                <a href="#" class="nav-link ">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                    User
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                <!-- <li class="nav-item">
                  <a href="{{ url('/DataUser') }}" class="nav-link @if(Route::currentRouteName()=='DataUser') active @endif">
                      <i class="nav-icon fa fa-users"></i>
                      <p>Data User</p>
                    </a>
                  </li> -->
                <li class="nav-item">
                  <a href="{{ url('/percetakan') }}" class="nav-link @if(Route::currentRouteName()=='percetakan') active @endif">
                      <i class="nav-icon fa fa-store"></i>
                      <p>Percetakan</p>
                    </a>
                  </li>
                <li class="nav-item">
                <a href="{{ url('/pelanggan') }}" class="nav-link @if(Route::currentRouteName()=='pelanggan') active @endif">
                    <i class="nav-icon fas fa-user-alt"></i>
                    <p>Pelanggan</p>
                  </a>
                </li>
                </ul>
              </li>
              <li class="nav-item menu-open">
                <a href="#" class="nav-link ">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                    Keuangan
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ url('/akunbank') }}" class="nav-link @if(Route::currentRouteName()=='akunbank') active @endif">
                      <i class="nav-icon fas fa-credit-card"></i>
                      <p>Rekening</p>
                    </a>
                </li>
                <!-- <li class="nav-item">
                  <a href="{{ url('/shop_payment') }}" class="nav-link @if(Route::currentRouteName()=='transaksi') active @endif">
                    <i class="nav-icon fa fa-book"></i>
                      <p>Pembayaran Toko </p>
                  </a>
                </li> -->
                <!-- <li class="nav-item">
                  <a href="{{ url('/shop_payment/adminFree') }}" class="nav-link @if(Route::currentRouteName()=='transaksi') active @endif">
                    <i class="nav-icon fa fa-book"></i>
                      <p>Biaya Admin</p>
                  </a>
                </li> -->
                <li class="nav-item">
                  <a href="{{ url('/shop_payment/cek-pembayaranToko') }}" class="nav-link @if(Route::currentRouteName()=='transaksi') active @endif">
                    <i class="nav-icon fa fa-book"></i>
                      <p>Pembayaran Toko </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('/shop_payment/penjualan-toko') }}" class="nav-link @if(Route::currentRouteName()=='transaksi') active @endif">
                    <i class="nav-icon fa fa-book"></i>
                      <p>Penjualan toko</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('/shop_payment/laporan-pembayaran') }}" class="nav-link @if(Route::currentRouteName()=='laporan-pembayaran') active @endif">
                    <i class="nav-icon fa fa-book"></i>
                      <p>Laporan Pembayaran</p>
                  </a>
                </li>
                </ul>
              </li>
              <li class="nav-item menu-open">
                <a href="#" class="nav-link ">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                    Pesanan
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                <li class="nav-item">
                <a href="{{ url('/pesanan/indexAdmin') }}" class="nav-link @if(Route::currentRouteName()=='indexAdmin') active @endif">
                    <i class="nav-icon fas fa-cart-arrow-down"></i>
                    <p>Konfirmasi Pesanan</p>
                  </a>
                </li>
                <li class="nav-item">
                <a href="{{ url('/pesanan/prosesAdmin') }}" class="nav-link @if(Route::currentRouteName()=='prosesAdmin') active @endif">
                    <i class="nav-icon fas fa-cart-arrow-down"></i>
                    <p>Pesanan Diproses</p>
                  </a>
                </li>
                <li class="nav-item">
                <a href="{{ url('/pesanan/dikirimAdmin') }}" class="nav-link @if(Route::currentRouteName()=='dikirimAdmin') active @endif">
                    <i class="nav-icon fas fa-cart-arrow-down"></i>
                    <p>Pesanan Dikirim</p>
                  </a>
                </li>
                <li class="nav-item">
                <a href="{{ url('/pesanan/selesaiAdmin') }}" class="nav-link @if(Route::currentRouteName()=='selesaiAdmin') active @endif">
                    <i class="nav-icon fas fa-cart-arrow-down"></i>
                    <p>Pesanan Selesai</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('/pesanan/dibatalkan') }}" class="nav-link @if(Route::currentRouteName()=='dibatalkan') active @endif">
                      <i class="nav-icon fas fa-expand-arrows-alt"></i>
                      <p>Pesanan Dibatalkan</p>
                    </a>
                  </li>
              </li>
                <li class="nav-item">
                <a href="{{ url('/kategori') }}" class="nav-link @if(Route::currentRouteName()=='kategori') active @endif">
                    <i class="nav-icon fas fa-cubes"></i>
                    <p>Kategori</p>
                  </a>
                </li>
                <!-- <li class="nav-item">
                <a href="{{ url('/satuanproduk') }}" class="nav-link @if(Route::currentRouteName()=='satuanproduk') active @endif">
                    <i class="nav-icon fas fa-arrows-alt"></i>
                    <p>Satuan Produk</p>
                  </a>
                </li> -->
                <li class="nav-item">
                <a href="{{ url('/bahan') }}" class="nav-link @if(Route::currentRouteName()=='bahan') active @endif">
                    <i class="nav-icon fas fa-archive"></i>
                    <p>Bahan Produk</p>
                  </a>
                </li>
                <li class="nav-item">
                      <a href="{{ route('logout') }}" class="nav-link @if(Route::currentRouteName()=='logout') active @endif">
                        <i class="nav-icon fas fa-arrow-right"></i>
                        <p>Log Out</p>
                      </a>
              </li>   
            </ul>
            @elseif(Auth::user()->id_role ==2)
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <!-- Add icons to the links using the .nav-icon class
                  with font-awesome or any other icon font library -->
              <li class="nav-item menu-open">
                <a href="#" class="nav-link ">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Manage Store
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ url('/produk') }}" class="nav-link @if(Route::currentRouteName()=='produk') active @endif">
                      <i class="nav-icon fa fa-puzzle-piece"></i>
                        <p>produk</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ url('/akunbank') }}" class="nav-link @if(Route::currentRouteName()=='akunbank') active @endif">
                      <i class="nav-icon fas fa-credit-card"></i>
                        <p>Rekening</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item menu-open">
                <a href="#" class="nav-link ">
                  <i class="nav-icon fas fa-shopping-cart"></i>
                  <p>Pesanan</p>
                  <i class="right fas fa-angle-left"></i>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ url('/pesanan') }}" class="nav-link @if(Route::currentRouteName()=='pesanan') active @endif">
                      <i class="nav-icon fa fa-cart-arrow-down"></i>
                      <p>Pesanan Masuk</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ url('/pesanan/proses') }}" class="nav-link @if(Route::currentRouteName()=='proses') active @endif">
                      <i class="nav-icon fa fa-cart-arrow-down"></i>
                      <p>Pesanan Diproses</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ url('/pesanan/dikirim') }}" class="nav-link @if(Route::currentRouteName()=='kirim') active @endif">
                      <i class="nav-icon fa fa-truck"></i>
                      <p>Pesanan Dikirim</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ url('/pesanan/selesai') }}" class="nav-link @if(Route::currentRouteName()=='selesai') active @endif">
                      <i class="nav-icon fa fa-gift"></i>
                      <p>Pesanan Diterima</p>
                    </a>
                  </li>
                  <li class="nav-item">
                  <a href="{{ url('/pesanan/dibatalkan') }}" class="nav-link @if(Route::currentRouteName()=='dibatalkan') active @endif">
                      <i class="nav-icon fas fa-expand-arrows-alt"></i>
                      <p>Pesanan Dibatalkan</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ url('Laporan/laporan-penjualan') }}" class="nav-link @if(Route::currentRouteName()=='laporan-penjualan') active @endif">
                      <i class="nav-icon fa fa-book"></i>
                      <p>Laporan Penjualan</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ url('Laporan/laporan-transfer') }}" class="nav-link @if(Route::currentRouteName()=='laporan-transfer') active @endif">
                      <i class="nav-icon fa fa-book"></i>
                      <p>Laporan Transfer</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link @if(Route::currentRouteName()=='logout') active @endif">
                      <i class="nav-icon fa fa-arrow-right"></i>
                      <p>Log Out</p>
                    </a>
                  </li>
            </ul>
            @endif
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

   <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
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
<script src="{{url('plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{url('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{url('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{url('plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{url('plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{url('plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{url('plugins/jqvmap/jquery.vmap.js')}}"></script>
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
<script src="{{url('dist/js/bootstrap-material-design.min.js')}}"></script>
<script>$(document).ready(function() { $('body').bootstrapMaterialDesign(); });</script>
<!-- AdminLTE for demo purposes -->
<script src="{{url('dist/js/demo.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{url('dist/js/pages/dashboard.js')}}"></script>
<!-- Select2 -->
<script src="{{url('/plugins/select2/js/select2.full.min.js')}}"></script>
<script src="{{url('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{url('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{url('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{url('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{url('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{url('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{url('plugins/jszip/jszip.min.js')}}"></script>
<script src="{{url('plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{url('plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{url('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{url('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{url('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function(){
      $('.select2').select2();
    });
</script>
</body>
</html>
