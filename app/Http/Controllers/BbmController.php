<?php

namespace App\Http\Controllers;

use App\BBM;
use App\Pegawai;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BbmController extends Controller
{
    public function index()
    {
        $daftarPegawai=Pegawai::with('kendaraan')->get();
        $data = DB::table('bbm')
                    ->join('kendaraan', 'kendaraan.id', '=', 'bbm.kendaraan_id')
                    ->join('pegawai', 'pegawai.id', '=', 'bbm.pegawai_id')
                    ->get();
        return view('bbm.index',[
            'title' => 'Daftar Pembelian BBM Kendaraan',
                        'bbm' => $data,

            'daftarPegawai' => $daftarPegawai
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'pegawai_id' => 'required',
            
            'nominal' => 'required',
            'nota' => 'required',
            'jenis_bbm' => 'required',

            'no_polisi' => 'required'
        
        ],[
            'required' => 'atribute tidak boleh kosong',
            'unique' => 'atribute sudah terdaftar',
            'max' => 'karakter max 25',
            'image' => 'atribute harus gambar',
            // 'mimes' => 'atribute harus format jpg,jpeg,png atau svg'
        ]);

        if ($request->hasFile('nota')) {
            $file = $request->file('nota');
            $nama_file = time()."_".$file->getClientOriginalName();
           
            $tujuan_upload = 'storage/servis/';
            $file->move($tujuan_upload,$nama_file);
        }
        
        //insert to database kendaraan
       BBM::create([
        'pegawai_id' => $request->pegawai_id,
        'kendaraan_id'=> $request->kendaraan_id,
        'nominal' => $request->nominal,
        'jenis_bbm' => $request->jenis_bbm,
        'nota' => $nama_file
        ]);

        //session success 
        return redirect('servis')->with('success','Data berhasil ditambahkan');
    }

    public function rekap()
    {
        $daftarPegawai=Pegawai::with('kendaraan')->get();
        $data = DB::table('bbm')
                    ->join('kendaraan', 'kendaraan.id', '=', 'bbm.kendaraan_id')
                    ->join('pegawai', 'pegawai.id', '=', 'bbm.pegawai_id')
                    ->get();
        return view('bbm.rekap',[
            'title' => 'Daftar Rekap Pembelian BBM Kendaraan',
                        'bbm' => $data,

            'daftarPegawai' => $daftarPegawai
        ]);
    }
}
