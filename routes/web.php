<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PercetakanController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\SatuanController;
use App\Http\Controllers\ProfilController;
use App\Models\produk;
use Illuminate\Http\Request;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function (Request $request) {
    $filterKeyword = $request->keyword;
    $produk= Produk::select('id_produk','nama_toko','satuan','nama_produk','harga','keterangan','gambar')
                            ->join('satuan_produk','produk.id_satuan_produk','=','satuan_produk.id_satuan_produk')
                            ->join('percetakan','produk.id_percetakan','percetakan.id_percetakan')
                            ->where('nama_produk','like',"%".$filterKeyword."%")
                            ->get();
    return view('welcome',compact('produk'));
});

Route::get('/seller', function(){
        return view('seller');
})->name('seller');
// Route::get('/laporan-penjualan', function(){
//     return view('laporan-penjualan');
// })->name('laporan-penjualan');

Auth::routes();
Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home')->middleware('auth');
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout']);



//  Route::middleware('role:pelanggan')->get('/dashboard', function(){
//      return 'Dashboard';
//  })->name('dashboard');

Route::middleware('role:admin')->get('/dashboardAdmin', 'App\Http\Controllers\DashboardAdminController@index')->name('dashboardAdmin');
Route::middleware('role:percetakan')->get('/dashboardPercetakan', 'App\Http\Controllers\DashboardPercetakanController@index')->name('dashboardPercetakan');
Route::middleware('role:percetakan')->get('/layouts/admin', 'App\Http\Controllers\DashboardPercetakanController@addfoto');
Route::get('/registerpercetakan', 'App\Http\Controllers\PercetakanController@create')->name('registerpercetakan');

//percetakan
Route::get('percetakan', 'App\Http\Controllers\PercetakanController@index')->name('percetakan')->middleware('role:admin');
Route::get('percetakan/create', 'App\Http\Controllers\PercetakanController@create')->name('percetakan');
Route::post('percetakan', 'App\Http\Controllers\PercetakanController@store')->name('percetakan');
Route::put('percetakan/{id}', 'App\Http\Controllers\PercetakanController@update');
Route::get('percetakan/edit/{id}', 'App\Http\Controllers\PercetakanController@edit');
Route::post('/percetakan/update/{id}', 'App\Http\Controllers\PercetakanController@update')->name('updatepercetakan');
Route::get('percetakan/delete/{id}', 'App\Http\Controllers\PercetakanController@destroy');

Route::get('DataUser', 'App\Http\Controllers\DataUserController@index')->name('DataUser')->middleware('role:admin');

//satuan produk
Route::get('satuanproduk', 'App\Http\Controllers\SatuanController@index')->name('satuanproduk')->middleware('role:admin');
Route::get('satuanproduk/create', 'App\Http\Controllers\SatuanController@create');
Route::post('satuanproduk', 'App\Http\Controllers\SatuanController@store')->name('satuanproduk');
Route::post('satuanproduk/{id_satuan_produk}', 'App\Http\Controllers\SatuanController@update')->name('satuanproduk');
Route::get('satuanproduk/edit/{id_satuan_produk}', 'App\Http\Controllers\SatuanController@edit');
Route::get('satuanproduk/delete/{id_satuan_produk}', 'App\Http\Controllers\SatuanController@destroy');

//bahan produk
Route::get('bahan', 'App\Http\Controllers\BahanController@index')->name('bahan')->middleware('role:admin');
Route::get('bahan/create', 'App\Http\Controllers\BahanController@create');
Route::post('bahan', 'App\Http\Controllers\BahanController@store')->name('bahan');
Route::post('bahan/{id_bahan}', 'App\Http\Controllers\BahanController@update');
Route::get('bahan/edit/{id_bahan}', 'App\Http\Controllers\BahanController@edit')->name('bahan');
Route::get('bahan/delete/{id_bahan}', 'App\Http\Controllers\BahanController@destroy');


