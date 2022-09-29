<label>Data Pegawai</label>
<ul class="list-group list-group-flush">
    <li class="list-group-item">Nama Lengkap : {{ $pegawai->nama }}</li> 
    <li class="list-group-item">NIP : {{ $pegawai->nip }}</li> 
    <li class="list-group-item">No HP : {{ $pegawai->no_hp }}</li>  
    <li class="list-group-item">Alamat : {{ $pegawai->alamat }}</li>
    <li class="list-group-item">Jabatan : {{ $pegawai->jabatan }}</li>   
    <li class="list-group-item">SK Pemegang : {{ $pegawai->sk }}</li> 
    <li class="list-group-item">Jenis Kelamin : {{ $pegawai->jenis_kelamin }}</li> 
<div class="form-group">
</ul>

<label>Detail Kendaraan Yang Diterima</label>
<ul class="list-group list-group-flush">
    <li class="list-group-item">Nama Pemilik : {{ $pegawai->kendaraan->nama_pemilik }}</li>  
    <li class="list-group-item">Alamat : {{ $pegawai->kendaraan->alamat }}</li> 
    <li class="list-group-item">No Plat : {{ $pegawai->kendaraan->no_polisi }}</li>  
    <li class="list-group-item">Merk : {{ $pegawai->kendaraan->merk }}</li>
    <li class="list-group-item">Type : {{ $pegawai->kendaraan->type }}</li>   
    <li class="list-group-item">Jenis : {{ $pegawai->kendaraan->jenis }}</li> 
    <li class="list-group-item">Model : {{ $pegawai->kendaraan->model }}</li> 
    <li class="list-group-item">Tahun Pembuatan : {{ $pegawai->kendaraan->tahun_buat }}</li> 
    <li class="list-group-item">Isi Silinder/Daya Listrik : {{ $pegawai->kendaraan->isi_silinder }}</li> 
    <li class="list-group-item">No Rangka : {{ $pegawai->kendaraan->no_rangka }}</li> 
    <li class="list-group-item">No Mesin : {{ $pegawai->kendaraan->no_mesin }}</li> 
    <li class="list-group-item">Warna : {{ $pegawai->kendaraan->warna }}</li> 
    <li class="list-group-item">Bahan Bakar : {{ $pegawai->kendaraan->bahan_bakar }}</li> 
    <li class="list-group-item">Warna TNKB : {{ $pegawai->kendaraan->warna_tnkb }}</li> 
    <li class="list-group-item">Tahun Registrasi : {{ $pegawai->kendaraan->tahun_reg }}</li> 
    <li class="list-group-item">Berlaku Sampai : {{ $pegawai->kendaraan->tgl_pajak }}</li>   
</ul>
