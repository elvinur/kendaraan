<?php

use Illuminate\Support\Facades\Auth;
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
//     return view('auth.login');
// });

Route::get('/', 'UserController@login')->name('login.pegawai');
Route::post('/', 'UserController@ProsesLogin')->name('login.pegawai.proses');
Route::middleware('pegawai')->group(function(){
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard'); 
    Route::post('/logout', 'UserController@logout')->name('pegawai.logout');

    Route::resource('/kendaraan','KendaraanController');
    Route::get('/kendaraan-search','KendaraanController@search')->name('kendaraan.search');
    Route::get('/kendaraan-ViewUpdate/{id}','KendaraanController@ViewUpdate')->name('kendaraan.ViewUpdate');
    Route::get('/kendaraan-ViewDetail/{id}','KendaraanController@ViewDetail')->name('kendaraan.ViewDetail');

    Route::resource('/pegawai','PegawaiController');
    Route::get('/pegawai-search','PegawaiController@search')->name('pegawai.search');
    Route::get('/pegawai-ViewUpdate/{id}','PegawaiController@ViewUpdate')->name('pegawai.ViewUpdate');
    Route::get('/pegawai-ViewDetail/{id}','PegawaiController@ViewDetail')->name('pegawai.ViewDetail');
    
    Route::get('data-pegawai', 'PegawaiController@SelectPegawai')->name('data.pegawai');

    Route::resource('/pajak','PajakController');
    Route::get('/pajak-search','PajakController@search')->name('pajak.search');
    Route::get('/pajak-rekap','PajakController@rekap')->name('pajak.rekap');
    Route::get('/pajak-ViewUpdate/{id}','PajakController@ViewUpdate')->name('pajak.ViewUpdate');

    Route::get('/cetakpdf','PajakController@cetakpdf'); 

    Route::resource('/servis','ServisController');
    Route::get('/servis-rekap','ServisController@rekap')->name('servis.rekap');
    Route::get('/servis-ViewUpdate/{id}','ServisController@ViewUpdate')->name('servis.ViewUpdate');

    Route::resource('/bbm','BBMController');
    Route::get('/bbm-rekap','BBMController@rekap')->name('bbm.rekap');
    Route::get('/bbm-ViewUpdate/{id}','BBMController@ViewUpdate')->name('bbm.ViewUpdate');


    Route::resource('/transaksi','TransaksiController');
    Route::get('/transaksi-search','TransaksiController@search')->name('transaksi.search');

    Route::resource('/riwayat','HistoryController');
    Route::get('/all','HistoryController@showAll')->name('riwayat.all');

    Route::get('/laporan','LaporanController@index')->name('laporan.index');
    Route::get('/kendaraan-pdf','LaporanController@kendaraanPdf')->name('kendaraan.pdf');
    Route::get('/kendaraan-excel','LaporanController@kendaraanExcel')->name('kendaraan.excel');

    Route::get('/pajak-pdf','LaporanController@pajakPdf')->name('pajak.pdf');
    Route::get('/pegawai-pdf','LaporanController@pegawaiPdf')->name('pegawai.pdf');
    Route::get('/pegawai-excel','LaporanController@pegawaiExcel')->name('pegawai.excel');



    Route::get('/buku-pdf','LaporanController@bukuPdf')->name('buku.pdf');
    Route::get('/buku-excel','LaporanController@bukuExcel')->name('buku.excel');
    Route::get('/transaksi-pdf','LaporanController@transaksiPdf')->name('transaksi.pdf');
    Route::get('/transaksi-excel','LaporanController@transaksiExcel')->name('transaksi.excel');
    Route::resource('/petugas','PetugasController');
});


// Auth::routes();

// Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
// Route::middleware('auth')->group(function(){

    
// });
