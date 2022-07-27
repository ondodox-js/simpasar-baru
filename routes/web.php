<?php

use App\Http\Controllers\TransaksiRetribusiController;
use App\Http\Controllers\TransaksiSewaController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('index');
// });

// Route::get('/','ProfileController@index');
// Route::get('login','ProfileController@viewlogin');

// Route::get('profil','ProfileController@profil');

// // admin route

// Route::get('dashboard','AdminController@viewdashboard');
// // Route::get('Admin','AdminController@viewadmin');

// // barang komoditas

// Route::get('barang-komoditas','HargaBarangController@viewbarangkomoditas');
// Route::get('add-barang-komoditas','HargaBarangController@create');
// // pedagang

// Route::get('pedagang','PedagangController@viewpedagang');

// //Lapak 
// Route::get('Lapak','LapakController@index');
// Route::get('daftar-lapak','LapakController@index');

// //retribusi
// Route::get('Retribusi','RetribusiController@retribusi');


// // Lokasi

// Route::get('lokasi','LokasiDenahController@index');

// Route::get('harga-barang','HargaBarangController@ViewHarga');

Route::get('/', 'BerandaController@index')->name('home');
Route::get('/tentang', 'BerandaController@tentang')->name('tentang');
Route::get('/denah-lapak', 'BerandaController@denahLapak')->name('denah');
Route::get('/dagangan', 'BerandaController@barangDagang')->name('dagangan');

//new-route
Route::prefix('admin')->name('admin.')->middleware('admin')->group(function(){

    Route::get('/', 'AdminController@index')->name('index');

    Route::get('/laporan', 'AdminController@laporan')->name('laporan');

    Route::prefix('produk')->name('produk.')->group(function(){
        Route::get('/', 'ProdukController@index')->name('index');
        Route::get('/tambah', 'ProdukController@create')->name('tambah');
        Route::post('/', 'ProdukController@store')->name('store');
        Route::get('/{id}', 'ProdukController@edit')->name('edit');
        Route::put('/{id}', 'ProdukController@update')->name('update');
        Route::delete('/{id}', 'ProdukController@destroy')->name('destroy');
    });

    Route::prefix('pedagang')->name('pedagang.')->group(function(){
        Route::get('/', 'PedagangController@index')->name('index');
        Route::get('/tambah', 'PedagangController@create')->name('tambah');
        Route::post('/tambah', 'PedagangController@afterCreate')->name('after-create');
        Route::post('/', 'PedagangController@store')->name('store');
        Route::get('/{id}', 'PedagangController@show')->name('show');
        Route::get('/{id}/edit', 'PedagangController@edit')->name('edit');
        Route::put('/{id}', 'PedagangController@update')->name('update');
        Route::delete('/{id}', 'PedagangController@destroy')->name('destroy');
    });

    Route::prefix('lapak')->name('lapak.')->group(function(){
        Route::get('/', 'LapakController@index')->name('index');
        Route::get('/tambah', 'LapakController@create')->name('tambah');
        Route::post('/', 'LapakController@store')->name('store');
        Route::get('/{id}/edit', 'LapakController@edit')->name('edit');
        Route::put('/{id}', 'LapakController@update')->name('update');
        Route::delete('/{id}', 'LapakController@destroy')->name('destroy');
    });

    Route::prefix('retribusi')->name('retribusi.')->group(function(){
        Route::get('/', 'RetribusiController@index')->name('index');
        Route::get('/tambah', 'RetribusiController@create')->name('tambah');
        Route::get('/{id}', 'RetribusiController@edit')->name('edit');
        Route::post('/', 'RetribusiController@store')->name('store');
        Route::put('/', 'RetribusiController@update')->name('update');
        Route::delete('/{id}', 'RetribusiController@destroy')->name('destroy');
    });

    Route::prefix('sewa')->name('sewa.')->group(function(){
        Route::get('/', 'SewaController@index')->name('index');
    });

    Route::prefix('artikel')->name('artikel.')->group(function(){
        Route::get('/', 'ArtikelController@index')->name('index');
        Route::get('/tambah', 'ArtikelController@create')->name('tambah');
        Route::post('/', 'ArtikelController@store')->name('store');
        Route::delete('/{id}', 'ArtikelController@destroy')->name('destroy');
    });

    Route::prefix('transaksi')->name('transaksi.')->group(function(){
        Route::get('/', 'TransaksiController@index')->name('index');
        Route::get('/pembayaran', 'TransaksiController@showPembayaran')->name('pembayaran');
        Route::get('/berhasil', 'TransaksiController@pembayaranManualDanSimpanAkun')->name('penyewaan-awal');
        Route::get('/sewa', 'TransaksiController@sewaIndex')->name('sewa');
        Route::get('/retribusi', 'TransaksiController@retribusiIndex')->name('retribusi');
    });

    Route::post('transaksi-retribusi/after-create', 'TransaksiRetribusiController@afterCreate')->name('transaksi-retribusi.after-create');
    Route::resource('transaksi-retribusi', 'TransaksiRetribusiController');
    Route::post('transaksi-sewa/after-create', 'TransaksiSewaController@afterCreate')->name('transaksi-sewa.after-create');
    Route::resource('transaksi-sewa', 'TransaksiSewaController');
    Route::get('pdf-laporan', 'AdminController@exportLaporan')->name('export-laporan');
});

//new-route-pedagang
Route::prefix('pedagang')->name('pedagang.')->middleware('pedagang')->group(function(){
    Route::get('/', 'PedagangController@pedagangDashboard')->name('index');

    Route::get('/lapak', 'PedagangController@pedagangLapak')->name('lapak');
    Route::get('/pembayaran', 'PedagangController@pedagangPembayaran')->name('pembayaran');
    Route::prefix('transaksi')->name('transaksi.')->group(function(){
        Route::get('/', 'PedagangController@pedagangTransaksi')->name('index');
        Route::get('/sewa', 'PedagangController@pedagangSewa')->name('sewa');
        Route::get('/retribusi', 'PedagangController@pedagangRetribusi')->name('retribusi');
    });
});

Route::middleware('login')->group(function(){
    Route::get('/u/admin', 'LoginController@index')->name('u-admin');
    Route::post('/u/admin', 'LoginController@authenticate')->name('auth-admin');
    
    Route::get('/u/pedagang', 'LoginController@viewLoginPedagang')->name('u-pedagang');
    Route::post('/u/pedagang', 'LoginController@authenticatePedagang')->name('auth-pedagang');
});
Route::post('/keluar', 'LoginController@logout')->name('logout');