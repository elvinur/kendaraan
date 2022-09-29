<?php

namespace App\Http\Controllers;

use App\User;
use App\Pegawai;
use App\Kendaraan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pegawai.index',[
            'title' => 'Daftar Pegawai',
            'pegawai' =>  Pegawai::orderBy('nama','asc')->paginate(4),
            'users' => User::get(),
            'kendaraan' => Kendaraan::get()
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
        //validasi
        $message = [
            'required' => 'atribute tidak boleh kosong',
            'unique' => 'atribute sudah ada',
            'numeric' => 'atribute harus angka',
            // 'mimes' => 'atribut harus format pdf,doc,docx'
        ];

        $request->validate([
            'nama' => 'required',
            'nip' => 'required|unique:pegawai|numeric',
            'no_hp' => 'required|numeric',
            'alamat' => 'required',
            'jabatan' => 'required',
            'jenis_kelamin' => 'required',
            'user_id' => 'required',
            'kendaraan_id' => 'required',
            'sk' => 'required',
            'password' => 'required',
            'created_at' => Carbon::now()
        ],$message);

        if ($request->hasFile('sk')) {
            $file = $request->file('sk');
            $nama_file = time()."_".$file->getClientOriginalName();
           
            $tujuan_upload = 'storage/sk/';
            $file->move($tujuan_upload,$nama_file);
        }
        

 
        //insert DB Pegawai
        $password=Hash::make($request->password);
        Pegawai::create([
            'nama' => $request->nama,
            'nip' => $request->nip,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'jabatan' => $request->jabatan,
            'sk'=> $request->$nama_file,
            'jenis_kelamin' => $request->jenis_kelamin,
            'password' => $password,
            'user_id' => $request->user_id,
            'kendaraan_id'=> $request->kendaraan_id,
            
        ]);
        return redirect('pegawai')->with('success','pegawai berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pegawai = Pegawai::with('user, kendaraan')->find($id);
        return view('pegawai.show',compact('pegawai'));
    }

    public function ViewDetail($id)
    {
        $dataPegawai=Pegawai::where ('id', '=', $id)->first();
        return view('pegawai.view', ['pegawai'=>$dataPegawai]);
        

    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pegawai = Pegawai::with('user')->find($id);
        $users = User::get();
        return view('pegawai.edit',compact('pegawai','users'));
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
        $password=Hash::make($request->password);
       $pegawai =  Pegawai::find($id);
       $pegawai->update([
            'nama' => $request->nama ?? $pegawai->nama,
            'nip' => $request->nip ?? $pegawai->nip,
            'no_hp' => $request->no_hp ?? $pegawai->no_hp,
            'alamat' => $request->alamat ?? $pegawai->alamat,
            'jabatan' => $request->jabatan ?? $pegawai->jabatan,
            'jenis_kelamin' => $request->jenis_kelamin ?? $pegawai->jenis_kelamin,
            'user_id' => $request->user_id ?? $pegawai->user_id,
            'password' => $password
       ]);
       return redirect('pegawai')->with('success','pegawai berhasil diupdate');
    }

    public function ViewUpdate($id)
    {
        $dataPegawai=Pegawai::where ('id', '=', $id)->first();
        return view('pegawai.update', ['pegawai'=>$dataPegawai]);
        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pegawai::find($id)->delete();
        return redirect('pegawai')->with('success','pegawai berhasil dihapus');
    }

    public function search(Request $request){

        $cari = $request->get('q');
        $pegawai = Pegawai::where('nip','LIKE',"%$cari%")->orWhere('nama','LIKE',"%$cari%")->paginate();
        return view('pegawai.index',[
            'title' => 'Daftar pegawai',
            'pegawai' =>  $pegawai,
            'users' => User::get()
        ]);
        
    }

    public function SelectPegawai(Request $request){
        // dd($request->all());
        $dataPegawai=Pegawai::where('id', '=', $request->id_pegawai)->with('kendaraan')->first();
        return  $dataPegawai -> toJson(JSON_PRETTY_PRINT);
    }
}
