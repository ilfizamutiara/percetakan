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
    <table border="1" cellpadding="5" style="width: 100%; border-collapse: collapse">
        <thead>
            <tr>
                <th>No</th>
                <th>ID Pesanan</th>
                <th>Subtotal</th>
                <th>Ongkir</th>
                <th>Total</th>
            </tr>
        </thead>
        @foreach($pesanan as $data)
            <tbody>
            <tr>
                <td scope="row" class="text-center"> {{$loop->iteration}}</td>
                <td> {{$data->id_pesanan}}</td>
                <td> Rp.{{number_format($data->total_harga)}}</td>
                <td> Rp.{{number_format($data->ongkir)}}</td>
                <td> Rp.{{number_format(($data->total_harga)+($data->ongkir))}}</td>
            </tr>         
            </tbody>
            @endforeach
            <thead>
                    <tr>
                      <td></td>
                      <td> <b>Total</b> </td>
                      <td><b>Rp.{{number_format($pesanan->sum('total_harga'))}}</b></td>
                      <td><b>Rp.{{number_format($pesanan->sum('ongkir'))}}</b></td>
                      <td><b>Rp.{{number_format($pesanan->sum('ongkir'))}}</b></td> 
                    </tr>
                  </thead>
    </table><br><br>
    <table border="1" cellpadding="10" style="width: 50%; margin: left 510px; border-collapse: collapse">
    <tbody>
        <tr>
            <td>Total Penjualan</td>
            <td>Rp.{{number_format($pesanan->sum('total_harga'))}}</td>
        </tr>
        <tr>
            <td>Total Transaksi</td>
            <td>{{$pesanan->count('id_pesanan')}} transaksi</td>
        </tr>
        <!-- <tr>
            <td>Total Item Terjual</td>
            <td>{{$detail->sum('jumlah')}} item</td>
        </tr> -->
    </tbody>
    </table>    
  </div>
</body>
</html>
