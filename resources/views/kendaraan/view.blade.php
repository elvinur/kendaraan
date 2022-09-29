
<div class="card mb-3">
    <div class="row g-0">
        <div class="col-md-4">
            @if ($kendaraan->gambar)
                <img width="150" height="150" @if($kendaraan->gambar) src="{{ asset('Storage/'.$kendaraan->gambar) }}" @endif />
            @endif
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <div class="card-text">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Nama Pemilik : {{ $kendaraan->nama_pemilik }}</li>  
                        <li class="list-group-item">Alamat : {{ $kendaraan->alamat }}</li> 
                        <li class="list-group-item">No Plat : {{ $kendaraan->no_polisi }}</li>  
                        <li class="list-group-item">Merk : {{ $kendaraan->merk }}</li>
                        <li class="list-group-item">Type : {{ $kendaraan->type }}</li>   
                        <li class="list-group-item">Jenis : {{ $kendaraan->jenis }}</li> 
                        <li class="list-group-item">Model : {{ $kendaraan->model }}</li> 
                        <li class="list-group-item">Tahun Pembuatan : {{ $kendaraan->tahun_buat }}</li> 
                        <li class="list-group-item">Isi Silinder/Daya Listrik : {{ $kendaraan->isi_silinder }}</li> 
                        <li class="list-group-item">No Rangka : {{ $kendaraan->no_rangka }}</li> 
                        <li class="list-group-item">No Mesin : {{ $kendaraan->no_mesin }}</li> 
                        <li class="list-group-item">Warna : {{ $kendaraan->warna }}</li> 
                        <li class="list-group-item">Bahan Bakar : {{ $kendaraan->bahan_bakar }}</li> 
                        <li class="list-group-item">Warna TNKB : {{ $kendaraan->warna_tnkb }}</li> 
                        <li class="list-group-item">Tahun Registrasi : {{ $kendaraan->tahun_reg }}</li> 
                        <li class="list-group-item">Berlaku Sampai : {{ $kendaraan->tgl_pajak }}</li>   
                    </ul>
                </div>
                <div class="card-text text-right"><small class="text-muted">{{  $kendaraan->nama_pemilik }}</small></div>
            </div>
        </div>
    </div>
</div>

<script>
     function readURL() {
            var input = this;
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $(input).prev().attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $(function () {
            $(".uploads").change(readURL)
            $("#f").submit(function(){
                return false
            })
        })

</script>