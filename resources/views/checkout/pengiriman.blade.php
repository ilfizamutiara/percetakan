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
            <a class="btn btn-custom" style="color:#ffff;" href="{{ url('/home') }}" >Home</a>
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
        <!-- Notifications Dropdown Menu 
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-bell"></i>
            <span class="badge badge-warning navbar-badge">15</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-header">15 Notifications</span>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-envelope mr-2"></i> 4 new messages
              <span class="float-right text-muted text-sm">3 mins</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-users mr-2"></i> 8 friend requests
              <span class="float-right text-muted text-sm">12 hours</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-file mr-2"></i> 3 new reports
              <span class="float-right text-muted text-sm">2 days</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
          </div>
        </li>-->


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
        <div class="content">
      <!-- <div class="container-fluid">
          <div class="row">
              <div class="col-sm-6">
              </div>
              <div class="col-sm-12 mt-3">
                  <ol class="breadcrumb ">
                      <li class="breadcrumb-item float-right"><a  href="{{ url('/home') }}">Home</a></li>
                      <li class="breadcrumb-item float-right active">Orderan Saya</li>
                  </ol>
              </div>
          </div>
      </div> -->
          <div class="col-lg-12 mt-lg-3">
              <!-- Default box -->
            <div class="card card-solid">
              <div class="card-header">
                <h3><strong>Checkout</strong></h3>
              </div>
              <div class="row">
                <div class="col-6 ">
                  <div class="card card-solid mt-3 ml-2">
                    <div class="card-header" style="background-color:#009688 ">
                      <h4 style="color:#ffff"><strong>Alamat</strong> 
                        <a href="{{url('/checkout')}}"><i class="fas fa-edit float-right"> </i> </a></h4>
                    </div>
                    <div class="card-body">
                      <p>Nama : {{$pelanggan->nama}} <br> No HP : {{$pelanggan->no_hp}} <br> Alamat : {{$pelanggan->alamat}} <br>
                      {{$user->city_name}}, {{$user->name}},{{$user->kode_pos}}</p>
                    </div>
                  </div>
                  <!-- <form method="POST" action="{{ url('checkout/pengiriman') }}" align="left" enctype="multipart/form-data">
                    @csrf
                      <div class="col-12 mb-3">
                        <label for="nama">Nama</label>
                          <input  class="form-control @error('nama') is-invalid @enderror" id="nama" 
                          name="nama" value="{{$pelanggan->nama}}">
                          @error('nama')
                            <div class="invalid-feedback">{{$message}}</div>
                          @enderror
                      </div>
                      <div class="col-12 mb-3">
                        <label for="no_hp">No HP</label>
                          <input  class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" 
                          name="no_hp" value="{{$pelanggan->no_hp}}">
                          @error('no_hp')
                            <div class="invalid-feedback">{{$message}}</div>
                          @enderror
                      </div>
                      <div class="col-12 mb-3">
                        <label for="alamat" >Alamat</label>
                          <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" 
                          name="alamat" value="{{$pelanggan->alamat}}">
                          @error('alamat')
                              <div class="invalid-feedback">{{$message}}</div>
                          @enderror
                      </div>
                      <div class="col-12 mb-3">
                        <label for="id_province" >Provinsi</label>
                          <select name="id_province" id="province" class="form-control">
                            <option value="">-- Pilih --</option>
                            @foreach($province as $prov)
                                <option value="{{$prov->id_province}}" @if($prov->id_province == $user->id_province) selected @endif>
                                  {{$prov->name}}
                                </option>
                            @endforeach
                          </select>
                      </div>
                        <div class="col-12 mb-3">
                          <label for="id_city" >Kota</label>
                          <select name="id_city" class="form-control" id="city" >
                            <option value="">--- pilih ---</option>
                            @foreach($city as $kota)
                                <option value="{{$kota->id_province}}" @if($kota->id_city == $user->id_city) selected @endif>
                                  {{$kota->city_name}}
                                </option>
                            @endforeach
                          </select>
                        </div>
                        <div class="col-12 mb-3">
                        <label for="kode_pos" >Kode Pos</label>
                          <input type="text" class="form-control @error('kode_pos') is-invalid @enderror" id="kode_pos" 
                          name="kode_pos" value="{{$user->kode_pos}}">
                          @error('kode_pos')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                      </div> -->
                        <!-- <div class="col-12 mb-3">
                          <label for="courier" >Kurir</label>
                            <select name="kurir" id="kurir" class="form-control">
                              @foreach($kurir as $k)
                              <option value="{{$k->kurir}}">{{$k->kurir}}</option>
                              @endforeach
                            </select>
                        </div> -->
                        <!-- <div class="col-12 mb-3">
                          <label for="" >Layanan</label>
                          <select name="ongkir" class="form-control" id="ongkir"  selected="selected">
                          <option value="">--- pilih ---</option>
                          </select>
                        </div> 
                      <button type="submit" class="btn btn-primary col-12 ">Lanjut</button> 
                  </form>-->
                </div>
                <div class="col-6 ">
                <form method="POST" action="#" align="left" >
                @csrf
                  <div class="col-12 table-responsive mt-lg-3 mb-lg-5">
                    <table class="table table-striped stacktable">
                      <thead style="background-color:#009688">
                        <h3 >Daftar Belanja</h3>
                        <tr>
                          <th>Toko</th>
                          <th>Produk</th>
                          <th>Harga</th>
                          <th>Jumlah</th>
                          <th>Total</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($keranjang as $ker)
                        <tr>
                          <td>{{$ker->nama_toko}}</td>
                          <td>{{$ker->nama_produk}}</td>
                          <td>Rp.{{number_format($ker->harga)}}</td>
                          <td>{{$ker->jumlah}}</td>
                          <td>Rp.{{number_format($ker->total)}}</td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                  <div class="col-5 mt-3 float-right">
                    <div class="table-responsive">
                      <table class="table stacktable ">
                        <tr>
                          <th>Total Belanja</th>
                            <td>:</td>
                            <td>Rp.{{number_format($keranjang->sum('total'))}}</td>
                        </tr>
                          <th>Total Bayar </th>
                            <td>:</td>
                            <td>Rp.{{number_format($keranjang->sum('total'))}}</td>
                        </tr>
                      </table>
                    </div>
                  </div>
                </form>
              </div>
              </div>
            </div>
          </div>
        </div>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
        
