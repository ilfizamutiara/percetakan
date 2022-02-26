<!DOCTYPE html>
<html>
    <head>
        <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
        <title>Laporan Pembayaran</title>
    </head>
<body>
  <br><br>
  
  <div class="container">
    <center>
		<span style="font-style: bold; font-size: 20px;"><strong>Laporan Pembayaran</strong></span><br/>
		<span style="font-size: 14px"> <b>{{date('d-m-Y', strtotime($tgl1))}}</b> s/d <b>{{date('d-m-Y', strtotime($tgl2))}}</b></span>
		<br/><br/><br/>
	</center>
    
    <br>
    <table border="1" cellpadding="5" style="width: 100%; border-collapse: collapse">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal </th>
                <th>Nama Toko</th>
                <th>Rekening Pengirim</th>
                <th>Rekening Penerima</th>
                <th>Jumlah Transfer</th>
                <th>Bukti Pembayaran</th>
                <th>Status</th>
            </tr>
        </thead>
            <tbody>
            @foreach($shop_pay as $sp )
            <tr>
                <td scope="row">{{$loop->iteration}}</td>
                <td>{{date('d-m-Y', strtotime($sp->created_at))}}</td>
                <td>{{$sp->nama_toko}}</td>
                <td>{{$sp->no_rek_pengirim}}</td>
                <td>{{$sp->no_rek_penerima}}</td>
                <td>{{$sp->jml_transfer}}</td>
                <td><img class="img-thumbnail" src="{{ asset('/upload/bukti-pembayaran/'.$sp->bukti_transfer) }}" width="150"/></td>
                <td>{{($sp->status)}}</td>
            </tr>
            @endforeach       
            </tbody>
            
    </table><br><br>
    
  </div>
</body>
</html>
