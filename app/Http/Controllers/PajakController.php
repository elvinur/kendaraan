<?php

namespace App\Http\Controllers;

use App\User;
use App\Pajak;
use App\Pegawai;
use App\Kendaraan;
use Carbon\Carbon;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class PajakController extends Controller
{
    public function index()
    {
        $daftarPegawai=Pegawai::with('kendaraan')->get();
        $data = DB::table('pajak')
                    ->join('kendaraan', 'kendaraan.id', '=', 'pajak.kendaraan_id')
                    ->join('pegawai', 'pegawai.id', '=', 'pajak.pegawai_id')
                    ->get();
        $pegawai = Auth::user()->id;
        return view('pajak.index',[
            'title' => 'Daftar Pajak Kendaraan',
                        'pajak' => $data,
            'daftarPegawai' => $daftarPegawai,
            'pegawai' => $pegawai
        ]);
        
    }


    public function store(Request $request)
    {
        //validasi
        $message = [
            'required' => 'atribute tidak boleh kosong',
            'unique' => 'atribute sudah ada',
            'numeric' => 'atribute harus angka',
            // 'mimes' => 'atribut harus format pdf,doc,docx'
        ];

        $request->validate([
            'pegawai_id' => 'required',
            
            'nominal' => 'required',
            'nota' => 'required',
            
            'tgl_pajak' => 'required',
            'no_polisi' => 'required'
        ],$message);

        if ($request->hasFile('nota')) {
            $file = $request->file('nota');
            $nama_file = time()."_".$file->getClientOriginalName();
           
            $tujuan_upload = 'storage/pajak/';
            $file->move($tujuan_upload,$nama_file);
        }
        

 
        //insert DB 
        Pajak::create([
            'pegawai_id' => $request->pegawai_id,
            'kendaraan_id'=> $request->kendaraan_id,
            'nominal' => $request->nominal,
            'nota' => $nama_file
        ]);
        return redirect('pajak')->with('success','Data berhasil ditambahkan');
    }

    public function rekap()
    {
        $daftarPegawai=Pegawai::with('kendaraan')->get();
        $data = DB::table('pajak')
                    ->join('kendaraan', 'kendaraan.id', '=', 'pajak.kendaraan_id')
                    ->join('pegawai', 'pegawai.id', '=', 'pajak.pegawai_id')
                    ->get();
        return view('pajak.rekap',[
            'title' => 'Daftar Rekap Pajak Kendaraan',
                        'pajak' => $data,

            'daftarPegawai' => $daftarPegawai
        ]);
        
    }

    public function ViewUpdate($id)
    {
        $dataPajak=Pajak::where ('id', '=', $id)->first();
        return view('pajak.update', ['pajak'=>$dataPajak]);
        

    }

    public function destroy($id)
    {
        Pajak::find($id)->delete();
        return redirect('pajak')->with('success','pegawai berhasil dihapus');
    }

    // public function cetakpdf()  {
    //     $dataPajak = DB::table('pajak')->get();
    //     $pdf = PDF::loadview('cetakpdf',['pajak'=>$dataPajak]);
    //     return $pdf->download('laporan-pajak.pdf');  } 
    
}