<script src="{{url('/plugins/select2/js/select2.full.min.js')}}"></script>
<script type="text/javascript">
      $('#province').on('change',function(){
        let province = $("#province").val()
        $("#city").children().remove()
        $("#city").val('');
        $("#city").append(`<option value="">--- Pilih ---</option>`); 
        $("#city").prop('disabled',true)
        if(province!='' && province!=null){
          $.ajax({
            url:"/getProvince/"+province,
              success:function(res){
              $("#city").prop('disabled',false)
              let tampilan_option = '';
              $.each(res,function(index,data){
                tampilan_option+=`<option value="${data.id_city}">${data.city_name}</option>`
              })
              $("#city").append(tampilan_option)

            }
          });
        } 
      });
    // $('#kurir').on('change',function(){
    //     var kurir = $('#kurir').val();
    //     // console.log(kurir);
    //     $("#ongkir").val('');
    //     $("#ongkir").append(`<option value="">--- Pilih ---</option>`); 
    //     $("#ongkir").prop('disabled',true)
    //     if(kurir!='' && kurir!=null){
    //       $.ajax({
    //         url:"/checkout/pengiriman/"+kurir,
    //           success:function(res){
    //           $("#ongkir").prop('disabled',false)
    //           let tampilan_option = '';
    //           $.each(res,function(index,data){
    //             tampilan_option+=`<option value="----</option>`
    //           })
    //           $("#ongkir").append(tampilan_option)

    //         }
    //       });
    //     } 
        
        
    // });
</script>
<!-- <script type="text/javascript">
    $(document).ready(function(){
      $('#province').on('change',function(){
        var provinceID = $(this).val();
        if(provinceID){
          $.ajax({
            url: '/getProvince/'+provinceID,
            type: "GET",
            data: {"_token":"{{csrf_token()}}"},
            dataType: "json",
            success:function(data)
            {
              if(data){
                $('#city').empty();
                $('#city').append('<option hidden>choose City</option>');
                $.each(data, function(key, city){
                  $('select[name="city"]').append('<option value="'+ key +'">' + city.city_name+ '</option>');
                });
              }else{
                $('#city').empty();
              }

            }
          });
        }else{
          $('#city').empty();
        }
      });
    });
</script> -->
</body>
</html>


