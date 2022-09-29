<?php

namespace App\Http\Controllers;

use App\Kendaraan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class KendaraanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $test=Kendaraan::orderBy('nama_pemilik','asc')->paginate(4);
        // dd($test);
        // die(var_dump($test));
        return view('kendaraan.index',[
            'title' => 'Daftar Kendaraan',
            'kendaraan' => Kendaraan::orderBy('nama_pemilik','asc')->paginate(4)
        ]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_pemilik' => 'required',
            'alamat' => 'required',
            'merk' => 'required',
            'type' => 'required',
            'jenis' => 'required',
            'model' => 'required',
            'tahun_buat' => 'required',
            'isi_silinder' => 'required',
            'no_rangka' => 'required',
            'no_mesin' => 'required',
            'warna' => 'required',
            'bahan_bakar' => 'required',
            'warna_tnkb' => 'required',
            'tahun_reg' => 'required',
            'no_polisi' => 'required',
            'tgl_pajak' => 'required',
            'gambar' => 'required',
            // 'gambar' => 'required|image|mimes:jpg,jpeg,png,svg'
        
        ],[
            'required' => 'atribute tidak boleh kosong',
            'unique' => 'atribute sudah terdaftar',
            'max' => 'karakter max 25',
            'image' => 'atribute harus gambar',
            // 'mimes' => 'atribute harus format jpg,jpeg,png atau svg'
        ]);

        //request file gambar jika ada tambahkan dan jika kosong
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $fileName = $file->store('img/kendaraan');
        }
        
        //insert to database kendaraan
       Kendaraan::create([
            'nama_pemilik' => $request->nama_pemilik,
            'alamat' => $request->alamat,
            'merk' => $request->merk,
            'type' => $request->type,
            'jenis' => $request->jenis,
            'model' => $request->model,
            'tahun_buat' => $request->tahun_buat,
            'isi_silinder' => $request->isi_silinder,
            'no_rangka' => $request->no_rangka,
            'no_mesin' => $request->no_mesin,
            'warna' => $request->warna,
            'bahan_bakar' => $request->bahan_bakar,
            'warna_tnkb' => $request->warna_tnkb,
            'tahun_reg' => $request->tahun_reg,
            'no_polisi' => $request->no_polisi,
            'tgl_pajak'  => $request->tgl_pajak,
            'gambar' => $fileName ?? '',
            'created_at' => Carbon::now()
        ]);

        //session success 
        return redirect('kendaraan')->with('success','kendaraan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $kendaraan = Kendaraan::find($id);
        return view('kendaraan.show',compact('kendaraan'));
    }

    public function ViewDetail($id)
    {
        $dataKendaraan=Kendaraan::where ('id', '=', $id)->first();
        
        return view('kendaraan.view', ['kendaraan'=>$dataKendaraan]);
        

    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        // dd($id);
        
        $kendaraan = Kendaraan::find($id);
       
        return view('kendaraan.edit',compact('kendaraan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   

        $kendaraan = Kendaraan::find($id);
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            Storage::delete($kendaraan->gambar);
            $fileName = $file->store('kendaraan');
        }else{
            $fileName = $kendaraan->gambar;
        }

        $kendaraan->update([
            'nama_pemilik' => $request->nama_pemilik,
            'warna' => $request->warna ?? $kendaraan->warna,
            'no_polisi' => $request->no_polisi,
            'tgl_pajak' => $request->tgl_pajak,
            'gambar' => $fileName ?? $request->file('gambar'),
            'updated_at' => Carbon::now()
        ]);
        return redirect('kendaraan')->with('success','kendaraan berhasil diupate');
    }

    public function ViewUpdate($id)
    {
        $dataKendaraan=Kendaraan::where ('id', '=', $id)->first();
        
        return view('kendaraan.update', ['kendaraan'=>$dataKendaraan]);
        

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kendaraan = Kendaraan::find($id);
        Storage::delete($kendaraan->gambar);
        $kendaraan->delete();
        return redirect('kendaraan')->with('success','data berhasil dihapus');

    }

    // pencarian
    public function search(Request $request){

        
        $request->validate([
            'q' => 'required'
        ],[
            'required' => 'atribute tidak boleh kosong'
        ]);
        $cari = $request->q;
        $kendaraan = Kendaraan::where('jenis','LIKE',"%$cari%")->orWhere('tipe','LIKE',"%$cari%")->paginate();
        // die(var_dump($kendaraan));
        return view('kendaraan.index',[
            'title' => 'Daftar Kendaraan',
            'kendaraan' => $kendaraan
        ]);
    }
}
