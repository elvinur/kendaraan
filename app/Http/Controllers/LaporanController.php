<?php

namespace App\Http\Controllers;

use App\Buku;
use App\Pajak;
use App\Pegawai;
use App\Kendaraan;

use App\Transaksi;
use App\Exports\PajakExport;
use Illuminate\Http\Request;
use App\Exports\PegawaiExport;
use App\Exports\KendaraanExport;
use App\Exports\TransaksiExport;


class LaporanController extends Controller
{
    public function index()
    {
        return view('laporan.index');
    }

    public function kendaraanPdf(){

        //set font pdf
        \PDF::setOptions(['dpi' => '150','defaultFont' => 'sans-serif', 'L']);

        $kendaraan = Kendaraan::orderBy('jenis','asc')->get();

        $pdf = \PDF::loadView('laporan.kendaraanPdf',compact('kendaraan'))->setPaper('f4', 'landscape');
        // return $pdf->stream('laporan_buku.pdf');
        return $pdf->download('laporan_kendaraan.pdf');
    }

    public function kendaraanExcel(){

        return \Excel::download(new KendaraanExport,'laporan_kendaraan.xlsx');
       
    }


    public function pegawaiPdf(){

        //set font pdf
        \PDF::setOptions(['dpi' => '150','defaultFont' => 'sans-serif']);

        $pegawai = Pegawai::get();

        $pdf = \PDF::loadView('laporan.pegawaiPdf',compact('pegawai'))->setPaper('f4', 'landscape');;
        // return $pdf->stream('laporan_buku.pdf');
        return $pdf->download('laporan_pegawai.pdf');
    }

    public function pegawaiExcel(){

        return \Excel::download(new PegawaiExport,'laporan_pegawai.xlsx');
       
    }
    public function pajakPdf(){

        //set font pdf
        \PDF::setOptions(['dpi' => '150','defaultFont' => 'sans-serif']);

        $pajak = Pajak::get();

        $pdf = \PDF::loadView('laporan.pajakPdf',compact('pajak'))->setPaper('f4', 'landscape');;
        // return $pdf->stream('laporan_buku.pdf');
        return $pdf->download('laporan_pajak.pdf');
    }

    



    // public function transaksiPdf(){

    //     \PDF::setOptions(['dpi' => '150','defaultFont' => 'sans-serif']);

    //     $transaksi = Transaksi::with('user','buku','pegawai')->orderBy('created_at','desc')->get();

    //     $pdf = \PDF::loadView('laporan.transaksiPdf',compact('transaksi'));
    //     // return $pdf->stream('laporan_transaksi.pdf');
    //     return $pdf->download('laporan_transaksi.pdf');
    // }

    // public function transaksiExcel(){

    //     return \Excel::download(new TransaksiExport,'laporan_transaksi.xlsx');
    // }
}

