<!DOCTYPE html>
<html>
    <head>
        <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
        <title>Laporan Penjualan</title>
    </head>
<body>
  <br><br>
  
  <div class="container">
    <center>
		<span style="font-style: bold; font-size: 20px;"><strong>Laporan Penjualan</strong></span><br/>
		<span style="font-size: 14px"> <b>{{date('d-m-Y', strtotime($tgl1))}}</b> s/d <b>{{date('d-m-Y', strtotime($tgl2))}}</b></span>
		<br/><br/><br/>
	</center>
    
    <br>
    <p>{{Carbon\Carbon::parse($tgl1)->translatedFormat('j F Y')}} - {{Carbon\Carbon::parse($tgl2)->translatedFormat(' j F Y')}}</p>
                    <div class="row">
                      <div class="col-6">
                      <table class="table table-bordered" style="padding:0;">
                      <thead>
                      <th>No</th>
                        <th>Nama Toko</th>
                      </thead>
                      <tbody>
                      @foreach($percetakan as $toko )
                      <tr>
                      <td scope="row">{{$loop->iteration}}</td>
                          <td>{{$toko->nama_toko}}</td>
                      
                          </tr>
                    @endforeach
                      </tbody>
                      </table>
                      </div>
                      <div class="col-3">
                        <table class="table table-bordered" style="padding:0;">
                        <thead>
                      <th>Total transaksi</th>
                      </thead>
                      <tbody>
                      @foreach($arrTotTrans as $totTrans)
                    <tr>
                          <td>{{$totTrans}}</td>
                    </tr>
                    @endforeach
                      </tbody>
                        </table>
                      </div>
                      <div class="col-3">
                        <table class="table table-bordered" style="padding:0;">
                        <thead>
                      <tr>
                        <th>Total Pembayaran</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($arrTotBayar as $totBayar)
                    <tr>
                          <td>Rp.{{number_format($totBayar)}}</td>
                    </tr>
                    @endforeach
                    
                      </tbody>
                      
                  </table>
                      </div>
                </div>
  </div>
</body>
</html>