//Kategori Produk
Route::get('kategori', 'App\Http\Controllers\KategoriController@index')->name('kategori')->middleware('role:admin');
Route::get('kategori/create', 'App\Http\Controllers\KategoriController@create');
Route::post('kategori', 'App\Http\Controllers\KategoriController@store');
Route::post('kategori/{id_kategori}', 'App\Http\Controllers\KategoriController@update');
Route::get('kategori/edit/{id_kategori}', 'App\Http\Controllers\KategoriController@edit');
Route::get('kategori/delete/{id_kategori}', 'App\Http\Controllers\KategoriController@destroy');

Route::get('/pelanggan', 'App\Http\Controllers\PelangganController@index')->name('pelanggan')->middleware('role:admin');
//Produk
Route::get('produk', 'App\Http\Controllers\ProdukController@index')->name('produk.index')->middleware('role:percetakan');
Route::get('produk/create', 'App\Http\Controllers\ProdukController@create')->name('produk');
Route::post('produk', 'App\Http\Controllers\ProdukController@store')->name('produk');
Route::post('produk/{id_produk}', 'App\Http\Controllers\ProdukController@update')->name('produk');
Route::get('produk/edit/{id_produk}', 'App\Http\Controllers\ProdukController@edit')->name('produk');
Route::get('produk/delete/{id_produk}', 'App\Http\Controllers\ProdukController@destroy')->name('produk');

//daftarpesanan pada admin dan toko
Route::group(['middleware' => 'auth'], function () {
    Route::get('/pesanan', 'App\Http\Controllers\PesananController@index')->name('pesanan');
    Route::get('/pesanan/indexAdmin', 'App\Http\Controllers\PesananController@indexAdmin')->name('indexAdmin');
    Route::get('/pesanan/proses', 'App\Http\Controllers\PesananController@pesanandiproses');
    Route::get('/pesanan/prosesAdmin', 'App\Http\Controllers\PesananController@pesanandiprosesAdmin');
    Route::get('/pesanan/dikirim', 'App\Http\Controllers\PesananController@pesanandikirim');
    Route::get('/pesanan/dikirimAdmin', 'App\Http\Controllers\PesananController@pesanandikirimAdmin');
    Route::get('/pesanan/selesai', 'App\Http\Controllers\PesananController@pesananselesai');
    Route::get('/pesanan/dibatalkan', 'App\Http\Controllers\PesananController@pesanandibatalkan');
    Route::post('/riwayat/{id_pesanan}', 'App\Http\Controllers\RiwayatController@updatePesananDibatalkan');
    Route::get('/pesanan/selesaiAdmin', 'App\Http\Controllers\PesananController@pesananselesaiAdmin');
    Route::get('/pesanan/show/{id_pesanan}', 'App\Http\Controllers\PesananController@show');
    Route::get('/pesanan/status/{id_status_pesanan}', 'App\Http\Controllers\PesananController@status');
    Route::get('/pesanan/showproses/{id_pesanan}', 'App\Http\Controllers\PesananController@showproses');
    Route::get('/pesanan/edit/{id_pesanan}', 'App\Http\Controllers\PesananController@editpesan')->name('pesanan');
    Route::post('/pesanan/{id_pesanan}', 'App\Http\Controllers\PesananController@updatepesan');
    Route::post('/pesanan/{id_pesanan}', 'App\Http\Controllers\PesananController@updateproses');
    Route::get('/pesanan/editproses/{id_pesanan}', 'App\Http\Controllers\PesananController@editkirim')->name('pesan');
    Route::post('/pesan/{id_pesanan}', 'App\Http\Controllers\PesananController@updatekirim');
    Route::post('/user/riwayat/{id_pesanan}', 'App\Http\Controllers\RiwayatController@updatePesananDiterima')->name('updatePesananDiterima');
    Route::post('/pesanan/dikirim/{id_pesanan}', 'App\Http\Controllers\PesananController@updatePesananDiterima')->name('updatePesananDiterima');

});

//Akun Bank Toko
Route::get('/akunbank', 'App\Http\Controllers\AkunBankController@index')->name('akunbank')->middleware('auth');
Route::get('/akunbank/create', 'App\Http\Controllers\AkunBankController@create');
Route::post('/akunbank', 'App\Http\Controllers\AkunBankController@store');
Route::post('/akunbank/{id_rek}', 'App\Http\Controllers\AkunBankController@update');
Route::get('/akunbank/edit/{id_rek}', 'App\Http\Controllers\AkunBankController@edit');
Route::get('/akunbank/delete/{id_rek}', 'App\Http\Controllers\AkunBankController@destroy');

