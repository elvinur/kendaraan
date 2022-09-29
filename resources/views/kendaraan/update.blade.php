
<form action="{{ route('kendaraan.update', $kendaraan->id) }}" method="post" enctype="multipart/form-data">
@csrf
@method('put')



<div class="form-group">
    <label for="">Nama Pemilik</label>
    <input type="text" name="nama_pemilik" value="{{$kendaraan->nama_pemilik}}" class="form-control">
</div>

<div class="form-group">
    <label for="">Alamat</label>
    <input type="text" name="alamat" value="{{$kendaraan->alamat}}" class="form-control">
</div>

<div class="form-group">
    <label for="">No Plat/No Registrasi</label>
    <input type="text" name="no_polisi" value="{{$kendaraan->no_polisi}}" class="form-control">   
</div>

<div class="form-group">
    <label for="">Merk</label>
    <input type="text" name="merk" value="{{$kendaraan->merk}}" class="form-control">
</div>

<div class="form-group">
    <label for="">Type</label>
    <input type="text" name="type" value="{{$kendaraan->type}}" class="form-control">
</div>

<div class="form-group">
    <label for="">Jenis</label>
    <input type="text" name="jenis" value="{{$kendaraan->jenis}}" class="form-control">
</div>

<div class="form-group">
    <label for="">Model</label>
    <input type="text" name="model" value="{{$kendaraan->model}}" class="form-control">
</div>

<div class="form-group">
    <label for="">Tahun Pembuatan</label>
    <input type="text" name="tahun_buat" value="{{$kendaraan->tahun_buat}}" class="form-control">
</div>

<div class="form-group">
    <label for="">Isi Silinder/Daya Listrik</label>
    <input type="text" name="isi_silinder" value="{{$kendaraan->isi_silinder}}" class="form-control">
</div>

<div class="form-group">
    <label for="">Nomor Rangka</label>
    <input type="text" name="no_rangka" value="{{$kendaraan->no_rangka}}" class="form-control">
</div>

<div class="form-group">
    <label for="">Nomor Mesin</label>
    <input type="text" name="no_mesin" value="{{$kendaraan->no_mesin}}" class="form-control">

<div class="form-group">
    <label for="">Warna</label>
    <input type="text" name="warna" value="{{$kendaraan->warna}}" class="form-control">   
</div>

<div class="form-group">
    <label for="">Bahan Bakar</label>
    <input type="text" name="bahan_bakar" value="{{$kendaraan->bahan_bakar}}" class="form-control">

<div class="form-group">
    <label for="">Warna TNKB</label>
    <input type="text" name="warna_tnkb" value="{{$kendaraan->warna_tnkb}}" class="form-control">
</div>

<div class="form-group">
    <label for="">Tahun Registrasi</label>
    <input type="text" name="tahun_reg" value="{{$kendaraan->tahun_reg}}" class="form-control">
</div>

<div class="form-group">
    <label for="">Berlaku Sampai</label>
    <input type="text" name="tgl_pajak" value="{{$kendaraan->tgl_pajak}}" class="form-control">   
</div>

<div class="form-group">
    <img width="150" height="150" @if($kendaraan->gambar) src="{{ asset('Storage/'.$kendaraan->gambar) }}" @endif />
    <input type="file" name="gambar" value="{{$kendaraan->gambar}}" class="uploads form-control mt-2">   
</div>

<div class="float-right">
    <button type="reset" class="btn btn-danger">reset</button>
    <button type="submit" class="btn btn-primary">update</button>
</div>
</form>
