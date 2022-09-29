<?php

namespace App\Http\Controllers;

use App\Servis;
use App\Pegawai;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ServisController extends Controller
{
    public function index()
    {
        $daftarPegawai=Pegawai::with('kendaraan')->get();
        $data = DB::table('servis')
                ->join('kendaraan', 'kendaraan.id', '=', 'servis.kendaraan_id')
                ->join('pegawai', 'pegawai.id', '=', 'servis.pegawai_id')
                ->get();
        return view('servis.index',[
            'title' => 'Daftar Servis Kendaraan',
                        'servis' => $data,

            'daftarPegawai' => $daftarPegawai
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'pegawai_id' => 'required',
            
            'nominal' => 'required',
            'nota' => 'required',
            'jenis_servis' => 'required',

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
       Servis::create([
        'pegawai_id' => $request->pegawai_id,
        'kendaraan_id'=> $request->kendaraan_id,
        'nominal' => $request->nominal,
        'jenis_servis' => $request->jenis_servis,
        'nota' => $nama_file
        ]);

        //session success 
        return redirect('servis')->with('success','Data berhasil ditambahkan');
    }

    public function rekap()
    {
        $daftarPegawai=Pegawai::with('kendaraan')->get();
        $data = DB::table('servis')
                    ->join('kendaraan', 'kendaraan.id', '=', 'servis.kendaraan_id')
                    ->join('pegawai', 'pegawai.id', '=', 'servis.pegawai_id')
                    ->get();
        return view('servis.rekap',[
            'title' => 'Daftar Rekap servis Kendaraan',
                        'servis' => $data,

            'daftarPegawai' => $daftarPegawai
        ]);
        
    }

}