Route::get('user/toko', 'App\Http\Controllers\DashboardController@index')->name('user')->middleware('auth');
Route::get('user/lihatproduk/{id_percetakan}', 'App\Http\Controllers\DashboardController@show');
Route::get('user/detailproduk/{id_produk}', 'App\Http\Controllers\DashboardController@create')->name('detailproduk')->middleware('auth');
Route::post('detailproduk', 'App\Http\Controllers\DashboardController@addcart')->name('detailproduk');
Route::get('user/editkeranjang/{id_keranjang}', 'App\Http\Controllers\DashboardController@editkeranjang');
Route::post('detailproduk/{id_keranjang}', 'App\Http\Controllers\DashboardController@updatecart')->name('detailproduk');
Route::get('/checkout', 'App\Http\Controllers\CheckoutController@index')->name('checkout');
Route::post('/checkout', 'App\Http\Controllers\CheckoutController@update')->name('order');
Route::get('checkout/checkout', 'App\Http\Controllers\DashboardController@checkout')->name('user')->middleware('auth');
Route::get('checkout/upload_file', 'App\Http\Controllers\DashboardController@upload_file');
Route::post('checkout/upload_file', 'App\Http\Controllers\DashboardController@simpanFile')->name('order');
Route::post('checkout/pengiriman', 'App\Http\Controllers\DashboardController@adddokcart')->name('order');
Route::get('checkout/pengiriman/', 'App\Http\Controllers\DashboardController@pengiriman');
Route::get('getProvince/{id_province}', function($id_province){
    $city = App\Models\City::where('id_province',$id_province)->get();
    return response()->json($city);
});
// Route::get('getKurir/{id_province}', function(){
//     return response()->json($city);
// });
// Route::post('checkout/pengiriman', 'App\Http\Controllers\DashboardController@store');
Route::get('user/pembayaran/{id_pesanan}', 'App\Http\Controllers\PaymentController@create');
Route::post('user/pembayaran/{id_pesanan}', 'App\Http\Controllers\PaymentController@store');
Route::get('user/detailpesanan/{id_pesanan}', 'App\Http\Controllers\RiwayatController@detailpesanan')->name('user')->middleware('auth');



Route::get('order/getprovince', 'App\Http\Controllers\DashboardController@getprovince');
Route::get('order/getcity', 'App\Http\Controllers\DashboardController@getcity');
Route::get('order/checkshipping', 'App\Http\Controllers\DashboardController@checkshipping');
Route::post('checkout/pengiriman', 'App\Http\Controllers\DashboardController@processShipping');
Route::get('checkout/shipping', 'App\Http\Controllers\DashboardController@order');
// Route::get('keranjang/tambahkeranjang/{id_produk}', 'App\Http\Controllers\DashboardController@create')->name('keranjang');
// Route::post('tambahkeranjang', 'App\Http\Controllers\DashboardController@addcart')->name('tambahkeranjang');
Route::get('user/riwayat', 'App\Http\Controllers\RiwayatController@index')->name('user')->middleware('auth');

// Route::get('keranjang/tambahkeranjang/{id_produk}', 'App\Http\Controllers\DashboardController@create')->name('keranjang');
// Route::post('tambahkeranjang', 'App\Http\Controllers\DashboardController@addcart')->name('tambahkeranjang');
Route::get('user/keranjang', 'App\Http\Controllers\DashboardController@tkeranjang')->name('user')->middleware('auth');
Route::get('layouts/costumer', 'App\Http\Controllers\DashboardController@keranjang');
Route::get('user/keranjang/delete/{id_keranjang}', 'App\Http\Controllers\DashboardController@destroy')->name('user')->middleware('auth');
Route::get('user/keranjang/delete/{id_keranjang}', 'App\Http\Controllers\DashboardController@hapus')->name('user')->middleware('auth');

