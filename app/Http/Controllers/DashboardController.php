<?php

namespace App\Http\Controllers;

use App\User;

use App\Pegawai;
use App\Kendaraan;
use App\History;
use App\Transaksi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class DashboardController extends Controller
{
    public function index()
    {
    
             
        //chart berdasarkan jenis kelamin
        $jenis_kelamin =  Pegawai::groupBy('jenis_kelamin')->select('jenis_kelamin',DB::raw('count(*) as total'))->get();

        //chart berdasarkan pinjam dan kembali
        $transaksi_pinjam = Transaksi::withTrashed()->groupBy('status')->select('status',DB::raw('count(*) as total'))->get();
    

        $data = [
           'kendaraan' =>  Kendaraan::count(),
           'pegawai' => Pegawai::count(),
           'transaksi' => Transaksi::count(),
           'riwayat' => Transaksi::withTrashed()->count(),
           'jenis_kelamin' => $jenis_kelamin,
           'transaksi_pinjam' => $transaksi_pinjam,
    
        ];

        // dd($kendaraan_kategori);
        return view('dashboard',$data);

        
    }
}
