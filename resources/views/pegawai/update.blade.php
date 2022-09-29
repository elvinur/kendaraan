<form action="{{ route('pegawai.update', $pegawai->id) }}" method="post" enctype="multipart/form-data">
@csrf
@method('put')

<div class="form-group">
    <label for="">Nama</label>
    <input type="text" name="nama" value="{{$pegawai->nama}}" class="form-control">   
</div>
<div class="form-group">
    <label for="">NIP</label>
    <input type="text" name="nip" value="{{$pegawai->nip}}" class="form-control">   
</div>
<div class="form-group">
    <label for="">No HP</label>
    <input type="text" name="no_hp" value="{{$pegawai->no_hp}}" class="form-control">   
</div>
<div class="form-group">
    <label for="">Alamat</label>
    <input type="text" name="alamat" value="{{$pegawai->alamat}}" class="form-control">   
</div>
<div class="form-group">
    <label for="">Jabatan</label>
    <input type="text" name="jabatan" value="{{$pegawai->jabatan}}" class="form-control">   
</div>
<div class="form-group">
    <label for="">Jenis Kelamin</label>
    <input type="text" name="jenis_kelamin" value="{{$pegawai->jenis_kelamin}}" class="form-control">   
</div>
<div class="form-group">
    <label for="">SK Pemegang</label>
    <input type="file" name="sk" value="{{$pegawai->sk}}" class="form-control">   
</div>
<div class="form-group">
    <label for="">Kendaraan Yang Diterima</label>
    <input type="text" name="kendaraan_id" value="{{$pegawai->kendaraan->no_polisi}}" class="form-control">   
</div>
<div class="form-group">
    <label for="">Password</label>
    <input type="password" name="password" value="{{$pegawai->password}}" class="form-control">   
</div>
<div class="float-right">
    <button type="reset" class="btn btn-danger">reset</button>
    <button type="submit" class="btn btn-primary">update</button>
</div>
</form>