Route::get('registerpercetakan', 'App\Http\Controllers\RegisterPercetakanController@create')->name('registerpercetakan');
Route::post('registerpercetakan', 'App\Http\Controllers\RegisterPercetakanController@store')->name('registerpercetakan');

//Profil
Route::group(['middleware' => 'auth'], function () {
    Route::get('profile/edit', 'App\Http\Controllers\ProfilController@edit')->name('profile/edit');
    Route::post('profile', 'App\Http\Controllers\ProfilController@update')->name('profile.update');
});

//laporan
Route::group(['middleware' => 'auth'], function () {
    Route::get('Laporan/laporan-penjualan', 'App\Http\Controllers\LaporanController@laporanPenjualan')->name('Laporan/laporan-penjualan');
    Route::get('Laporan/cetak-laporanpenjualan', 'App\Http\Controllers\LaporanController@cetakLaporanPenjualan')->name('cetakLaporanPenjualan');
    Route::get('Laporan/laporan-transfer', 'App\Http\Controllers\LaporanController@laporanTransfer')->name('Laporan/laporan-transfer');
    Route::get('Laporan/cetak-laporanTransfer', 'App\Http\Controllers\LaporanController@cetakLaporanTransfer')->name('Laporan/cetak-laporanTransfer');

});

//Pembayaran Toko
Route::group(['middleware' => 'auth'], function () {
    Route::get('shop_payment', 'App\Http\Controllers\ShopPaymentController@index')->name('shop_payment');
    Route::get('shop_payment/transfer/{id_percetakan}', 'App\Http\Controllers\ShopPaymentController@transfer')->name('transfer');
    Route::post('shop_payment/cek-pembayaran/{id_percetakan}', 'App\Http\Controllers\ShopPaymentController@store');
    Route::get('shop_payment/cek-pembayaran/{id_percetakan}', 'App\Http\Controllers\ShopPaymentController@cekPembayaran')->name('shop_payment/cek-pembayaran');
    Route::get('shop_payment/cek-pembayaranToko', 'App\Http\Controllers\ShopPaymentController@cekPembayaranToko')->name('shop_payment/cek-pembayaranToko');
    Route::get('shop_payment/laporan-pembayaran', 'App\Http\Controllers\ShopPaymentController@laporanPembayaran')->name('shop_payment/laporan-pembayaran');
    Route::get('shop_payment/cetak-laporanPembayaran', 'App\Http\Controllers\ShopPaymentController@cetakLaporanPembayaran')->name('shop_payment/cetak-laporanPembayaran');
    Route::get('shop_payment/penjualan-toko', 'App\Http\Controllers\ShopPaymentController@penjualanToko')->name('shop_payment/penjualan-toko');
    Route::get('shop_payment/cetak-laporanPenjualanToko', 'App\Http\Controllers\ShopPaymentController@cetakPenjualanToko')->name('shop_payment/cetak-laporanPenjualanToko');
    Route::get('shop_payment/details/{id_percetakan}', 'App\Http\Controllers\ShopPaymentController@LaporanPenjualanToko')->name('shop_payment/details/{id_percetakan}');
    Route::get('shop_payment/adminFree', 'App\Http\Controllers\ShopPaymentController@adminFree')->name('shop_payment/adminFree');

});


// Route::get('profile','App\Http\Controllers\ProfilController@edit')->name('profile');
// Route::post('profile/{id}', 'App\Http\Controllers\ProfilController@update');


// Route::get('/profile', 'App\Http\Controllers\ProfilController@index')->middleware('role:percetakan');
// Route::post('profile/profil/{id}', 'App\Http\Controllers\ProfilController@update');
// Route::get('profile/profil/{id}', 'App\Http\Controllers\ProfilController@edit')->name('profile');

// Route::get('/profile/profilCostumer', 'App\Http\Controllers\ProfilController@profil')->middleware('role:pelanggan');
// Route::post('profile/{id}', 'App\Http\Controllers\ProfilController@update');
// Route::get('profile/{id}', 'App\Http\Controllers\ProfilController@edit')->name('profile');

